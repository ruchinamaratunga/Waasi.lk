<?php
	
	include("../Model/Person.php");
	session_start();
	$person = new Person();
	$viewPromo = $person->getReadPromotionFromDBCategory("food");

?>


<!doctype html>

<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>Food Promotions</title>
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
	
    <!--- PRELOADER -->
    <div class="preeloader">
        <div class="preloader-spinner"></div>
    </div>

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--START TOP AREA-->
    <header class="top-area single-page" id="home">
        <div class="top-area-bg-food" data-stellar-background-ratio="0.6"></div>
        <div class="header-top-area">
            <!--MAINMENU AREA-->
            <div class="mainmenu-area" id="mainmenu-area">
                <div class="mainmenu-area-bg"></div>
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="#home" class="navbar-brand"><img src="<?=PROOT?>img/logo.png" alt="logo"></a>
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
								<li><a href="#">home</a></li>
								<li><a href="#">about</a>
                                </li>
                        		<?php
									if(!(isset($_SESSION["userNamePromoter"]))){
										echo ('<li><a href="#">Service</a>
                                    <ul>
										<li><a href="promoterSignup.php">Register as a promoter</a></li>
                                    </ul>
                                </li>');
									}
								?>
								<li class="logged-user">
									<?php
									
									if (isset($_SESSION["userName"])){
										
										$username = $_SESSION["userName"];
										if (isset($_SESSION['userNameCustomer'])){
											echo '<a href="index.php" class="logged-user" background-colour="lightsalmon">
											'.$username.'
											</a>';
										}
										elseif(isset($_SESSION['userNamePromoter'])){
											echo '<a href="promoterIndex.php" class="logged-user" background-colour="lightsalmon">
											'.$username.'
											</a>';											
										}
										else{
											echo '<a href="adminView.php" class="logged-user" background-colour="lightsalmon">
											'.$username.'
											</a>';											
										}
										

										echo '<ul>
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
                            <h2>Food promotions</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--END TOP AREA-->

    <!--ABOUT DETAILS AREA-->
    <section class="about-details-area section-padding wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="tab-content about-details-content">
                        <div id="team" class="team-list tab-pane fade in active">
                            <div class="row">
								
								<?php
									
									if(empty($viewPromo)){
										echo('<div class="single-blog wow fadeIn">
											<div class="blog-details">
												<div class="blog-meta"></div>
												<h3>NO PENDING PROMOTIONS</h3>
											</div>
										</div><br />');
									}
									else{

										$len = count($viewPromo);
										for ($i=0; $i<$len; $i++){
											$tempPromo = $viewPromo[$i];
											echo('<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-team">
                                        <div class="member-image">
                                            <img src="'.$tempPromo->getImage().'" alt="">
                                        </div>
                                        <div class="member-details">
                                            <h3>Company : '.$tempPromo->getPr_name().'</h3>
                                            <p>'.$tempPromo->getDescription().'</p>
                                            <div class="member-social-bookmark">
                                                <ul class="social-bookmark">
                                                    <li><a href="promoterTemplate.php?pr_username='.$tempPromo->getPr_username().'"><i class="fa fa-phone"></i></a></li>
													 <li><a href="#"><i class="fa fa-book"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>');

										}
									}
								
								
								
								
								?>
								
								
								
								
								
								
								
                                <!--<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-team">
                                        <div class="member-image">
                                            <img src="img/team/member-1.jpg" alt="">
                                        </div>
                                        <div class="member-details">
                                            <h3>John Bruig</h3>
                                            <p>Founder 'G'</p>
                                            <div class="member-social-bookmark">
                                                <ul class="social-bookmark">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-team">
                                        <div class="member-image">
                                            <img src="img/team/member-2.jpg" alt="">
                                        </div>
                                        <div class="member-details">
                                            <h3>Lara Dotto</h3>
                                            <p>Founder 'G'</p>
                                            <div class="member-social-bookmark">
                                                <ul class="social-bookmark">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-team">
                                        <div class="member-image">
                                            <img src="img/team/member-3.jpg" alt="">
                                        </div>
                                        <div class="member-details">
                                            <h3>Labong Mitro</h3>
                                            <p>Founder 'G'</p>
                                            <div class="member-social-bookmark">
                                                <ul class="social-bookmark">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-team">
                                        <div class="member-image">
                                            <img src="img/team/member-4.jpg" alt="">
                                        </div>
                                        <div class="member-details">
                                            <h3>John Part</h3>
                                            <p>Founder 'G'</p>
                                            <div class="member-social-bookmark">
                                                <ul class="social-bookmark">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-team">
                                        <div class="member-image">
                                            <img src="img/team/member-5.jpg" alt="">
                                        </div>
                                        <div class="member-details">
                                            <h3>Jora Pata</h3>
                                            <p>Founder 'G'</p>
                                            <div class="member-social-bookmark">
                                                <ul class="social-bookmark">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-team">
                                        <div class="member-image">
                                            <img src="img/team/member-6.jpg" alt="">
                                        </div>
                                        <div class="member-details">
                                            <h3>Dimra Ajax</h3>
                                            <p>Founder 'G'</p>
                                            <div class="member-social-bookmark">
                                                <ul class="social-bookmark">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <!--<div id="support" class="support-content tab-pane fade">
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-promo">
                                        <div class="promo-icon"><i class="fa fa-anchor"></i></div>
                                        <div class="promo-details">
                                            <h3>Our Location</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                    <div class="single-promo">
                                        <div class="promo-icon"><i class="fa fa-newspaper-o"></i></div>
                                        <div class="promo-details">
                                            <h3>Latest News</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-promo">
                                        <div class="promo-icon"><i class="fa fa-umbrella"></i></div>
                                        <div class="promo-details">
                                            <h3>24/7 Support</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                    <div class="single-promo">
                                        <div class="promo-icon"><i class="fa fa-bicycle"></i></div>
                                        <div class="promo-details">
                                            <h3>Fast Delevery</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <div class="promo-img">
                                        <img src="img/promo/promo_troli.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--ABOUT DETAILS AREA END-->

     <?php include "footer.php";?>
</body>

</html>
