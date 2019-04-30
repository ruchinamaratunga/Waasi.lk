<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Promoter Login</title>
    <link rel="shortcut icon" type="image/ico" href="<?=PROOT?>img/favicon.png" />
	
    <!--====== STYLESHEETS ======-->
	<link rel="stylesheet" href="<?=PROOT?>css/normalize.css">
    <link rel="stylesheet" href="Extra/css/normalize.css">
    <link rel="stylesheet" href="<?=PROOT?>css/animate.css">
    <link rel="stylesheet" href="<?=PROOT?>css/stellarnav.min.css">
    <link rel="stylesheet" href="<?=PROOT?>css/owl.carousel.css">
    <link href="<?=PROOT?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=PROOT?>css/font-awesome.min.css" rel="stylesheet">
	<link href="<?=PROOT?>css/imagehover.min.css" rel="stylesheet">

    <!--====== MAIN STYLESHEETS ======-->
	<link rel="stylesheet" href="<?=PROOT?>css/style2.css">
    <link href="style.css" rel="stylesheet">
    <link href="<?=PROOT?>css/responsive.css" rel="stylesheet">
	<link href="<?=PROOT?>css/ihover.css" rel="stylesheet">

    <script src="<?=PROOT?>js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body class="single-page">

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!--- PRELOADER -->
    <div class="preeloader">
        <div class="preloader-spinner"></div>
    </div>

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--START TOP AREA-->
    <header class="top-area single-page" id="home">
        <div class="top-area-bg-login-promoter" data-stellar-background-ratio="0.6"><div class="login-top"></div></div>
        <div class="header-top-area">
            <!--MAINMENU AREA-->
            <div class="mainmenu-area" id="mainmenu-area">
                <div class="mainmenu-area-bg"></div>
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="index.php" class="navbar-brand"><img src="<?=PROOT?>img/logo.png" alt="logo"></a>
                        </div>
                        <div class="search-and-language-bar pull-right">
                            <ul>
								<?php
									if (! isset($_SESSION["userName"])){
										echo '<li><a href="login.php"><i class="fa fa-user"></i></a></li>';
										
									}
								?>
                                
                                <li class="search-box"><i class="fa fa-search"></i></li>
                               	</li>
                            </ul>
                            <form action="#" class="search-form">
                                <input type="search" name="search" id="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div id="main-nav" class="stellarnav">
                            <ul id="nav" class="nav navbar-nav">
								<li><a href="index.php">home</a></li>
								<li><a href="#">about</a>
                                </li>
                                <li><a href="#">Service</a>
                                    <ul>
										<li><a href="promoterLogin.php">Login as a promoter</a></li>
										<li><a href="promoterTemplate.php">Login as a promoter112</a></li>
                                    </ul>
                                </li>
								<li class="logged-user">
									<?php
									
									if (isset($_SESSION["userName"])){
										
										$username = $_SESSION["userName"];
										echo '<a href="#" class="logged-user" background-colour="lightsalmon">
									'.$username.'
									</a>
                                    <ul>
                                        <li class="logout-submit"><a href="../Controller/logout.php">Logout</a></li>
                                    </ul>';
									}
									
									else{
										echo '<a href="login.php">LOGIN AS A CUSTOMER</a>';		
									}
								?>								
								</li>	
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!--END MAINMENU AREA END-->
        </div>
        <div class="welcome-area">
            <div class="area-bg"></div>
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="welcome-text text-center">
                            <h2>Login to enjoy!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--END TOP AREA-->

    <!--ABOUT AREA-->
	<section class="about-area gray-bg section-padding">
		
        <div class="container-login">
			<div class="login-box">
			  <form action="includes/login.php" method="post">
					<input type="text" placeholder="Enter the user name" name="uid">
					<input type="password" placeholder="Enter the password" name="password"><br>
					<input type="submit" value="Login" name="login-promoter-submit"><br>
					<a href="#">Lost your password</a><br>
					<a href="promoterSignup.php">Don't have an account</a>
			</form>

		</div>  
           
        </div>
    </section>
			

    <!--FOOER AREA-->
    <div class="footer-area dark-bg">
        <div class="footer-area-bg"></div>
        <div class="footer-top-area wow fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="subscribe-content">
                            <h2>WAASI.LK</h2>
                            <p>The biggest promotion collection in Sri Lanka.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-border"> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area wow fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                        <div class="single-footer-widget footer-about"></div>
                    </div>
					
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                        <div class="single-footer-widget list-widget">
                            <h3>Customer Service</h3>
                            <ul>
                                <li><a href="#">Support Forums</a></li>
                                <li><a href="#">Communication</a></li>
                                <li><a href="#">FAQS</a></li>
								<li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
					
					<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                        <div class="single-footer-widget list-widget">
                            <h3>Main Catgories</h3>
                            <ul>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Movies</a></li>
                                <li><a href="#">Cloths and Accessories</a></li>
								<li><a href="#">Electronic Equipments</a></li>
                                <li><a href="#">Sports Equipments</a></li>
								<li><a href="#">Other</a></li>
                            </ul>
                        </div>
                    </div>
					
					<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                        <div class="single-footer-widget footer-about">
                            <h3>About Us</h3>
                            <p>We revolutionside the way of promotion in the country.</p>
                            <ul>
                                <li><i class="fa fa-phone"></i> <a href="callto:+8801911854378">011-299-9999</a></li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:backpiper.com@gmail.com">xxx.com@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
					<!--<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                        <div class="single-footer-widget instafeed-widget">
                            <h3>Main Categories</h3>
                            <ul>
								<li>
								<div class="ih-item square colored effect4"><a href="#">
									<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
									<div class="mask1"></div>
									<div class="mask2"></div>
									<div class="info">
										<h3>Food</h3>
								</li>
									
								<li>
								<div class="ih-item square colored effect4"><a href="#">
									<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
									<div class="mask1"></div>
									<div class="mask2"></div>
									<div class="info">
										<h3>Food</h3>
								</li>
								
								<li>
								<div class="ih-item square colored effect4"><a href="#">
									<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
									<div class="mask1"></div>
									<div class="mask2"></div>
									<div class="info">
										<h3>Food</h3>
								</li>
									
								<li>
								<div class="ih-item square colored effect4"><a href="#">
									<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
									<div class="mask1"></div>
									<div class="mask2"></div>
									<div class="info">
										<h3>Food</h3>
								</li>
									
								<li>
								<div class="ih-item square colored effect4"><a href="#">
									<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
									<div class="mask1"></div>
									<div class="mask2"></div>
									<div class="info">
										<h3>Food</h3>
								</li>
									
								<li>
								<div class="ih-item square colored effect4"><a href="#">
									<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
									<div class="mask1"></div>
									<div class="mask2"></div>
									<div class="info">
										<h3>Food</h3>
								</li>
									
								
									
                            <!--    <li><a href="#"><img src="img/instafeed/04-fashion-upgrades-classic-coat11s.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/instafeed/04-fashion-upgrades-classic-coats (1).jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/instafeed/Girl_Soccer_Goalie.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/instafeed/movies.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/instafeed/perfect-selfie.jpg" alt=""></a></li>-->
                           <!-- </ul>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-border"> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="footer-copyright wow fadeIn">
                           
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="footer-social-bookmark text-right wow fadeIn">
                            <ul class="social-bookmark">
								<li><a href="https://www.facebook.com/%E0%B7%80%E0%B7%8F%E0%B7%83%E0%B7%92lk-491144901414109/?modal=admin_todo_tour"><i class="fa fa-facebook fa-2x"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
                            </ul>
                        </div>
                    </div>
					
                </div>
            </div>
        </div>
    </div>
    <!--FOOER AREA END-->
	
    <!--====== SCRIPTS JS ======-->
    <script src="<?=PROOT?>js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?=PROOT?>js/vendor/bootstrap.min.js"></script>

    <!--====== PLUGINS JS ======-->
    <script src="<?=PROOT?>js/vendor/jquery.easing.1.3.js"></script>
    <script src="<?=PROOT?>js/vendor/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?=PROOT?>js/vendor/jquery.appear.js"></script>
    <script src="<?=PROOT?>js/owl.carousel.min.js"></script>
    <script src="<?=PROOT?>js/stellar.js"></script>
    <script src="<?=PROOT?>js/wow.min.js"></script>
    <script src="<?=PROOT?>js/stellarnav.min.js"></script>
    <script src="<?=PROOT?>js/contact-form.js"></script>
    <script src="<?=PROOT?>js/jquery.sticky.js"></script>

    <!--===== ACTIVE JS=====-->
    <script src="<?=PROOT?>js/main.js"></script>
</body>
</html>
