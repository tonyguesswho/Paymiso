<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use MyEscrow\BlockIoTest;
use MyEscrow\CreateAddress;
use MyEscrow\SendInstantly;
use Illuminate\Support\Facades\DB;
use Auth;

class SendInstantlyController extends Controller
{
     public function __construct(){

        $this->middleware(['auth','timeout']);
    }

    public function sendInstantly(){
    	$this->validate(request(),[
            'wallet_id'     => 'required',
            'buyer_email'   => 'required',
            'amount_dollar' => 'required',
            'amount_btc'    => 'required',
             ]);

            $amount_btc     = request('amount_btc');
            $amount         = request('amount_dollar');

            $btc_wallet = CreateAddress::where('user_id', Auth()->User()->id)->first();
            $btc_wallet_id = $btc_wallet->btc_wallet_id;

            $btc_balance        = new BlockIoTest();
            $balance            = $btc_balance->getbalance($btc_wallet_id);
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
                    ['transactions.user_id', '=', Auth::User()->id],
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

	        if ($total_balance_btc > $total_amount_btc) {

            return bacK()->withErrors([
                'insufficient fund'
                ]);
        }else{

        	 $sendCoin =  SendInstantly::create([
            'user_id'       => Auth::User()->id,
            'wallet_id'     => request('wallet_id'),
            'buyer_email'   => request('buyer_email'),
            'amount_dollar' => request('amount_dollar'),
            'amount_btc'    => request('amount_btc')        
            ]);

            $transaction = new TransactionController();
            $twofactor = $transaction->twoFActorSend();
            return $twofactor;

        	// $sendCoin_id = $sendCoin->id;

        	// $SendInstantly = new BlockIoTest();
        	// $SendInstantly_id = $SendInstantly->sendInstantly($sendCoin_id,$btc_wallet_id);
        }
    }

      public function sendHomeInstantly(){
        
        $this->validate(request(),
        ['confirmation_code' => 'required']);

        $confirmation_code = request('confirmation_code');

        $user = SendInstantly::where('user_id', Auth::user()->id)->latest()->first();
        $SendInstantlyId = $user->id;

        $btc_wallet = CreateAddress::where('user_id', Auth()->User()->id)->first();
        $btc_wallet_id = $btc_wallet->btc_wallet_id;

        $confirmation = TwoFactor::where('user_id', Auth::User()->id)->latest()->first();
        $getConfirmation = $confirmation->confirmation_code;

        if($getConfirmation === $confirmation_code){
             $SendInstantly = new BlockIoTest();
             $SendInstantlyClass = $SendInstantly->sendInstantly($SendInstantlyId,$btc_wallet_id);
        }
    }

}
