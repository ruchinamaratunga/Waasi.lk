<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Promoter Signup</title>
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

	<?php //include "header.php";?>

   	    <!--START TOP AREA-->
    <header class="top-area single-page" id="home">
        <!--<div class="top-area-bg-signup" data-stellar-background-ratio="0.6"></div>-->
		<div class="top-area-bg-signup-promoter" data-stellar-background-ratio="0.6"></div>
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
                                <!--<li><a href="#">Service</a>
                                    <ul>
										<li><a href="promoterSignup.php">Register as a Promoter</a></li>
										
                                    </ul>
                                </li>-->
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
										echo '<a href="login.php">LOGIN</a>';		
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
                            <h2>Signup to experience more!</h2>
                            <p>Join your Business with us...</P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--END TOP AREA-->

   
    <!--ABOUT AREA-->
	<section class="about-details-area gray-bg no-padding wow fadeIn">
		<div class="container-signup">	
      		<div class="form-promter">
				
			<form action="../Controller/signupPromoter.php" method="post">
				<input type="text" placeholder="Enter the User name" name="uid">
				<input type="text" placeholder="Enter the Promoter name" name="promoterName">
				<input type="email" placeholder="Enter your email" name="email">
				<input type="password" placeholder="Enter the password" name="password">
				<input type="password" placeholder="Re enter the password" name="re-password">
				<!--<input type="password" placeholder="Enter the password" name="password">
				<input type="password" placeholder="Re enter the password" name="re-password">-->
				<input type="number" placeholder="Enter your phone number" name="phone">
				<input type="text" placeholder="Enter the promoter web site*" name="website">
				<input type="text" placeholder="Enter the promoter facebook link*" name="fblink">
				<br />
				<p >* Enter if any, else left blank.</p>
				<button type="submit" name="signup-submit">Sign Up</button>
				
			</form>
		
			</div>
		</div>	
    </section>
			
	<?php include "footer.php";?>

</body>
</html>
