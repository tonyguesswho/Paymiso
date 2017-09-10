<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use MyEscrow\TwoFactor;
use MyEscrow\SellCoin;
use MyEscrow\User;
use Illuminate\Support\Str;
use MyEscrow\Mail\twoFactorMail;
use Mail;
Use Auth;


class TransactionController extends Controller
{
     public function __construct(){

    	$this->middleware(['auth','timeout']);
    }

     public function twoFActorSell(){
        $twoFActorCreate = TwoFactor::create([
            'user_id' => Auth::User()->id,
            'confirmation_code' => Str::random(5)
            ]);
        $user = Auth::User()->email;

        $confirmation_code = TwoFactor::where('user_id', Auth::User()->id)->latest()->first();
      
        Mail::to($user)->send(new twoFactorMail($confirmation_code));

        return view('dashboard.twoFactorSell');
    }

     public function twoFActorSend(){

        $twoFActorCreate = TwoFactor::create([
            'user_id' => Auth::User()->id,
            'confirmation_code' => Str::random(5),
            ]);
        $user = Auth::User()->email;
        $confirmation_code = TwoFactor::where('user_id', Auth::User()->id)->latest()->first();

        Mail::to($user)->send(new twoFactorMail($confirmation_code));
        
        return view('dashboard.twoFActorSend');
    }
     public function sell(){
        
     	$this->validate(request(),
     	['confirmation_code' => 'required']);

     	$confirmation_code = request('confirmation_code');
     	
     	$user = SellCoin::where('user_id', Auth::user()->id)->latest()->first();
     	
     	$confirmation = TwoFactor::where('user_id', Auth::User()->id)->latest()->first();
     	$getConfirmation = $confirmation->confirmation_code;

     	if($getConfirmation === $confirmation_code){

     		return view('dashboard.confirmpage',compact('user'));
     	}else{

     		return back()->with('status', 'Sorry, invalid confirmation code');
     	}

        
    }


     public function sendhome(){
        return view('dashboard.send');
    }


}
