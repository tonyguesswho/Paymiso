<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct(){

    $this->middleware('auth');
    }

     public function sell(){

        return view('dashboard.sell');
    }


     public function send(){

        return view('dashboard.send');
    }

}
