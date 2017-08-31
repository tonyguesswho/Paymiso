<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use MyEscrow\CancledMail;
use MyEscrow\SellCoin;
use MyEscrow\Transaction;

class CancelledMailController extends Controller
{
    public function cancelEmailDone($id,$token){

    	$id;
    	$token;
        $transaction = Transaction::where(['sell_coin_id' =>$id, 'transaction_token'=>$token])->first();
        $transaction_status = $transaction->transaction_status;
        if ($transaction_status === '1') {            
             return 'You cannot cancel a completed transaction';
        }else{
            return view('dashboard.canceledMail', compact('id','token'));
        }
    	
    }

    public function sendCancledEmail($id,$token){
    	$id;
    	$token;
    	$this->validate(request(),[
    		'reason' => 'required',
    		]);
         $sell_coin = SellCoin::find($id);
         $user_id   = $sell_coin->user_id;

    	$cancel = CancledMail::create([
            'user_id'     => $user_id,
    		'reason'      => request('reason'),
    		'sellcoin_id' => $id,
    		]);
    	
        Transaction::where(['sell_coin_id' =>$id, 'transaction_token'=>$token])->update(['transaction_token' => Null ]);
        
        return redirect('/home');

    }
}
