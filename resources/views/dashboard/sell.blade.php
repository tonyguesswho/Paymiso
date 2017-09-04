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
                      
                      <form method="POST" action="/sell">
                        {{csrf_field()}}
                        <div class="form-group">
                          <label class="form-control-label">Buyers Wallet Id</label>
                          <input type="text" name="wallet_id"  class="form-control" required="">
                        </div>
                        <div class="form-group">       
                          <label class="form-control-label">Buyers Email</label>
                          <input type="email" name="buyer_email"  class="form-control" required="">
                        </div>
                        <div class="form-group">       
                          <label class="form-control-label">Buyers Phone</label>
                          <input type="number" name="buyer_phone"  class="form-control"
                          required="">
                        </div>
                        <div class="form-group">
                         <label class="form-control-label">Amount of BTC in Dollar</label>
                            <div class="row">
                              <div class="col-md-6">
                                <input type="number" name="amount_dollar"  class="form-control" required="">
                              </div>
                              <div class="col-md-6">
                                <input type="text" name="amount_btc" placeholder="amount of btc" class="form-control" required="">
                              </div>
                            </div>
                        </div> 
                         <div class="form-group">       
                          <label class="form-control-label">Rate</label>
                          <input type="number" name="rate"  class="form-control">
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
	
