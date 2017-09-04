@extends('dashboard.structure')

@section('content')
  <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Join Market</h2>
            </div>
          </header>
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="/userDashboard">Home</a></li>
              <li class="breadcrumb-item active">Join Market</li>
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
                      <h3 class="h4">Market Details</h3>
                    </div>
                    <div class="card-body">
                      <p>Do ensure to fill in the transaction details correctly</p>
                      
                      <form method="POST" action="/join">
                        {{csrf_field()}}
                        
                        <div class="form-group">       
                          <label class="form-control-label">Amount of BTC in Dollar</label>
                          <input type="number" name="buyer_phone"  class="form-control"
                          required="">
                        </div>
                        
                         
                         <div class="form-group">       
                          <label class="form-control-label">Rate</label>
                          <input type="number" name="rate"  class="form-control">
                        </div>   

                         
                         <div class="form-group">       
                          <label class="form-control-label">Negotiable</label>
                          <div class="radio">
                            <label>
                              <input type="radio" name="negotiable" id="input" value="yes" checked="checked">
                              Yes
                            </label>
                            <label>
                              <input type="radio" name="negotiable" id="input" value="no" checked="checked">
                              No
                            </label>
                          </div>
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
	
