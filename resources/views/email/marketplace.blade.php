  <!DOCTYPE html>
  <html>
  <head>
    <title>Title</title>
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
                  <p style="padding-left: 10px;">You have a purchase request</p>
                    
                </div>
                <div class="email_body">
                    <h1 class="text-center">Transaction Details</h1>
                    <p>
                        You may wish to contact the buyer before proccessing the transaction
                    </p>
                    
                    <div class="receipt_list">
                        <div class="left_list">
                          
                            <span>Buyer's Name:</span>
                            <!-- <span>wallet Id:</span> -->
                            <span>Phone</span>
                            <span>Email</span>
                            <span>Amount USD:</span>
                            
                            <span>Comments</span>
                            
                            
                            
                        </div>
                          <div class="right_list">
                            <span>{{$marketplace_mail->name}}</span>
                            <span>{{$marketplace_mail->phone}}</span>
                            <span>{{$marketplace_mail->email}}</span>
                            <span>{{$marketplace_mail->amount_dollar}}</span>
                            
                            <span>{{$marketplace_mail->comments}}</span>
                            
                                
                        </div>
                        <span class="list_divider"></span>
                         
                    </div>
                    <div class="row">
                     <div class="invoice_trans col-lg-6 col-md-6">
                        <div class="invoice_left">
                           <a href="{{route('userDashboard')}}"><button  class="btn btn-fresh text-uppercase">Process Transaction</button></a>
                        </div>
                    </div>
                     <div class="invoice_trans col-lg-6 col-md-6">
                        <div class="invoice_right">
                           <a href=""><button type="button" class="btn btn-sunny text-uppercase">Cancel</button></a>
                        </div>
                    </div> 
                  </div>
  </div>
</div>
  
  </body>
  </html>
 
  
        
