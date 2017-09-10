<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use MyEscrow\Withdrawal;

class AdminController extends Controller
{
    public function __construct(){

        $this->middleware(['admin','timeout']);
    }


    public function index(){
        
    	return view('admin.index'); 
    }
	
	public function error(){
        abort(404);  	//return view('admin.error');
    }
    
    public function action(){
    	return view('admin.action');
    }
	
	public function table(){
        $withdraw = Withdrawal::latest()->paginate();
    	return view('admin.table',compact('withdraw'));
    }
    public function data(){
    	return view('admin.data');
    }
}
