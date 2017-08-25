  <!DOCTYPE html>
  <html>
  <head>
    <title>Title</title>
    <style type="text/css">
      .wrapper{width:60%; margin:5% auto;height:100vh;  box-shadow:0 0 2px #aaa; font-family:Hind;}
      .logo_header{width:100%; height:70px;background:#8DC53F; padding:10px;}
      .email_body{width:100%; padding:0 15px;}
      .receipt_list{width:100%;}
      .receipt_list .left_list{float:left; width:40%;}
      .receipt_list .right_list{float:left; width:60%;}
      .left_list b,.right_list b{width:100%; float:left; margin:0 0 10px 0;}
      .left_list span,.right_list span{width:100%; float:left; margin:0 0 5px 0;}
      .right_list span{text-align:left; padding-left:15%;}
      .list_divider{width:100%; border-top:1px solid rgba(0,0,0,0.2);float:left;}
      .invoice_trans{width:100%;float:left; margin:5px 0;}
      .invoice_left{float:left; width:40%;}
      .invoice_right{float:left; width:60%;}
      h2{
        display:inline-block;
      }
      .btn{
          margin: 4px;
          
          width: 80px;
          height: 50px;
          font-size: 20px;
         }
        .btn-sunny {
          color: #fff;
          background-color:#f5b75f ;
          border-bottom:2px solid #c38a3a;
          }

       .btn-fresh {
          color: #fff;
          background-color: #8DC53F;
          border-bottom:2px solid #41996c;
          }
    </style>
     <link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  <div class="row">
            
            <div class="wrapper">
                <div class="logo_header">
                    <a href=""><img src=""/></a>
                </div>
                <div class="email_banner">
                    
                </div>
                <div class="email_body">
                    <h1 class="text-center">Bitcoin Transaction Details</h1>
                    <p>
                        Kindly go through the details below before making payment
                    </p>
                    
                    <div class="receipt_list">
                        <div class="left_list">
                          
                            <span>Seller's Name:</span>
                            <span>Buyer's Id:</span>
                            <span>Amount BTC:</span>
                            <span>Amount USD:</span>
                            <span>Rate:</span>
                            <span>Amount NGN:</span>
                            <span>Escrow fee (0.75% for each participant):</span>
                            
                        </div>
                          <div class="right_list">
                            
                                 <span>{{$sellcoin->User->firstname}}&nbsp{{$sellcoin->User->lastname}}</span>
                                 <span>{{$sellcoin->wallet_id}}</span>
                                 <span>{{$sellcoin->amount_btc}}</span>
                                 <span>{{number_format($sellcoin->amount_dollar,2)}}</span>
                                 <span>{{$sellcoin->rate}}</span>
                                 <span>{{number_format($sellcoin->amount_dollar*$sellcoin->rate,2)}}</span>
                                 <span>{{number_format(($sellcoin->amount_dollar*$sellcoin->rate)*0.0075,2)}}</span>
                        </div>
                        <span class="list_divider"></span>
                         <div class="left_list">
                             <b>Total</b>
                              </div>
                          <div class="right_list">
                               <span><b>{{number_format($sellcoin->amount_dollar*$sellcoin->rate,2)+number_format(($sellcoin->amount_dollar*$sellcoin->rate)*0.0075,2)}}</b></span>
                          </div>
                    </div>

        <form method="post" action="{{ route('pay', ['id'=>$sellcoin->id]) }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                    
            <input type="hidden" name="email" value="collinsuchinaka@gmail.com"> {{-- required --}}
            <input type="hidden" name="orderID" value="{{$sellcoin->id}}">
            <input type="hidden" name="amount" value="100000"> {{-- required in kobo --}}
            <!-- <input type="hidden" name="quantity" value="3"> -->
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
            {{ csrf_field() }} 

             <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <div class="invoice_trans" class="form-group">
                        <div class="invoice_left">
                           <button type="submit" class="btn btn-fresh text-uppercase">PAY</button>
                        </div>
        
                    </div>
                    
                </div>
            </div>
         </form>   
  </div>
</div>
  
  </body>
  </html>
 
  
        
