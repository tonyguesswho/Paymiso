<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction</title>

    <!-- Bootstrap CSS -->
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
   
    <style type="text/css">
      body {
  background-color: #CCCCCC;
}

body,p, h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4 {
  font-family: "Roboto", "Helvetica", "Arial", sans-serif;
  font-weight: 300;
  line-height: 2em;

}
p{
  font-size: 17px;
}
a, a:hover, a:focus {
  color: #9c27b0;
}
.nav-tabs {
  background: #9c27b0;
  border: 0;
  border-radius: 3px;
  padding: 0 15px;
}
.nav-tabs > li > h4 {
  color: #FFFFFF;
  border: 0;
  margin: 0;
  border-radius: 3px;
  line-height: 34px;
  text-transform: uppercase;
  font-size: 15px;
  
}

.card {
  display: inline-block;
  position: relative;
  width: 100%;
  border-radius: 3px;
  color: rgba(0,0,0, 0.87);
  background: #fff;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}

.card .card-content {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}

.card .content {
  padding: 15px;
}

.card .header {
  box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
  margin: 15px;
  border-radius: 3px;
  padding: 15px 0;
  background-color: #FFFFFF;
}

.card .header-success {
  background: linear-gradient(60deg, #66bb6a, #388e3c);
}

.card-nav-tabs {
  margin-top: 60px;
}
.card-nav-tabs .header {
  margin-top: -30px;
}
.card-nav-tabs .nav-tabs {
  background: transparent;
}
.btn {
  border: none;
  border-radius: 3px;
  position: relative;
  padding: 12px 30px;
  margin: 10px 1px;
  font-size: 14px;
  font-weight: 400;
  text-transform: uppercase;
  letter-spacing: 0;
  will-change: box-shadow, transform;
  transition: box-shadow 0.2s cubic-bezier(0.4, 0, 1, 1), background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
}


.btn.btn-primary, .btn.btn-primary:hover, .btn.btn-primary:focus, .btn.btn-primary:active, .btn.btn-primary.active, .btn.btn-primary:active:focus, .btn.btn-primary:active:hover, .btn.btn-primary.active:focus, .btn.btn-primary.active:hover{
  background-color: #03a9f4;
  color: #FFFFFF;
}
.btn.btn-primary:focus, .btn.btn-primary:active, .btn.btn-primary:hover {
  
  box-shadow: 0 14px 26px -12px rgba(3, 169, 244, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(3, 169, 244, 0.2);
}
.btn.btn-danger,
 {
  box-shadow: 0 2px 2px 0 rgba(244, 67, 54, 0.14), 0 3px 1px -2px rgba(244, 67, 54, 0.2), 0 1px 5px 0 rgba(244, 67, 54, 0.12);
}

.btn.btn-danger, .btn.btn-danger:hover, .btn.btn-danger:focus, .btn.btn-danger:active, .btn.btn-danger.active, .btn.btn-danger:active:focus, .btn.btn-danger:active:hover, .btn.btn-danger.active:focus, .btn.btn-danger.active:hover
 {
  background-color: #f44336;
  color: #FFFFFF;
}

</style>

    
  </head>
  <body>
    <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="title text-center">
              <h3>paymiso</h3>
            </div>

            <!-- Tabs with icons on Card -->
            <div class="card card-nav-tabs">
              <div class="header header-success">
                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                      <li class="active" style="width: 100%;">
                        <h4 class="text-center">
                          
                          Order Cancellation
                        </h4>
                      </li>
                      
                    </ul>
                  </div>
                </div>
              </div>
              <div class="content">
                <div class="tab-content text-center">
                  <div class="tab-pane active" id="profile">
                 
                 <p>Please, kindly give us a brief reason for cancelling this transaction</p>
                 <form method="POST" action="/canceled/email/{{$id}}/{{$token}}">
                 {{csrf_field()}}
                  <textarea name="reason" id="message" class="form-control" rows="3" required="required"></textarea>
                   
                  
                  <button class="btn btn-primary" type="submit">Submit</button>
                  
                 </form>
                  
                    
                  </div>
                  
                </div>
              </div>
            </div>
            
            <span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
          2017 © PayMiso Technologies LTD. ALL Rights Reserved.
        </span>
            <!-- End Tabs with icons on Card -->

          </div>
          </div>
          </div>

    

    <!-- jQuery -->
     <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>