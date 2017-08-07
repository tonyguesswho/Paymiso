<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use MyEscrow\sellCoin;
use Mail;
use Auth;

class UserDashboardController extends Controller
{
    public function __construct(){

    	$this->middleware('auth');
    }

    public function index(){

    	return view('dashboard.home');
    }

    public function sellCoin(){
        $this->validate(request(),[
            'wallet_id'     => 'required',
            'buyer_email'   => 'required',
            'buyer_phone'   => 'required',
            'amount_dollar' => 'required',
            'amount_btc'    => 'required',
            'rate'          => 'required'



        SellCoin::create([
            'user_id'       => Auth::User()->id,
            'wallet_id'     => request('wallet_id'),
            'buyer_email'   => request('buyer_email'),
            'buyer_phone'   => request('buyer_phone'),
            'amount_dollar' => request('amount_dollar'),
            'amount_btc'    => request('amount_btc'),
            'rate'          => request('rate'),
                  ]);

            ]);

    	return view('dashboard.sell');
    }

     public function history(){

    	return view('dashboard.history');
    }


    public function bankDetails(){

    	return view('dashboard.bank_details');
    }


    public function withdrawCash(){

    	return view('dashboard.withdraw');
    }
}
