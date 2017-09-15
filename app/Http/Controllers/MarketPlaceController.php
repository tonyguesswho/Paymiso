<?php

namespace MyEscrow\Http\Controllers;
use Illuminate\Http\Request;
use MyEscrow\Mail\marketPlaceEmail;
use MyEscrow\MarketPLace;
use MyEscrow\Rate;
use MyEscrow\User;
use Mail;
use Send;
use Auth;

class MarketPlaceController extends Controller
{
    public function index(){
        $search = \Request::get('search');
        $user = Rate::where('username','like', '%'.$search.'%' )
                ->latest()
                ->paginate();
        
    	return view('dashboard.marketplace', compact('user'));
    }

    public function joinMarket(){
        $user = Rate::where('user_id', Auth::User()->id)->first();
        
        return view('dashboard.joinMarket', compact('user'));
    }

    public function join($id){
        $id;
        $this->validate(request(),[
            'rate'          => 'required',
            'availability'  => 'required',
            'negotiable'    => 'required',
            'username'      => 'required'
         ]);   

        $rate = Rate::where('user_id', Auth::User()->id)->update([
            
            'rate'          => request('rate'),
            'availability'  => request('availability'),
            'negotiable'    => request('negotiable'),
            'username'    => request('username')  
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

        return back()->with('status', 'Notification sent successfully');
    }
}

