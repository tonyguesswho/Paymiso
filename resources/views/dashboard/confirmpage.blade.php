@extends('dashboard.structure')

@section('content')
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Confirm Transaction</h2>
            </div>
          </header>
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="/user_dashboard">Home</a></li>
              <li class="breadcrumb-item active">Confirm Transaction</li>
            </div>
          </ul>

  @if (session('status'))
  <center>
      <div class="alert alert-success">
          <b>{{ session('status') }}</b>
      </div>
    </center>
@endif
    <div class="container">
  <div class="row">
            
            <div class="wrapper">
                <div class="logo_header">
                    <h3 class="text-center">Bitcoin Transaction Details</h3>
                </div>
                <div class="email_banner">
                    
                </div>
                <div class="email_body">
                    
                    <p>
                        Kindly go through the details below before making payment
                    </p>
                    
                    <div class="receipt_list">
                        <div class="left_list">
                          
                            <span>Seller's Name:</span>
                            <span>Buyer's Id:</span>
                            <span>Amount BTC:</span>
                            <span>Amount USD:</span>
                            <span>Rate:</span>
                            <span>Amount NGN:</span>
                            <span>Escrow fee (0.75% for each participant):</span>
                            
                        </div>
                          <div class="right_list">
                            
                                 <span>{{$user->User->firstname}}&nbsp&nbsp{{$user->User->firstname}}</span>
                                 <span>{{$user->wallet_id}}</span>
                                 <span>{{$user->amount_btc}}</span>
                                 <span>{{number_format($user->amount_dollar,2)}}</span>
                                 <span>{{$user->rate}}</span>
                                 <span>{{number_format($amount_naira,2)}}</span>
                                 <span>{{number_format($escrow_fee,2)}}</span>
                        </div>
                        <span class="list_divider"></span>
                         <div class="left_list">
                             <b>Total</b>
                              </div>
                          <div class="right_list">
                               <span><b>{{number_format($amount_naira,2)+number_format(($amount_naira)*0.0075,2)}}</b></span>
                          </div>
                    </div>
                    
                    <div class="invoice_trans">
                        <div class="invoice_left">
                           <a href="/confirmMail"> <button type="button" class="btn btnc btn-fresh text-uppercase">Confirm</button></a>
                        </div>
                        <div class="invoice_right">
                            <a href="/edit"><button type="button" class="btn btnc btn-sunny text-uppercase">Cancel</button></a>
                        </div>
                    </div>
                    
                </div>
            </div>
            
  </div>
</div>
</div>  
@endsection
  
        
   