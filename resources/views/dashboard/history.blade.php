@extends('dashboard.structure')

@section('content')

<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">History</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="/userDashboard">Home</a></li>
              <li class="breadcrumb-item active">Transaction History</li>
            </div>
          </ul>
          <!-- Charts Section-->
    <section class="charts">
        <div class="container-fluid">
            <div class="row">
                <!-- Line Charts-->
                <div class="col-lg-8">
                  <div class="line-chart-example card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Line Chart Example</h3>
                    </div>
                    <div class="card-body">
                      <canvas id="lineChartExample"></canvas>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
    <section class="projects no-padding-top">
        <div class="container-fluid">
            <!-- Project-->
            <div class="project">
                <div class="row bg-white has-shadow">
                   <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                     	<div class="project-title d-flex align-items-center"> 
	                      <div class="text">
	                        <h3 class="h4"><span>WALLET-ID:<strong> 68ytgo7iuyho-9ugib97iuhn-9ijno</strong></span></h3>
	                      </div>
                   		</div> 
                	</div> 
            	</div>
        	</div>
     	</div> 
    </section>
</div>
@endsection