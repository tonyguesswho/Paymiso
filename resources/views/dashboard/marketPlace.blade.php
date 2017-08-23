@extends('dashboard.market')

@section('content')
<div class="container-fluid">
        <div class="row" style="margin-top: 5%">
            @foreach($user as $users)
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="well" style="margin: 1%; background: white;padding-top: 2em; padding-left: 2em; padding-bottom:5px;">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-4 col-xs-4 col-sm-4">Name:</div>
                            <div class="col-md-8 col-xs-8 col-sm-8">
                                {{$users->User->firstname}}
                            </div>
                        </div>
                            
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">Rate:</div>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                {{$users->rate}}
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12">
                           <div class="row">
                            <div class="col-md-4 col-xs-4 col-sm-4">Phone:</div>
                            <div class="col-md-8 col-xs-8 col-sm-8">
                                {{$users->User->phone}}
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12">
                           <div class="row">
                            <div class="col-md-4 col-xs-4 col-sm-4">Email:</div>
                            <div class="col-md-8 col-xs-8 col-sm-8">
                                {{$users->User->email}}
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12">
                           <div class="row">
                            <div class="col-md-4 col-xs-4 col-sm-4">Email:</div>
                            <div class="col-md-8 col-xs-8 col-sm-8">
                                {{$users->rate}}
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12">
                           <div class="row">
                            <div class="col-md-4 col-xs-4 col-sm-4">Availabilty:</div>
                            <div class="col-md-8 col-xs-8 col-sm-8">
                                {{$users->rate}}
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">Negiotiable:</div>
                            <div class="col-md-8 col-xs-8 col-sm-8">
                                {{$users->rate}}
                            </div>
                        </div>
                        </div>

                        <div class="col-md-12">
                           <div class="row">
                           
                            <div class="col-md-12" style="padding-top: 20px;">
                            <center>
                                 <a class="btn btn-primary" data-toggle="modal" href='#modal-id-{{$users->user_id}}'>Request</a>
                                    <div class="modal fade" id="#modal-id-{{$users->user_id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">Modal title</h4>
                                                </div>
                                                <form method="POST" action="/contactSeller/{{$users->user_id}}">
                                                {{csrf_field()}}
                                                <div class="modal-body">

                                                    <legend>Buyer's Details</legend>
                                                    
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
                                                            
                                                            <input type="tel" class="form-control" id="amount_dollar" placeholder="amount_dollar" name="amount_dollar">
                                                        </div>
                                                        <div class="form-group">
                                                            
                                                            <input type="textarea" class="form-control" id="comment" placeholder="Comments" name="comment">
                                                        </div>
                                                    </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                              </center>  
                            </div>
                            
                        </div>
                        </div>
                    </div>
                    
                    
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
        {{$user->links()}}
        </div>
</div>
    
@endsection