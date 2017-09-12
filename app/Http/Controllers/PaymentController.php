<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use Paystack;
use MyEscrow\SellCoin;
use MyEscrow\Authorization;
use MyEscrow\Transaction;
use MyEscrow\BlockIoTest;
use Carbon\carbon;

class PaymentController extends Controller
{   
    public function index($transaction_id){
        $transaction_id;
        $sendcoin = new BlockIoTest();
        $send     = $sendcoin->SendCoin($transaction_id);

        return redirect('/home');
    }

    public function confirmMail($id,$token){
    	$sellcoin = SellCoin::find($id);
        $transaction = Transaction::find($id);
        $transaction_created_at = $transaction->created_at;
        $current = Carbon::now();
        $dt = Carbon::now();
        $dt = $current->subHours(2);
        if ($transaction_created_at <= $dt) {
            
           return 'Transaction time out.';
        }
        else{
           return view('dashboard.paymentForm', compact('sellcoin')); 
        }

    	
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
            $fee = ($amount - ($amount*0.015))/100;
            $authorization_code = $paymentDetails['data']['authorization']['authorization_code'];
            $referrer = $paymentDetails['data']['metadata']['referrer'];
            $url = explode("/", $referrer);
            $url_id = $url[4];
            $url_token = $url[5];

    $transaction = Transaction::where(['sell_coin_id' =>$url_id, 'transaction_token'=>$url_token])->first();
    $transaction_id = $transaction->id;

    $sell_coin = SellCoin::find($url_id);
    $seller_id = $sell_coin->user_id;
    // get seller_id by getting the ids of transaction, sellcoin,user.

            if ($transaction) {
             Transaction::where(['sell_coin_id' =>$url_id, 'transaction_token'=>$url_token])->update(['transaction_status' => 1 ]);
            $authorization = Authorization::create([
                    'fee' => $fee,
                    'authorization_code' => $authorization_code,
                    'transaction_id' => $transaction->id,
                    'seller_id'      => $seller_id,
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
