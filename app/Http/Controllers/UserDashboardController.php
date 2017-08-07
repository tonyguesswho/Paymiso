<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use MyEscrow\SellCoin;
use MyEscrow\Transaction;
use MyEscrow\BankDetail;
use Mail;
use Auth;
use Illuminate\Support\Str;

class UserDashboardController extends Controller
{
    public function __construct(){

    	$this->middleware('auth');
    }

    public function index(){

    	return view('dashboard.home');
    }

    public function sellcoin(){

        return view('dashboard.sell');
    }

    public function sellCoinCreate(){
        $this->validate(request(),[
            'wallet_id'     => 'required',
            'buyer_email'   => 'required',
            'buyer_phone'   => 'required',
            'amount_dollar' => 'required',
            'amount_btc'    => 'required',
            'rate'          => 'required',

             ]);

             $sellCoin =  SellCoin::create([
            'user_id'       => Auth::User()->id,
            'wallet_id'     => request('wallet_id'),
            'buyer_email'   => request('buyer_email'),
            'buyer_phone'   => request('buyer_phone'),
            'amount_dollar' => request('amount_dollar'),
            'amount_btc'    => request('amount_btc'),
            'rate'          => request('rate')
            
            ]);
        
           
          $sellCoins = $sellCoin->id;

          $transaction= Transaction::create([    
         'sell_coin_id' =>$sellCoins,
         'transaction_token'=>Str::random(22), 
             ]); 

         return 'reba thanks';  

    }

   

     public function history(){

    	return view('dashboard.history');
    }


    public function bankDetails(){

    	return view('dashboard.bank_details');
    }

    public function bankDetailsCreate(){
        $this->validate(request(),[
            'bank_name'     => 'required',
            'account_name'  => 'required',
            'account_number' => 'required' 
            ]);
        BankDetail::create([
            'bank_name'     => request('bank_name'),
            'account_name'  => request('account_name'),
            'acount_number' => request('acount_number'),
            'user_id'       => Auth::User()->id,
            ]);
        return 'done';
    }

    public function withdrawCash(){

    	return view('dashboard.withdraw');
    }
}
