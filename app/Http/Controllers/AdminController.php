<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
    	return view('admin.index'); 
    }
	
	public function error(){
    	return view('admin.error');
    }
    
    public function action(){
    	return view('admin.action');
    }
	
	public function table(){
    	return view('admin.table');
    }
    public function data(){
    	return view('admin.data');
    }
}
