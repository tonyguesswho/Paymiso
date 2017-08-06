<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlockIoTest;
use App\LaraBlockIo;

//use App\User;


class BlockIoTestController extends Controller
{
	// public function __construct(){
	// 	$this->middleware('auth');
	// }

    public function dump(){
    	$balance = new BlockIoTest();
    	$bal   = $balance->Test();
    	dd($bal);
    }
    
    }

