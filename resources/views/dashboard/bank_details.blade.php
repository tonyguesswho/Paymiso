@extends('dashboard.structure')

@section('content')

<div class="content-inner">
          <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
           	<h2 class="no-margin-bottom">Bank Details</h2>
        </div>
    </header>
        <ul class="breadcrumb">
          <div class="container-fluid">
            <li class="breadcrumb-item"><a href="/userDashboard">Home</a></li>
            <li class="breadcrumb-item active">Bank Details</li>
          </div>
        </ul>
  @if (session('status'))
    <center>
      <div class="alert alert-success">
          <b>{{ session('status') }}</b>
      </div>
    </center>
  @endif
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
                      <h3 class="h4">Bank Details</h3>
                    </div>
                    <div class="card-body">
                      <p>Do ensure to fill in your bank details completely</p>
                      <form method="POST" action="/createBankDetails">
                      {{csrf_field()}}
                        <div class="form-group">
                          <label class="form-control-label">Bank Name</label>
                          <input type="text" name="bank_name" value="{{old('bank_name',$withdraw->bank_name)}}" class="form-control" required="">
                        </div>
                        <div class="form-group">       
                          <label class="form-control-label">Account Name</label>
                          <input type="text" name="account_name" value="{{old('account_name',$withdraw->account_name)}}"  class="form-control" required="">
                        </div>
                        <div class="form-group">       
                          <label class="form-control-label">Account Number</label>
                          <input type="number" name="account_number" value="{{old('account_number',$withdraw->account_number)}}" class="form-control" required="">
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">submit</button>       
                          <!-- <input type="submit" value="Submit" class="btn btn-primary"> -->
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection