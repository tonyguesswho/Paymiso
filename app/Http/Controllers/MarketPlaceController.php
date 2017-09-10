<?php

namespace MyEscrow\Http\Controllers;
use Illuminate\Http\Request;
use MyEscrow\Mail\marketPlaceEmail;
use MyEscrow\MarketPLace;
use MyEscrow\Rate;
use MyEscrow\User;
use Mail;
use Send;

class MarketPlaceController extends Controller
{
    public function index(){
        $user = Rate::paginate('5');
        //dd($user);
    	return view('dashboard.marketplace', compact('user'));
    }

    public function joinMarket(){
        return view('dashboard.joinMarket');
    }

    public function join($id){
        $id;
        $this->validate(request(),[
            'rate'          => 'required',
            'availability'  => 'required',
            'negotiable'    => 'required'
         ]);   

        $rate = Rate::create([
            'user_id'       => $id,
            'rate'          => request('rate'),
            'availability'  => request('availability'),
            'negotiable'    => request('negotiable')  
            ]);
        return redirect('/marketPlace');
    }

    public function create($id){
         $id;
    	   $this->validate(request(),[
            'name'     => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'amount_dollar' => 'required',
            'comments'    => 'required'
             ]);

    	   $marketplace =  MarketPLace::create([
            'user_id'       => $id,
            'name'     => request('name'),
            'email'   => request('email'),
            'phone'   => request('phone'),
            'amount_dollar' => request('amount_dollar'),
            'comments'    =>request('comments')
            ]);
        $marketplace_id = $marketplace->id;
        $marketplace_mail = MarketPLace::find($marketplace_id);
    	$marketMail = User::find($id);
    
        Mail::to($marketMail['email'])->send(new marketPlaceEmail($marketplace_mail));

        return 'Notiication sent sucessfully';
    }
}

