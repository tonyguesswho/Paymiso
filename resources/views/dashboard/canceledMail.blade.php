  <!DOCTYPE html>
  <html>
  <head>
    <title>PayMiso</title>
    <style type="text/css">
      .wrapper{width:70%; margin:5% auto;height:100vh;  box-shadow:0 0 2px #aaa; font-family:Hind;}
      .logo_header{width:100%; height:70px;background:#5fcf80;}
      .box_body{width:100%; padding:0 15px;}
      .btn{
          margin: 4px;
          width: 80px;
          height: 50px;
          font-size: 20px;
          background: #5fcf80;
          color: white;
         }
         textarea {
        width: 80%;
        height: 150px;
        padding: 10px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        resize: none;
      
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
                <div class="box_body">
                    <h3 class="text-center">Please, kindly give us a brief reason for cancelling this transaction</h1>
                    
                    
                    <div>
                      <form class="well" method="POST" action="/canceled/email/{{$id}}/{{$token}}">
                        {{csrf_field()}}
                       <div>
                
                        <textarea class="" id="message" name="reason" rows="10">
                  </textarea>
                    </div>
                    <button class="btn btn-succesks pull-right" type="submit">Submit</button>
                  </form>
              
                    
                    
                  </div>
            </div>
            
      </div>
  </div>
  
  </body>
  </html>
 
  
        
   