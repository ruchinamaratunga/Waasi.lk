<?php
	//include("../Controller/dbh.php");
	include_once("../Model/Administrator.php");
	
	// session_start();
	// if(isset($_SESSION['userNameAdmin'])){
	// 	$dbh = new Dbh();
	// 	$admin = new Administrator($dbh);
	// 	$viewPromo = $admin->getViewPromotion();
	// }
	// else{
	// 	header("Location: ../View/404.php");
	// 	exit();

	// }
	
?>
<!doctype html>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <title>ADMIN</title>
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
    <header class="top-area single-page-promoter" id="home">
       <div class="top-area-bg-promoter-template" data-stellar-background-ratio="0.6">
		   <div class = "brand admin">
			   <h2>ADMINSTRATOR</h2>
		   </div>
	   </div>
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
								<li><a href="index.php">home</a></li>
								<li><a href="about.html">about</a>
                                </li>
                                <li><a href="service.html">Service</a>
                                    <ul>
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
       <!-- <div class="welcome-area">
            <div class="area-bg"></div>
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="welcome-text text-center">
                            <h2>Blog</h2>
                            <ul class="page-location">
                                <li><a href="#">Home</a></li>
                                <li>/</li>
                                <li><a href="#">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </header>
    <!--END TOP AREA-->

    <!--BLOG AREA-->
    <section class="blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
					<?php
					//View Pending promotion to admin to accept or reject
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
								echo('<div class="single-blog wow fadeIn">
								<div class="blog-image">
									<img src="'.$tempPromo->getImage().'" alt="">
								</div>
								<div class="blog-details">
									<div class="blog-meta"></div>
									<h3>Promoter Username- '.$tempPromo->getPr_username().'</h3>
									<h4>Category - '.$tempPromo->getCategory().'</h4>
									<div class="post-date"><a href="#"><i class="fa fa-calendar"></i>'.$tempPromo->getStartDate().'</a>&nbsp; &nbsp; to &nbsp; &nbsp; <a href="#"><i class="fa fa-calendar"></i>'.$tempPromo->getEndDate().'</a></div>
									<br />
									<h5>content</h5>
									<p>'.$tempPromo->getDescription().'</p>
									<a href="../Controller/acceptRejectPromotion.php?acceptedPromoID='.$tempPromo->getPromoID().'" class="read-more">ACCEPT</a>
									&nbsp; &nbsp; &nbsp;
									<a href="../Controller/acceptRejectPromotion.php?rejectedPromoID='.$tempPromo->getPromoID().'" class="read-more">REJECT</a>
								</div>
							</div><br />');
							}							
						}
					?>
                   <!--<div class="single-blog wow fadeIn">
                        <div class="blog-image">
                            <img src="<?=PROOT?>img/blog/blog_7.jpg" alt="">
                        </div>
                        <div class="blog-details">
                            <div class="blog-meta"></div>
                            <h3><a href="single-blog.html">Quick Transportation Service in the world</a></h3>
                            <div class="post-date"><a href="#"><i class="fa fa-calendar"></i>20 January, 2015</a>&nbsp; &nbsp; &nbsp;<a href="#"><i class="fa fa-calendar"></i>20 January, 2015</a></div>
							
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                            <a href="single-blog.html" class="read-more">ACCEPT</a>
							&nbsp; &nbsp; &nbsp;
							<a href="single-blog.html" class="read-more">REJECT</a>
                        </div>
                    </div>
                    <div class="single-blog wow fadeIn">
                        <div class="blog-image">
                            <img src="<?=PROOT?>img/blog/blog_8.jpg" alt="">
                        </div>
                        <div class="blog-details">
                            <div class="blog-meta"><a href="#"><i class="fa fa-ship"></i></a></div>
                            <h3><a href="single-blog.html">Quick Transportation Service in the world</a></h3>
                            <div class="post-date"><a href="#"><i class="fa fa-calendar"></i>20 January, 2015</a></div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                            <a href="single-blog.html" class="read-more">Read More</a>
                        </div>
                    </div>
                    <div class="single-blog wow fadeIn">
                        <div class="blog-image">
                            <img src="<?=PROOT?>img/blog/blog_9.jpg" alt="">
                        </div>
                        <div class="blog-details">
                            <div class="blog-meta"><a href="#"><i class="fa fa-ship"></i></a></div>
                            <h3><a href="single-blog.html">Quick Transportation Service in the world</a></h3>
                            <div class="post-date"><a href="#"><i class="fa fa-calendar"></i>20 January, 2015</a></div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                            <a href="single-blog.html" class="read-more">Read More</a>
                        </div>
                    </div>
                    <div class="single-blog wow fadeIn">
                        <div class="blog-image">
                            <img src="<?=PROOT?>img/blog/blog_10.jpg" alt="">
                        </div>
                        <div class="blog-details">
                            <div class="blog-meta"><a href="#"><i class="fa fa-ship"></i></a></div>
                            <h3><a href="single-blog.html">Quick Transportation Service in the world</a></h3>
                            <div class="post-date"><a href="#"><i class="fa fa-calendar"></i>20 January, 2015</a></div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                            <a href="single-blog.html" class="read-more">Read More</a>
                        </div>
                    </div>-->
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="sidebar-area wow fadeIn">
                        <div class="single-sidebar-widget widget_categories">
                            <h4>Main Categories</h4>
                            <ul>
                                <li><a href="food.php">Food</a></li>
                                <li><a href="#">Cloths and Accessories</a></li>
                                <li><a href="#">Movies</a></li>
                                <li><a href="#">Electronic Devices</a></li>
                                <li><a href="#">Sports Equipments</a></li>
								<li><a href="#">Other</a></li>
                            </ul>
                        </div>
                       <!--<div class="single-sidebar-widget widget_recent_entries">
                            <h4>Latest Post</h4>
                            <ul>
                                <li>
                                    <div class="alignleft"><img src="img/blog/thumb-1.jpg" alt=""></div>
                                    <a href="#">2016 Latest News From Logistics Transportation Service.</a>
                                </li>
                                <li>
                                    <div class="alignleft"><img src="img/blog/thumb-2.jpg" alt=""></div>
                                    <a href="#">2016 Latest News From Logistics Cargo Service.</a>
                                </li>
                                <li>
                                    <div class="alignleft"><img src="img/blog/thumb-3.jpg" alt=""></div>
                                    <a href="#">2016 Latest News From Logistics Transportation Service.</a>
                                </li>
                                <li>
                                    <div class="alignleft"><img src="img/blog/thumb-4.jpg" alt=""></div>
                                    <a href="#">2016 Latest News From Logistics Cargo Service.</a>
                                </li>
                            </ul>
                        </div>-->
                       <!-- <div class="single-sidebar-widget widget_tag_cloud">
                            <h4>Pupular Tags</h4>
                            <div class="tagcloud">
                                <a href="#">Design</a>
                                <a href="#">Transport</a>
                                <a href="#">Cargo</a>
                                <a href="#">Freight</a>
                                <a href="#">Logistic</a>
                                <a href="#">Truck</a>
                                <a href="#">Shipping</a>
                                <a href="#">ware house</a>
                            </div>
                        </div>-->
                    </div>
                </div> 
            </div>
            <!--<div class="row">
                <div class="col-md-12 col-xs-12">
                    <ul class="pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>-->
        </div>
    </section>
    <!--BLOG AREA END-->

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
                                <li><a href="food.php">Food</a></li>
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
