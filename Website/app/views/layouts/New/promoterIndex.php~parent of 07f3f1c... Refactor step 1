<?php
	include_once("../Model/promoter.php");
	session_start();
	if(!(isset($_SESSION['userNamePromoter']))){
		header("Location: ../View/404.php");
		exit();
	}
	$tempPerson = new Promoter($_SESSION['userName'],$_SESSION['promoterName'],$_SESSION['uemail'],null,$_SESSION['mapLocation'],$_SESSION['phone'],$_SESSION['webLink'],$_SESSION['fbLink'],$_SESSION['rating']);
	$username = $_SESSION['userNamePromoter'];
	//$comments = $tempPerson->getCommentPromoter($_SESSION['userName']);
	$comments = $tempPerson->getCommentPromoter($username);
	$subCount = $tempPerson->subscribedCustomerCount();
		
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>වාසි.lk</title>
    <link rel="shortcut icon" type="image/ico" href="../Extra/img/favicon.png" />
	
    <!--====== STYLESHEETS ======-->
	<link rel="stylesheet" href="../Extra/css/normalize.css">
    <link rel="stylesheet" href="Extra/css/normalize.css">
    <link rel="stylesheet" href="../Extra/css/animate.css">
    <link rel="stylesheet" href="../Extra/css/stellarnav.min.css">
    <link rel="stylesheet" href="../Extra/css/owl.carousel.css">
    <link href="../Extra/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Extra/css/font-awesome.min.css" rel="stylesheet">
	<link href="../Extra/css/imagehover.min.css" rel="stylesheet">

    <!--====== MAIN STYLESHEETS ======-->
	<link rel="stylesheet" href="../Extra/css/style2.css">
    <link href="style.css" rel="stylesheet">
    <link href="../Extra/css/responsive.css" rel="stylesheet">
	<link href="../Extra/css/ihover.css" rel="stylesheet">

    <script src="../Extra/js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="home-two">

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
    
    <header class="top-area" id="home">
        <div class="top-area-bg-promoter-index" data-stellar-background-ratio="0.6"></div>
        <div class="header-top-area">
            <!--MAINMENU AREA-->
            <div class="mainmenu-area" id="mainmenu-area">
                <div class="mainmenu-area-bg"></div>
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="#home" class="navbar-brand"><img src="../Extra/img/logo.png" alt="logo"></a>
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
                                <!--<li><a href="#">Service</a>
                                    <ul>
										<li><a href="promoterLogin.php">Login as a promoter</a></li>
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
          <div class="welcome-area-bg"></div>
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="welcome-text text-center">
                            <h1>PROMOTE YOUR BUSINESS ALL AROUND SRI LANKA AND BEYOND</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--END TOP AREA-->

    <!--BLOG AREA-->
    <section class="blog-area gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
                        <!--<div class="blog-image">
                            <img src="img/blog/blog_1.jpg" alt="">
                        </div>-->
                        <div class="blog-details text-center">
                            <div class="blog-meta"><a href="#"><!--<i class="fa fa-ship"></i>--></a></div>
                            <h3><a href="addPromo.php">ADD PROMOTIONS</a></h3>
                            <p>Click below to add a new promotion!</p>
                            <a href="addPromo.php" class="read-more">ADD</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
                        <!--<div class="blog-image">
                            <img src="img/blog/blog_1.jpg" alt="">
                        </div>-->
                        <div class="blog-details text-center">
                            <div class="blog-meta"><a href="#"><!--<i class="fa fa-ship"></i>--></a></div>
                            <h3><a href="single-blog.html">UPDATE DETAILS</a></h3>
                            <p>Click below to upadte your business details!</p>
                            <a href="#" class="read-more">UPDATE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
                        <!--<div class="blog-image">
                            <img src="img/blog/blog_1.jpg" alt="">
                        </div>-->
                        <div class="blog-details text-center">
                            <div class="blog-meta"><a href="#"><!--<i class="fa fa-ship"></i>--></a></div>
							<?php
							echo('<h3><a href="promoterTemplate.php?pr_username='.$_SESSION['userName'].'">VIEW PROMOTIONS</a></h3>');
							?>
                            
                            <p>Click below to view promotions of your business.</p>
							<?php
							echo('<a href="promoterTemplate.php?pr_username='.$_SESSION['userName'].'" class="read-more">VIEW</a>');
							?>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--BLOG AREA END-->

    <!--TESTMONIAL AREA -->
	
	<!-- COMMENT SECTION -->
	<?php			
			echo('<section class="service-area-three section-padding">
        			<div class="container">
            		<div class="row">
                	<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>What does customers says..</h2>
                        <p>Customer comments.</p>
                    </div>
                	</div>
            		</div>
            		<div class="row">');
			
			if(empty($comments)){
				echo('<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    	<div class="single-service-three wow fadeInUp" data-wow-delay=".2s">
                        <div class="service-icon-three"><i class="fa fa-comment"></i></div>
                        <h4>No comments just yet..</h4>
                    	</div>
                		</div>');
			}
			else{
				
				$len = sizeof($comments);
				for ($i=0; $i<$len ; $i++){
					$temp = $comments[$i];
					echo('<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    	<div class="single-service-three wow fadeInUp" data-wow-delay=".2s">
                        <div class="service-icon-three"><i class="fa fa-comment"></i></div>
                        <h4>'.$temp[1].'</h4>
						<h5>'.$temp[0].'</h5>
                    	</div>
                		</div>');
				}
				
			}
			echo('</div>
				</div>
    			</section>');
	
	
	?>
	
	<!--SUBSCRIBERS SECTION-->
	<?php
	
		echo('<section class="service-area-three section-padding">
        			<div class="container">
            		<div class="row">
                	<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>Subscribers count</h2>
                        <p>People who have subscribed you!</p>
                    </div>
                	</div>
            		</div>
            		<div class="row">');
	
	
		echo('<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
             <div class="single-service-three wow fadeInUp" data-wow-delay=".2s">
             <div class="service-icon-three"><i class="fa fa-users"></i></div>
             <h4>'.$subCount.'</h4>
             </div>
               </div>');
	
		echo('</div>
			</div>
    		</section>');
	
	?>


   <?php include "footer.php";?>
</body>

</html>
