<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use Paystack;
use Illuminate\Support\Facades\DB;
use MyEscrow\SellCoin;
use MyEscrow\Authorization;
use MyEscrow\Transaction;
use MyEscrow\BlockIoTest;
use Carbon\carbon;
use MyEscrow\CreateAddress;
use GuzzleHttp\Client;

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
        $sellcoin_userid = $sellcoin->user_id;
        $amount_btc     = $sellcoin->amount_btc;
        $amount         = $sellcoin->amount_dollar;
        $amount_rate    = $sellcoin->rate;
        $amount_naira   = $amount * $amount_rate;
        $escrow_fee     = $amount_naira * (0.75/100);

        $btc_wallet_id = CreateAddress::where('user_id', $sellcoin_userid)->first();
        $btc_wallet = $btc_wallet_id->btc_wallet_id;

        $btc_balance   = new BlockIoTest();
        $balance  = $btc_balance->getbalance($btc_wallet);
        $total_balance_btc  = $balance->data->available_balance;

            $client = new Client();
            $res = $client->get(
                'https://bitcoinfees.21.co/api/v1/fees/recommended'
                );
            $contents = $res->getBody()->getContents();
            $json = json_decode($contents);
            $jsonFee =  $json->fastestFee;

            $pendingFee = DB::table('transactions')
                    ->where([
                    ['transactions.user_id', '=',$sellcoin_userid],
                    ['transactions.transaction_status', '=', 0],
                    ['transactions.transaction_token', '<>', Null]
                    ])
                    ->join('sell_coins','sell_coins.id','=','transactions.sell_coin_id')
                    ->select(DB::raw('sum(amount_btc) as total'), DB::raw('count(amount_btc) as count'))
                    ->get();
        $pendingFee_total       = $pendingFee['0']->total;
        $pendingFee_count       = $pendingFee['0']->count * $jsonFee * 226 * 0.00000001;
        $pendingFeeTotalAmount  = $pendingFee_total + $pendingFee_count;
        $total_amount_btc       = $pendingFeeTotalAmount + ($amount_btc + ($jsonFee * 226 * 0.00000001));



        $transaction = Transaction::find($id);
        $transaction_created_at = $transaction->created_at;
        $current = Carbon::now();
        $dt = Carbon::now();
        $dt = $current->subHours(2);
        if ($transaction_created_at <= $dt) {
            
           return 'Transaction time out.';
        }
        else{
            if ($total_balance_btc < $total_amount_btc) {

                return 'Transaction was canceled due to high transaction fee, please try again.';
                

            }else{
                return view('dashboard.paymentForm', compact('sellcoin')); 
            }
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
