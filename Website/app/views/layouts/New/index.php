<?php

	// session_start();
	// if(isset($_SESSION['userNameCustomer'])){
	// 	include_once("../Model/customer.php");
	// 	$tempCustomer = new Customer($_SESSION['userName'],$_SESSION['uemail'],$_SESSION['phone']);
	// 	$subscribedCompanies = $tempCustomer->getSubscribedCompanies();
	// }
		
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>වාසි.lk</title>
    <link rel="shortcut icon" type="image/ico" href="<?=PROOT?>img/favicon.png" />
	
    <!--====== STYLESHEETS ======-->
	<link rel="stylesheet" href="<?=PROOT?>css/normalize.css">
    <link rel="stylesheet" href="<?=PROOT?>css/normalize.css">
    <link rel="stylesheet" href="<?=PROOT?>css/animate.css">
    <link rel="stylesheet" href="<?=PROOT?>css/stellarnav.min.css">
    <link rel="stylesheet" href="<?=PROOT?>css/owl.carousel.css">
    <link href="<?=PROOT?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=PROOT?>css/font-awesome.min.css" rel="stylesheet">
	<link href="<?=PROOT?>css/imagehover.min.css" rel="stylesheet">

    <!--====== MAIN STYLESHEETS ======-->
	<link rel="stylesheet" href="<?=PROOT?>css/style2.css">
    <link href="<?=PROOT?>/css/style/style.css" rel="stylesheet">
    <link href="<?=PROOT?>css/responsive.css" rel="stylesheet">
	<link href="<?=PROOT?>css/ihover.css" rel="stylesheet">

    <script src="<?=PROOT?>js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="home-one">

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!--- PRELOADER -->
    <!-- <div class="preeloader">
        <div class="preloader-spinner"></div>
    </div> -->

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--START TOP AREA-->
    <header class="top-area" id="home">
        <div class="top-area-bg" data-stellar-background-ratio="0.6"></div>
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
									// if (! isset($_SESSION["userName"])){
									// 	echo '<li><a href="login.php"><i class="fa fa-user"></i></a></li>';
										
									// }
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
								// 	if(!(isset($_SESSION["userNamePromoter"]))){
								// 		echo ('<li><a href="#">Service</a>
                                //     <ul>
								// 		<li><a href="promoterSignup.php">Register as a promoter</a></li>
                                //     </ul>
                                // </li>');
								// 	}
								?>
								<li class="logged-user">
									<?php
									
									// if (isset($_SESSION["userName"])){
										
									// 	$username = $_SESSION["userName"];
									// 	if (isset($_SESSION['userNameCustomer'])){
									// 		echo '<a href="index.php" class="logged-user" background-colour="lightsalmon">
									// 		'.$username.'
									// 		</a>';
									// 	}
									// 	elseif(isset($_SESSION['userNamePromoter'])){
									// 		echo '<a href="promoterIndex.php" class="logged-user" background-colour="lightsalmon">
									// 		'.$username.'
									// 		</a>';											
									// 	}
									// 	else{
									// 		echo '<a href="adminView.php" class="logged-user" background-colour="lightsalmon">
									// 		'.$username.'
									// 		</a>';											
									// 	}
										

									// 	echo '<ul>
									// 		<li class="logout-submit"><a href="../Controller/logout.php">Logout</a></li>
									// 	</ul>';
									// }
									
									// else{
									// 	echo '<a href="login.php">LOGIN</a>';		
									// }
								?>								
								</li>	
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!--END MAINMENU AREA END-->
        </div>
        <!--HOME SLIDER AREA-->
        <div class="welcome-slider-area">
            <div class="welcome-single-slide slider-bg-one">
                <div class="container">
                    <div class="row flex-v-center">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="welcome-text text-center">
                                <h1>ALL YOUR PROMOTION NEEDS IN ONE PLACE!</h1>
                                <p>Without promotion, something terrible happens... nothing!</p>
                                <div class="home-button">
                                    <a href="#categories">Categories</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-single-slide slider-bg-two">
                <div class="container">
                    <div class="row flex-v-center">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="welcome-text text-center">
                                <h1>ALL YOUR PROMOTION NEEDS IN ONE PLACE!</h1>
                                <p>Without promotion, something terrible happens... nothing!</p>
                                <div class="home-button">
                                    <a href="#categories">Categories</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="welcome-single-slide slider-bg-three">
                <div class="container">
                    <div class="row flex-v-center">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="welcome-text text-center">
                                <h1>ALL YOUR PROMOTION NEEDS IN ONE PLACE!</h1>
                                <p>Without promotion, something terrible happens... nothing!</p>
                                <div class="home-button">
                                    <a href="#categories">Categories</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END HOME SLIDER AREA-->
    </header>
    <!--END TOP AREA-->

    <!--MAIN CATEGORIES AREA-->
    <section class="service-area-three section-padding" id="categories">
		<div class="row">
			<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
				<div class="area-title text-center wow fadeIn">
					<h2>Main Categories</h2>
					<p>We have divided our vast majority of promotions into six main groups.</p>
				</div>
			</div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
						<a href="food.php">
						<div class ="blog-image">
							<figure class="imghvr-hinge-left"><img src="<?=PROOT?>img/blog/04-fashion-upgrades-classic-coats.jpg" alt="example-image">
							<figcaption>
								<h3 align="center">FOOD</h3>
								<p align="center">“If more of us valued food and cheer and song above hoarded gold, it would be a merrier world.” 
								― J.R.R. Tolkien</p>
								<p align="center">Check out food promotions here!</p>
							</figcaption>
							</figure>
						</div>
						</a>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.3s">
						<a href="cloths.php">
						<div class ="blog-image">
							<figure class="imghvr-hinge-up"><img src="<?=PROOT?>img/blog/04-fashion-upgrades-classic-coats (1).jpg" alt="example-image">
							<figcaption>
								<h3 align="center">CLOTHS &amp; ACCESSORIES</h3>
								<p align="center">"You can have anything you want in life if you dress for it." — Edith Head.</p>
								<p align="center">Check out cloths &amp; accessories promotions here!</p>
							</figcaption>
							</figure>
						</div>
						</a>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.4s">
						<a href= "movies.php">
						<div class ="blog-image">
							<figure class="imghvr-hinge-right"><img src="<?=PROOT?>img/blog/movies.jpg" alt="example-image">
							<figcaption>
								<h3 align="center">MOVIES</h3>
								<p align="center">“It's funny how the colors of the real world only seem really real when you watch them on a screen.” 
								― anthony burgess, A Clockwork Orange.</p>
								<p align="center">Check out movies promotions here!</p>
							</figcaption>
							</figure>
						</div>
						</a>
                    </div>
                </div>
				<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.4s">
						<a href="electronic.php">
						<div class ="blog-image">
							<figure class="imghvr-hinge-left"><img src="<?=PROOT?>img/blog/perfect-selfie.jpg" alt="example-image">
							<figcaption>
								<h3 align="center">ELECTRONIC DEVICES</h3>
								<p align="center">"The new electronic independence re-creates the world in the image of a global village"- Marshall McLuhan.</p>
								<p align="center">Check out electronic devices promotions here!</p>
							</figcaption>
							</figure>
						</div>
						</a>
                    </div>
                </div>
				<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.4s">
						<a href="sports.php">
                        <div class ="blog-image">
							<figure class="imghvr-hinge-down"><img src="<?=PROOT?>img/blog/Girl_Soccer_Goalie.jpg" alt="example-image">
							<figcaption>
								<h3 align="center">SPORTS EQUIPMENTS</h3>
								<p align="center">"Champions keep playing until they get it right" - Billie Jean King</p>
								<p align="center">Check out sports equipments promotions here!</p>
							</figcaption>
							
							</figure>
						</div>
						</a>
                    </div>
                </div>
				<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.4s">
                        <div class ="blog-image">
							<figure class="imghvr-hinge-right"><img src="<?=PROOT?>img/blog/04-fashion-upgrades-classic-coat11s.jpg"="example-image">
							<figcaption>
								<h3 align="center">OTHER</h3>
								<p align="center">Check out other promotions here!</p>
							</figcaption>
							</figure>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<?php
	
		// if(isset($_SESSION['userNameCustomer'])){
			
		// 	echo('<section class="service-area-three section-padding">
        // 			<div class="container">
        //     		<div class="row">
        //         	<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
        //             <div class="area-title text-center wow fadeIn">
        //                 <h2>Subscribed Promoters</h2>
        //                 <p>List of promoters I have subscribed.</p>
        //             </div>
        //         	</div>
        //     		</div>
        //     		<div class="row">');
			
		// 	if(empty($subscribedCompanies)){
		// 		echo('<div class="single-blog wow fadeIn">
		// 		<div class="blog-details">
		// 		<div class="blog-meta"></div>
		// 		<h3>You have not subscribed any promoters</h3>
		// 		</div>
		// 		</div><br />');				
		// 	}
		// 	else{
				
		// 		$len = sizeof($subscribedCompanies);
		// 		for ($i=0; $i<$len ; $i++){
		// 			$temp = $subscribedCompanies[$i];
		// 			$tempCompanyName = $temp[1];
		// 			$tempPrUsername = $temp[0];
		// 			echo('<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
        //             	<div class="single-service-three wow fadeInUp" data-wow-delay=".2s">
        //                 <div class="service-icon-three"><i class="fa fa-building"></i></div>
        //                 <a href = "promoterTemplate.php?pr_username='.$tempPrUsername.'"><h4>'.$tempCompanyName.'</h4></a>
        //             	</div>
        //         		</div>');
		// 		}
				
		// 	}
		// 	echo('</div>
		// 		</div>
    	// 		</section>');
		// }
	
	
	?>

    <!--END MAIN CATEGORIES AREA-->
	
    <?php include "footer.php";?>
</body>
</html>
