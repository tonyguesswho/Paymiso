  <!DOCTYPE html>
  <html>
  <head>
    <title>Title</title>
    <style type="text/css">
      .wrapper{width:70%; margin:5% auto;height:100vh;  box-shadow:0 0 2px #aaa; font-family:Hind;}
      .logo_header{width:100%; height:70px;background:#5fcf80; padding:10px;}
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
      .btn {
            border-radius: 0;
            border: 0;
            margin: 4px;
          width: 80px;
          height: 50px;
          font-size: 20px;
        }
      .btn-info {
                  background-color: #5fcf80;
                  color: #fff;
                }    
        
      .btn-danger {
              background-color: #d73814;
              color: #fff;
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
                    
                    <div class="invoice_trans">
                        <div class="invoice_left">
                           <a href="{{route('payEmailDone',['id' => $sellcoin->id,'token'=>$sellcoin->Transaction->transaction_token])}}"><button type="button" class="btn btn-info btn-lg btn-block text-uppercase">PAY</button></a>
                        </div>
                        <div class="invoice_right">
                            <a href="{{route('cancelEmailDone',['id' => $sellcoin->id,'token'=>$sellcoin->Transaction->transaction_token])}}"><button type="button" class="btn btn-danger text-uppercase">Cancel</button></a>
                        </div>
                    </div>
                    
                </div>
            </div>
            
  </div>
</div>
  
  </body>
  </html>
 
  
        
   