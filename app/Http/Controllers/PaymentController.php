<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use Paystack;
use MyEscrow\SellCoin;
use MyEscrow\Authorization;
use MyEscrow\Transaction;
use MyEscrow\BlockIoTest;

class PaymentController extends Controller
{   
    public function index($transaction_id){
        $transaction_id;
        $sendcoin = new BlockIoTest();
        $send     = $sendcoin->SendCoin($transaction_id);

    }

    public function confirmMail($id,$token){
    	$sellcoin = SellCoin::find($id);

    	return view('dashboard.paymentForm', compact('sellcoin'));
    }

    public function redirectToGateway($id){
        $id;
        $sellcoin = Transaction::where('sell_coin_id', $id)->first();
        
        $transaction_token = $sellcoin->transaction_token;

        if($transaction_token !== Null){

    	return Paystack::getAuthorizationUrl()->redirectNow();
        }else{
            return 'You have canceled the transaction.';
        }
    }

    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
         $status = $paymentDetails['status'];
        if ($status === true) {
            $amount = $paymentDetails['data']['amount'];
            $fee = ($amount - ($amount*0.0075))/100;
            $authorization_code = $paymentDetails['data']['authorization']['authorization_code'];
            $referrer = $paymentDetails['data']['metadata']['referrer'];
            $url = explode("/", $referrer);
            $url_id = $url[4];
            $url_token = $url[5];

    $transaction = Transaction::where(['sell_coin_id' =>$url_id, 'transaction_token'=>$url_token])->first();
    $transaction_id = $transaction->id;
            if ($transaction) {
             Transaction::where(['sell_coin_id' =>$url_id, 'transaction_token'=>$url_token])->update(['transaction_status' => 1 ]);
            $authorization = Authorization::create([
                    'fee' => $fee,
                    'authorization_code' => $authorization_code,
                    'transaction_id' => $transaction->id,
                ]);

             $this->index($transaction_id);
        }

        }

        
        //dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
