@extends('dashboard.market')

@section('content')
    <div class="wrapper">       
    <div class="container">        
        
        
            
            @foreach($user as $users)
            <div class="card-box col-md-3 col-sm-3">
                <div class="card text-center" data-background="image" data-src="assets/img/city-1.jpg">
                    <h4 class="title title-modern" style="margin-bottom: 5px;">{{$users->User->firstname}}</h4>
                    <h5 class="">{{$users->User->phone}}</h5>
                    <h5 class="title">Available:{{$users->avaiability}}&nbspUSD</h5>
                    
                    
                    
                    <div class="content">
                           <div class="price">
                            <h6>Rate</h6>
                            <h4>{{$users->rate}}/<b class="currency">$</b></h4>
                        </div>      
                    </div> 
                    
                    
                    <div class="footer btn-center">
                    
                         <a class="btn btn-neutral btn-round btn-modern" data-toggle="modal" href='#modal-id-{{$users->user_id}}'>Request</a>
                              
                    </div> 
                    <h6 class="title">Negiotiable:{{$users->negotiable}}</h6>   
                    
                    <div class="filter filter-blue"></div>                       
                </div> <!-- end card -->    
             </div>

             <div class="modal fade" id="modal-id-{{$users->user_id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h5 class="modal-title text-center">Please fill in the information below and your buying request will be sent to the seller</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="/contactSeller/{{$users->user_id}}">
                                                {{csrf_field()}}
                                                    <legend class="text-center">Buyer's Details</legend>
                                                    
                                                        <div class="form-group">
                                                            
                                                            
                                                            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                                        </div>
                                                    <div class="form-group">
                                                            
                                                            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                                        </div>
                                                        <div class="form-group">
                                                            
                                                            <input type="phone" class="form-control" id="phone" placeholder="phone" name="phone">
                                                        </div>
                                                        <div class="form-group">
                                                            
                                                            <input type="tel" class="form-control" id="amount_dollar" placeholder="Amount in dollar" name="amount_dollar">
                                                        </div>
                                                        
                                                        <textarea name="comments" id="comment" class="form-control" rows="3" required="required" placeholder="Comments"></textarea>
                                                        <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            
                                        </div>
                                                </form>

                                                
                                            </div>
                                            

                                        </div>
                                    </div>
                                </div>
 @endforeach
</div> 
</div> <!-- end wrapper -->

@endsection