@extends('dashboard.structure')

@section('content')
  <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Trasaction confirmation</h2>
            </div>
          </header>
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="/userDashboard">Home</a></li>
              <li class="breadcrumb-item active">Confirmation</li>
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
                      <h3 class="h4">Trasaction Confirmation</h3>
                    </div>
                    <div class="card-body">
                      <p>Enter the Confirmation Code sent to {{Auth::User()->email}}</p>
                      
                      <form method="POST" action="{{route('send')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                          <label class="form-control-label">Confirmation Code</label>
                          <input type="text" name="Confirmation_code"  class="form-control" required="">
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
	
