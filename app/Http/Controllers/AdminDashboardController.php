<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use MyEscrow\Withdrawal;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function index(){
    	$Withdrawal = Withdrawal::latest();
    	
    	return view('admindashboard.home', compact('Withdrawal'));
    }
}
