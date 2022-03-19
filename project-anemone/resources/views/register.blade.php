<!DOCTYPE html>
<html class=" webkit chrome win js webkit chrome win js webkit chrome win js">

<head>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <title>Anemone Register</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,500,700,600,800" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/icheck/minimal/yellow.css" rel="stylesheet">
    <!--[if IE 7]>
      
        <link href="css/font-awesome/css/font-awesome-ie7.min.css" rel="stylesheet">
        
        <![endif]-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">

</head>
<section style="background-color: #FFFFFF;">

    <body>
        <h2>Anemone Register</h2>
        <section class="section-head">
            <div class="container">
                <div class="imgcontainer">
                    <img src="anemone.png" alt="Avatar" class="avatar">
                </div>

            </div>
        </section>


        <section class="section-checkout">
            <div class="container">
                <div class="h-100 h-custom">
                    <div class="form-holder">

                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="control-group">

                                <div class="controls">
                                    <div class="form-label ">Email</div>

                                    <input type="text" name="email" class="required span8 cusmo-input">
                                    @error('email')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}

                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">

                                    <div class="controls">
                                        <div class="form-label ">Full Name</div>

                                        <input type="text" name="name" class="required span8 cusmo-input">
                                        @error('name')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}

                                            @enderror

                                        </div>
                                    </div>
                                    <div class="control-group">

                                        <div class="controls">
                                            <div class="form-label ">User Name</div>

                                            <input type="text" name="username" class="required span8 cusmo-input">
                                            @error('name')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}

                                                @enderror

                                            </div>
                                        </div>
                                        <div class="control-group">

                                            <div class="controls">
                                                <div class="form-label ">Password</div>

                                                <input type="password" name="password" class="required span8 cusmo-input">
                                                @error('password')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}

                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="control-group">

                                                <div class="controls">
                                                    <div class="form-label ">Re-Password</div>

                                                    <input type="password" name="password_confirmation" class="required span8 cusmo-input">
                                                    @error('password_confirmation')
                                                    <div class="text-red-500 mt-2 text-sm">
                                                        {{ $message }}

                                                        @enderror

                                                    </div>
                                                </div>
                                                <div style="text-align: center">
                                                    <button style="height:70px; width:250px" class="cusmo-btn narrow center" type="submit">register</button>
                                                </div>
                                                <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="#!" class="fw-bold text-body"><u>Login here</u></a></p>
                        </form>
                        <div class="container" style="background-color:#fff">
                            <button type="button" class="cancelbtn">Cancel</button>
                        </div>
                    </div>

                </div>
        </section>

        <section class="section-homepage-subscribe">
            <div class="container">
                <div class="big-circle">

                    get the
                    <div class="big"><span>$</span>10</div>
                    coupon

                </div>
                <div class="offer-text">
                    Sign in for our newsletter and recieve a ten dollars coupon
                </div>
                <div class="email-holder">

                    <div class="email-field">

                        <form>
                            <input class="required email placeholder" name="email" data-placeholder="Enter here your email address...">
                            <button class="newsletter-submit-btn" type="submit" value=""><i class="icon-plus"></i></button>

                        </form>

                    </div>
                </div>
            </div>
        </section>

        <section class="section-footer">
            <div class="container">
                <div class="row-fluid">
                    <div class="span3">

                    </div>
                    <div class="span3">

                    </div>
                    <div class="span3">

                    </div>
                    <div class="span3">
                        <div class="footer-links-holder">
                            <h2>get in touch</h2>
                            <p>
                                Cosmetico Shop<br> Good Town 122, Beaty Centre<br> (011) 212 222 22
                            </p>
                            <ul class="inline social-icons">
                                <li>
                                    <a href="#" class="icon-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="icon-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="icon-rss"></a>
                                </li>

                                <li>
                                    <a href="#" class="icon-linkedin"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-copyright">
            <div class="container">
                <div class="copyright pull-left">
                    <p>Copyright © 2022.Company name All rights reserved.</p>
                </div>
                <div class="copyright-links pull-right">
                    <ul class="inline">
                        <li><a href="#">privacy policy</a></li>
                        <li><a href="#">terms &amp; conditions</a></li>
                        <li><a href="#">site map</a></li>
                    </ul>
                </div>
            </div>
        </section>

        </div>


        <!-- <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
        <script src="js/jquery-migrate-1.1.1.min.js"></script>
        <script src="css/bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="js/css_browser_selector.js"></script>
        <script src="js/jquery.icheck.min.js"></script>
        <script type="text/javascript" src="js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing-1.3.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>


        <script type="text/javascript" src="js/bootstrap-slider.js"></script>


        <script type="text/javascript" src="js/script.js"></script> -->






    </body>
</section>

</html>