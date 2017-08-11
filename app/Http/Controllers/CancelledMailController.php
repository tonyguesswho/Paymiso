<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;

class CancelledMailController extends Controller
{
    public function cancelEmailDone($id,$token){

    	return view('dashboard.canceledMail');
    }
}
