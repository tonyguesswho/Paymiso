<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use MyEscrow\BlockIoTest;
use MyEscrow\LaraBlockIo;

//use MyEscrow\User;


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

