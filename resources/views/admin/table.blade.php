@extends('admin.template')

@section('content')
<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Striped Table with Hover</h4>
                                <p class="category">Use as u like ogbeni</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Table ID</th>
                                        <th>User ID</th>
                                        <th>Account Name</th>
                                        <th>Account Number</th>
                                        <th>Bank Name</th>
                                        <th>Amount</th>
                                    </thead>
                                    @foreach($withdraw as $withdraws)
                                    <tbody>
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$withdraws->user_id}}</td>
                                            <td>{{$withdraws->account_name}}</td>
                                            <td>{{$withdraws->account_number}}</td>
                                            <td>{{$withdraws->bank_name}}</td>
                                            <td>{{$withdraws->amount}}</td>
                                        </tr>    
                                    </tbody>
                                    @endforeach
                                </table>

                            </div>
                        </div>
                    </div>






@endsection