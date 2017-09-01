@extends('dashboard.structure')

@section('content')
<div class="content-inner">
	<header class="page-header">
	    <div class="container-fluid">
	        <div class="row"> 
	            <span class="col-sm-6"><a id="login" href="/sell" class="btn btn-primary">SELL WITH ESCROW</a></span> 
	            <span class="col-sm-6"><a id="login" href="/sendhome" class="btn btn-primary">SEND INSTANTLY</a></span> 
	       	</div> 
	    </div>
	</header>
  @if (session('status'))
  <center>
      <div class="alert alert-success title">
          <b>{{ session('status') }}</b>
      </div>
    </center>
  @endif
	 <!-- Dashboard Counts Section-->
	 	<section style="margin-bottom: 10px;" class="dashboard-counts no-padding-bottom">
          <div class="container-fluid">
            <div class="row bg-white has-shadow">
              <!-- Item -->
              <div class="col-sm-6">
                <!-- <div class="left-col col-lg-6 d-flex align-items-center justify-content-between"> -->
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-padnote"></i></div>
                    <div class="title"><span>Balance</span>
                    </div>
                    <div class="number"><span><span>BTC&nbsp</span><span><b> {{$balance->data->available_balance}}</b></span><br><span class="h4">NGN {{number_format($balance->data->available_balance*$current_price_usd->data->prices[1]->price*$presentRateNaira,2)}}</span></span></div>
                  <!-- </div> -->
                </div>
              </div>
              <!-- Item -->
              <div class="col-sm-6">
                <div class="item d-flex align-items-center">
                  <div class="icon bg-red"><i class="icon-padnote"></i></div>
                  <div class="title"><span>Sales Balance</span>
                  </div>
                  <div class="number"><span>NGN:<b>&nbsp{{$total_balance}}
                  </b></span></div>
                </div>
              </div>
            </div>
          </div>
  		</section>
  		<!-- Projects Section-->
    <section class="projects no-padding-top">
        <div class="container-fluid">
            <!-- Project-->
            <div class="project">
                <div class="row bg-white has-shadow">
                   <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                     	<div class="project-title d-flex align-items-center"> 
	                      <div class="text">
	                        <h3 class="h4"><span>WALLET-ID:&nbsp<strong>{{$btc_wallet_id->btc_wallet_id}}</strong></span></h3>
	                      </div>
                   		</div> 
                	</div> 
            	</div>
        	</div>
     	</div> 
    </section>
    <!-- Recent Activities -->
                <div class="col-lg-8 offset-lg-2">
                  <div class="recent-activities card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header">
                      <h3 class="h4">Recent Activities</h3>
                    </div>
                    <div class="card-body no-padding">
                    @foreach($market as $markets)
                      <div class="item">
                        <div class="row">
                          <div class="col-4 date-holder text-right">
                            <div class="icon"><i class="icon-clock"></i></div>
                            <div class="date"> <span class="pull-left">{{$markets->name}}</span><span class="text-info">{{$markets->email}}</span></div>
                          </div>
                          <div class="col-8 content">
                            <h5 style="color: yellow;">You have a Buyer</h5>
                            <p>phone: &nbsp{{$markets->phone}}</p>
                            <p>Amount in Dollar: &nbsp{{$markets->amount_dollar}}</p>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                    <div class="card-body no-padding">
                    @foreach($cancel as $cancels)
                      <div class="item">
                        <div class="row">
                          <div class="col-4 date-holder text-right">
                            <div class="icon"><i class="icon-clock"></i></div>
                            <div class="date"> <span class="pull-left"></span>{{$cancels->User->email}}<span class="text-info">{{$cancels->created_at}}</span></div>
                          </div>
                          <div class="col-8 content">
                            <h5 style="color: red;">Failed Transactions</h5>
                            <p>{{$cancels->reason}}</p>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
</div>
@endsection