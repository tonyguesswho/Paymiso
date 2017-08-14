<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use Paystack;
use MyEscrow\SellCoin;

class PaymentController extends Controller
{
    public function confirmMail($id,$token){
    	$sellcoin = SellCoin::find($id);

    	return view('dashboard.paymentForm', compact('sellcoin'));
    }

    public function redirectToGateway(){
    	return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
