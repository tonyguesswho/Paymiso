  <!DOCTYPE html>
  <html>
  <head>
    <title>paymiso</title>
  <style type="text/css">
      .wrapper{width:60%; margin:5% auto;  box-shadow:0 0 2px #aaa; font-family:Hind;}
      .logo_header{width:100%; height:70px;background:#8DC53F;}
      .email_body{width:100%; padding:0 10px;}
      .receipt_list{width:100%;}
      .receipt_list .left_list{float:left; width:35%;}
      .receipt_list .right_list{float:left; width:65%;}
      .left_list b,.right_list b{width:100%; float:left; margin:0 0 10px 0;}
      .left_list span,.right_list span{width:100%; float:left; margin:0 0 5px 0;}
      .right_list span{text-align:left; padding-left: 2px;}
      .list_divider{width:100%; border-top:1px solid rgba(0,0,0,0.2);float:left;}
      
      .invoice_left{float:left; width:40%;}
      .invoice_right{float:left; width:60%;}
      h2{
        display:inline-block;
      }
      .btn{
          margin: 4px;
          
          width: 6em;
          height: 50px;
          font-size: 18px;
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
                               <span><b>{{$sellcoin->amount_dollar*$sellcoin->rate + (($sellcoin->amount_dollar*$sellcoin->rate)*0.0075)}}</b></span>
                          </div>
                    </div>
                    <div class="row">
                     <div class="invoice_trans col-lg-6">
                        <div class="invoice_left">
                           <a href="{{route('payEmailDone',['id' => $sellcoin->Transaction->sell_coin_id,'token' => $sellcoin->Transaction->transaction_token])}}"><button type="button" class="btn btn-fresh text-uppercase">Confirm</button></a>
                        </div>
                    </div>
                     <div class="invoice_trans col-lg-6">
                        <div class="invoice_right">
                           <a href="{{route('cancelEmailDone',['id'=>$sellcoin->Transaction->sell_coin_id,'token'=>$sellcoin->Transaction->transaction_token])}}"><button type="button" class="btn btn-sunny text-uppercase">Cancel</button></a>
                        </div>
                    </div> 
                  </div>
  </div>
</div>
  
  </body>
  </html>
 
  
        
