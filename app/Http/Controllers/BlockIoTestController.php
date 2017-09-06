<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use MyEscrow\BlockIoTest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


//use MyEscrow\User;


class BlockIoTestController extends Controller
{
	// public function __construct(){
	// 	$this->middleware('auth');
	// }

    public function dump(){
    
    	// $balance = new BlockIoTest();
    	// $bal   = $balance->Test();
    	// dd($bal);
        return view('admin.data');
        
    	
    }

    public function bitco(){

       $client = new Client();
        $res = $client->get(
    'https://bitcoinfees.21.co/api/v1/fees/recommended'
        );

        $contents = $res->getBody()->getContents();
        
        $json = json_decode($contents);
        $json->hourFee;
    }
    
    }

