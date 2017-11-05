
<!DOCTYPE html>

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Paymiso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,600,400italic,700' rel='stylesheet' type='text/css'>
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Flexslider -->
    <link rel="stylesheet" href="css/flexslider.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    </head>

    <body>
    
    <!-- Loader -->
    <div class="fh5co-loader"></div>
    
    <div id="fh5co-page">
        <section id="fh5co-header">
            <div class="container">
                <nav role="navigation">
                    <ul class="pull-left left-menu">
                        <li id="naira"><a href="#">BTC/NGN &nbsp {{number_format($current_price_usd->data->prices[1]->price*$presentRate,2)}}</a></li>
                        <li><a href="/faq">FAQ</a></li>
                        <li><a href="https://blog.paymiso.com/" target="_blank">Blog</a></li>
                        <li><a href="/marketPlace" target="_blank">Marketplace</a></li>
                    </ul>
                    <h1 id="fh5co-logo"><a href="{{ url('/') }}"><span><img src="images/logowgn.png"></span></a></h1>
                    <ul class="pull-right right-menu">
                        @if(Auth::guest())
                        
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li class="fh5co-cta-btn"><a href="{{ url('/register') }}">Create Wallet</a></li>
                        @else
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method= "POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <li class="fh5co-cta-btn"><a href="{{ url('/userDashboard') }}">Wallet</a></li>
                         @endif
                    </ul>
                </nav>
            </div>
        </section>
        <!-- #fh5co-header -->

        <section id="fh5co-hero" class="js-fullheight" style="background-image: url(images/hero_bg.jpg);" data-next="yes">
            <div class="fh5co-overlay"></div>
            <div class="container">
                <div class="fh5co-intro js-fullheight">
                    <div class="fh5co-intro-text">
                        <!-- 
                            INFO:
                            Change the class to 'fh5co-right-position' or 'fh5co-center-position' to change the layout position
                            Example:
                            <div class="fh5co-right-position">
                        -->
                        <div class="fh5co-left-position">
                            <h2 class="animate-box">Secure and fast way to sell Bitcoin</h2>
                            <p class="animate-box"><a href="/sendhome" class="btn btn-outline popup-vimeo btn-video">SEND INSTANTLY </a> <a href="/sell" target="_blank" class="btn btn-primary">SELL WITH ESCROW</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fh5co-learn-more animate-box">
                <a href="#" class="scroll-btn">
                    <span class="text">Explore more about us</span>
                    <span class="arrow"><i class="icon-chevron-down"></i></span>
                </a>
            </div>
        </section>
        <!-- END #fh5co-hero -->


        <section id="fh5co-projects">
            <div class="container">
                <div class="row row-bottom-padded-md">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <h2 class="fh5co-lead animate-box">Easy Steps</h2>
                        <p class="fh5co-sub-lead animate-box">Paymiso Enables peer to peer exchanges in three simple steps. </p>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-4 col-sm-6 col-xxs-12 animate-box">
                        <a href="images/img_1.jpg" class="fh5co-project-item image-popup">
                            <img src="images/img_1.jpg" alt="Image" class="img-responsive">
                            <div class="fh5co-text">
                                <h2>Create Wallet</h2>
                                <p>Seller must have a wallet with BTC upto the amount he/she is willing to send  </p>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xxs-12 animate-box">
                        <a href="images/img_2.jpg" class="fh5co-project-item image-popup">
                            <img src="images/img_2.jpg" alt="Image" class="img-responsive">
                            <div class="fh5co-text">
                                <h2>Transaction Details</h2>
                                <p>Seller provides details for the transaction i.e Buyer's wallet id, Amount of BTC and Rate</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xxs-12 animate-box">
                        <a href="images/img_3.jpg" class="fh5co-project-item image-popup">
                            <img src="images/img_3.jpg" alt="Image" class="img-responsive">
                            <div class="fh5co-text">
                                <h2>Payment Confirmation</h2>
                                <p>Payment is made by buyer, The seller gets the cash and buyer receives bitcoin instantly</p>
                            </div>
                        </a>
                    </div>

                    
                    
                    
                </div>
            </div>
        </section>
        <!-- END #fh5co-projects -->

        <section id="fh5co-features">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12 animate-box">
                        <div class="fh5co-feature">
                            <div class="fh5co-icon">
                                <i class="icon-bitcoin"></i>
                            </div>
                            <h3>Secure Wallets</h3>
                            <p>Multi-Signature Wallet addresses keeps your coins safe</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 animate-box">
                        <div class="fh5co-feature">
                            <div class="fh5co-icon">
                                <i class="icon-flash"></i>
                            </div>
                            <h3>Fast and Stable</h3>
                            <p>99.99%+ uptime and average response time of only 80ms</p>
                        </div>
                    </div>
                    <div class="clearfix visible-sm-block"></div>
                    <div class="col-md-4 col-sm-6 col-xs-12 animate-box">
                        <div class="fh5co-feature">
                            <div class="fh5co-icon">
                                <i class="icon-clock-o"></i>
                            </div>
                            <h3>Instant transaction</h3>
                            <p>Transfer/sell yor bitcoin to any bitcoin address</p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 animate-box">
                        <div class="fh5co-feature">
                            <div class="fh5co-icon">
                                <i class="icon-credit-card"></i>
                            </div>
                            <h3>Card payment and Bank Transfer</h3>
                            <p>Buyers can make payment with all Nigerian cards and also pay for bitcoin with bank tranfers</p>
                        </div>
                    </div>
                    <div class="clearfix visible-sm-block"></div>
                    <div class="col-md-4 col-sm-6 col-xs-12 animate-box">
                        <div class="fh5co-feature">
                            <div class="fh5co-icon">
                                <i class="icon-money"></i>
                            </div>
                            <h3>Transfer of cash to sellers Account</h3>
                            <p>Cash is transfered promptly to seller's Nigerian Bank Account</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 animate-box">
                        <div class="fh5co-feature">
                            <div class="fh5co-icon">
                                <i class="icon-viacoin"></i>
                            </div>
                            <h3>Multi-currency</h3>
                            <p>Bitcoin-(Litecoin and Dogcoin coming soon)</p>
                        </div>
                    </div>
                    <div class="clearfix visible-sm-block"></div>
                </div>
            </div>
        </section>  

        <!-- END #fh5co-features -->


        
        <!-- END #fh5co-features-2 
        
        <section id="fh5co-testimonials">
            <div class="container">
                <div class="row row-bottom-padded-sm">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <div class="fh5co-label animate-box">Testimonials</div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center animate-box">
                        <div class="flexslider">
                            <ul class="slides">
                               <li>
                                  <blockquote>
                                    <p>&ldquo;Now i no longer worry about scammers&rdquo;</p>
                                    <p><cite>&mdash; John</cite></p>
                                  </blockquote>
                               </li>
                               <li>
                                    <blockquote>
                                    <p>&ldquo;Smooth trasaction process.&rdquo;</p>
                                    <p><cite>&mdash; Frank </cite></p>
                                  </blockquote>
                               </li>
                               
                            </ul>
                        </div>
                        <div class="flexslider-controls">
                           <ol class="flex-control-nav">
                              <li class="animate-box"><img src="" alt=""></li>
                              <li class="animate-box"><img src="" alt=""></li>
                           </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       END #fh5co-testimonials -->

         <section id="fh5co-subscribe">
            <div class="container">
        
                <h3 class="animate-box"><label for="email">Subscribe to our newsletter</label></h3>
                <form action="https://outdear.us16.list-manage.com/subscribe/post?u=ef79da3c38a275b5d7f0001b6&amp;id=3ae57b52a0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <i class="fh5co-icon icon-paper-plane"></i>
                    <input type="email" class="form-control" placeholder="Enter your email" id="mce-EMAIL" name="EMAIL">
                     <div id="mce-responses" class="clear">
                     <div class="response" id="mce-error-response" style="display:none"></div>
                     <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>
                    <input type="submit" value="Subscribe" name="subscribe" id ="mc-embedded-subscribe"class="btn btn-primary">
                </form>

            </div>
        </section>
<!-- Begin MailChimp Signup Form -->


<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'>
</script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = 
    new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';}(jQuery));var $mcj = 
jQuery.noConflict(true);</script>
        <!-- END #fh5co-subscribe -->

        <footer id="fh5co-footer">
            <div class="container">
                <div class="row row-bottom-padded-md">
                    <div class="col-md-3 col-sm-6 col-xs-12 animate-box">
                        <div class="fh5co-footer-widget">
                            <h3>Company</h3>
                            <ul class="fh5co-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Pricing</a></li>
                                
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 animate-box">
                        <div class="fh5co-footer-widget">
                            <h3>Support</h3>
                            <ul class="fh5co-links">
                                <li><a href="#">24/7 Support</a></li>
                                <li><a href="/terms" target="_blank">Terms and Conditions</a></li>
                                <li><a href="/privacy" target="_blank">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 animate-box">
                        <div class="fh5co-footer-widget">
                            <h3>Contact Us</h3>
                            <p>
                                <a href="mailto:support@paymiso.com">support@paymiso.com</a> <br>
                                Roar Hub, <br>
                                UNN  <br>
                                <a href="tel:+8107268142">+8107268142</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 animate-box">
                        <div class="fh5co-footer-widget">
                            <h3>Follow Us</h3>
                            <ul class="fh5co-social">
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-google-plus"></i></a></li>
                                <li><a href="#"><i class="icon-instagram"></i></a></li>
                                <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                
            </div>
            <div class="fh5co-copyright animate-box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="fh5co-left"><small>&copy; 2017 <a href=""> Paymiso Technologies</a> All Rights Reserved.</small></p>
<!--                             <p class="fh5co-right"><small class="fh5co-right">Designed by <a href="" target="_blank">FREEHTML5.co</a> Demo Images: <a href="" target="_blank">Unsplash</a></small></p>
 -->                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END #fh5co-footer -->
    </div>
    <!-- END #fh5co-page -->
    
    

    
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Flexslider -->
    <script src="js/jquery.flexslider-min.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>

    

    <!-- Main JS (Do not remove) -->
    <script src="js/main.js"></script>

    <!-- 
    INFO:
    jQuery Cookie for Demo Purposes Only. 
    The code below is to toggle the layout to boxed or wide 
    -->
    
    

    </body>
</html>

