<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use MyEscrow\BlockIoTest;
use MyEscrow\ExchangeRate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $current_price = new BlockIoTest();
        $current_price_usd = $current_price->CurrentPriceInUsd();
        $ExchangeRate = new ExchangeRate();
        $presentRate   = $ExchangeRate->rate();
        
        return view('welcome',compact('current_price_usd','presentRate'));
    }

     public function pp()
    {   
       
        
        return view('privacy');
    }

     public function tc()
    {   
       
        
        return view('terms');
    }
}
