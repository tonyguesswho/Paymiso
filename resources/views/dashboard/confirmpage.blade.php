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
              <li class="breadcrumb-item"><a href="/user_dashboard">Home</a></li>
              <li class="breadcrumb-item active">Sell Coins</li>
            </div>
          </ul>
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
                      <h3 class="h4">Confirm the Details that will be sent to: {{$user->buyer_email}}</h3>
                    </div>
                    <div class="card-body">
                      <h5><span class="cft">Seller's Name:</span><span>{{$user->User->firstname}}&nbsp&nbsp{{$user->User->firstname}}</span> </h5>
                      <h5><span class="cft">Buyer's Id:</span><span>{{$user->wallet_id}}</span> </h5>
                      <h5><span class="cft">Amount BTC:</span><span>{{$user->amount_btc}}</span> </h5>
                      <h5><span class="cft">Amount USD:</span><span>{{number_format($user->amount_dollar,2)}}</span> </h5>
                      <h5><span class="cft">Amount BTC:</span><span>{{$user->rate}}</span> </h5>
                      <h5><span class="cft">Amount NGN:</span><span>{{number_format($amount_naira,2)}}</span> </h5>
                      <h5><span class="cft">Escrow fee:</span>{{number_format($escrow_fee,2)}}<span></span> </h5>
                      </div>
                      <span class="offset-lg-3"><a href="/confirmMail"><button class="btn btn-primary">Confirm</button></a>  <a href="{URL::route('edit')}"><button class="btn btn-primary">Edit</button></a></span>
                  </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
  
