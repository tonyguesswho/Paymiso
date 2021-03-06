@extends('dashboard.structure')

@section('content')
  <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Sell Coin</h2>
            </div>
          </header>
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="/userDashboard">Home</a></li>
              <li class="breadcrumb-item active">Sell Coins</li>
            </div>
          </ul>
          @include('layouts.error')
          <!-- Forms Section-->
          <section class="forms"> 
            <div class="container-fluid">
              <div class="row">
                <!-- Basic Form-->
                <div class="col-lg-6 offset-lg-3">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Transaction Details</h3>
                    </div>
                    <div class="card-body">
                      <p>Do ensure to fill in the transaction details correctly</p>
                      
                      <form method="POST" action="/update">
                        {{csrf_field()}}
                        <div class="form-group">
                          <label class="form-control-label">Buyers  Id</label>
                          <input type="text" name="wallet_id" placeholder=" id" class="form-control" required="" value="{{old('wallet_id', $user->wallet_id)}}">
                        </div>
                        <div class="form-group">       
                          <label class="form-control-label">Buyers Email</label>
                          <input type="email" name="buyer_email" placeholder="email" class="form-control" required="" value="{{old('buyer_email', $user->buyer_email)}}">
                        </div>
                        <div class="form-group">       
                          <label class="form-control-label">Buyers Phone</label>
                          <input type="number" name="buyer_phone" placeholder="Phone" class="form-control"
                          required="" value="{{old('buyer_phone', $user->buyer_phone)}}">
                        </div>
                        <div class="form-group">
                         <label class="form-control-label">Amount 2</label>
                            <div class="row">
                              <div class="col-md-6">
                                <input type="number" name="amount_dollar" placeholder="amount 2" class="form-control" required="" value="{{old('amount_dollar', $user->amount_dollar)}}">
                              </div>
                              <div class="col-md-6">
                                <input type="text" name="amount_btc" placeholder="amount 1" class="form-control" required="" value="{{old('amount_btc', $user->amount_btc)}}">
                              </div>
                            </div>
                        </div> 
                         <div class="form-group">       
                          <label class="form-control-label">Rate</label>
                          <input type="number" name="rate" placeholder="Rate of sell" class="form-control" value="{{old('rate', $user->rate)}}">
                        </div>   
                        
                          <button type="submit" class="btn btn-primary">Submit</button>       
                          <!-- <input type="submit" value="Submit" class="btn btn-primary"> -->
                        
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
  
