<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use MyEscrow\BlockIoTest;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use MyEscrow\Transaction;
use Carbon\Carbon;


//use MyEscrow\User;


class BlockIoTestController extends Controller
{
	// public function __construct(){
	// 	$this->middleware('auth');
	// }

    public function dump(){
   $transaction = Transaction::find(1);
   $transaction_created_at = $transaction->created_at;
    $current = Carbon::now();
        $dt = Carbon::now();
        $dt = $current->subHours(2);
        if ($transaction_created_at <= $dt) {
            
           return 'transaction time out.';
        }
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

     public function faq(){
    
        return view('dashboard.faq');
        
        
    }

    public function test(){
        return view('dashboard.conv');

    } 
    
    }

