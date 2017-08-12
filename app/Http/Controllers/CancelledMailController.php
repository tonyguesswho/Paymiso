<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use MyEscrow\CancledMail;
use MyEscrow\Transaction;

class CancelledMailController extends Controller
{
    public function cancelEmailDone($id,$token){

    	$id;
    	$token;
    	return view('dashboard.canceledMail', compact('id','token'));
    }

    public function sendCancledEmail($id,$token){
    	$id;
    	$token;
    	$this->validate(request(),[
    		'reason' => 'required',
    		]);
    	$cancel = CancledMail::create([
    		'reason'      =>request('reason'),
    		'sellcoin_id' => $id,
    		]);
    	$transaction = Transaction::where(['sell_coin_id' =>$id, 'transaction_token'=>$token])->first();
    	if ($transaction) {
    		 Transaction::where(['sell_coin_id' =>$id, 'transaction_token'=>$token])->update(['transaction_token' => Null ]);
    		 
    	}


    }
}
