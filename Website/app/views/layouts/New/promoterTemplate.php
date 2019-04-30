<?php

	include_once("../Model/Person.php");
	
	session_start();
	$person = new Person();
	$tempPromoter = $person->getViewPromterDetails($_GET['pr_username']);
	$viewPromo = $person->getViewPromotionByPromoter($_GET['pr_username']);
	$comments = $person->getCommentPromoter($_GET['pr_username']);
	if (isset($_SESSION['userNameCustomer'])){
		include_once("../Model/customer.php");
		$tempCustomer = new Customer($_SESSION['userName'],$_SESSION['uemail'],$_SESSION['phone']);
		$check = $tempCustomer->checkPromterIsSubscribed($_GET['pr_username']);
	}
		
?>
<!doctype html>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
	<?php
		echo ('<title>'.$tempPromoter->getPromoterName().'</title>');
	
	?>
    <title>Promoter Template</title>
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
      <?php
		
		echo('<div class="top-area-bg-promoter-template" data-stellar-background-ratio="0.6">
		   <div class = "service-image"></div>
		   <div class = "brand">
			   <h2>'.$tempPromoter-> getPromoterName().'</h2>
		   </div>
	   </div>');
		
		
	  ?>
		
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
    <section class="blog-area blog-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
					
					<?php
					//View Pending promotion 
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
									<h3>Category - '.$tempPromo->getCategory().'</h3>
									<div class="post-date"><a href="#"><i class="fa fa-calendar"></i>'.$tempPromo->getStartDate().'</a>&nbsp; &nbsp; to &nbsp; &nbsp; <a href="#"><i class="fa fa-calendar"></i>'.$tempPromo->getEndDate().'</a></div>
									<br />
									<h5>content</h5>
									<p>'.$tempPromo->getDescription().'</p>
								</div>
							</div><br />');
							}							
						}
					?>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="sidebar-area wow fadeIn">
					  <?php
						
						if (isset($_SESSION['userNameCustomer'])){
							if ($check){
								echo('<div class="single-sidebar-widget widget_categories">
								<form class="quote-form subscribe" action="../Controller/unsubscribeCompany.php?pr_username='.$_GET['pr_username'].'" method="post">
								<button type="submit" name="subscribe-submit">unSubscribe</button>	
								</form>
                   	  			</div>');
							}
							else{
								echo('<div class="single-sidebar-widget widget_categories">
								<form class="quote-form subscribe" action="../Controller/subscribeCompany.php?pr_username='.$_GET['pr_username'].'" method="post">
								<button type="submit" name="subscribe-submit">Subscribe</button>	
								</form>
                   	  			</div>');
							}
							
						}
						
					  ?>
					 <!-- <div class="single-sidebar-widget widget_categories">
							<form class="quote-form subscribe" action="../Controller/subscribeCompany.php" method='post'>
								<button type="submit" name="subscribe-submit">Subscribe</button>	
							</form>
                   	  </div>-->
                        <div class="single-sidebar-widget widget_search">
                            <h4>Search</h4>
                            <form action="#">
                                <input type="text" name="s" id="s" placeholder="Search Here...">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
						<div class="single-sidebar-widget widget_search">
							<h4>Contact us</h4>
							<?php
								
							$email = $tempPromoter->getEmail();
							$fb = $tempPromoter->getFblink();
							$phone = $tempPromoter->getPhoneNumber();
							$phoneVal = strval($phone);
							$web = $tempPromoter->getWeblink();
								if(is_null($fb)){
									if(is_null($web)){
										echo('<ul>
										<li><i class="fa fa-phone"></i> <a href="callto:'.$phone.'">&nbsp;&nbsp;'.$phoneVal.'</a></li>
										<li><i class="fa fa-envelope"></i> <a href="mailto:'.$email.'">&nbsp;'.$email.'</a></li>
										</ul>');
									}
									else{
										echo('<ul>
										<li><i class="fa fa-phone"></i> <a href="callto:'.$phone.'">&nbsp;&nbsp;'.$phoneVal.'</a></li>
										<li><i class="fa fa-envelope"></i> <a href="mailto:'.$email.'">&nbsp;'.$email.'</a></li>
										<li><i class="fa fa-globe"></i> <a href="'.$web.'">&nbsp;&nbsp;Web Link</a></li>
										</ul>');
									}
								}
								elseif(is_null($web)){
									echo('<ul>
									<li><i class="fa fa-phone"></i> <a href="callto:'.$phone.'">&nbsp;&nbsp;'.$phoneVal.'</a></li>
									<li><i class="fa fa-envelope"></i> <a href="mailto:'.$email.'">&nbsp;'.$email.'</a></li>
									<li><i class="fa fa-facebook"></i> <a href="'.$fb.'">&nbsp;&nbsp;&nbsp;Facebook Link</a></li>
									</ul>');
								}
								else{
									echo('<ul>
									<li><i class="fa fa-phone"></i> <a href="callto:'.$phone.'">&nbsp;&nbsp;'.$phoneVal.'</a></li>
									<li><i class="fa fa-envelope"></i> <a href="mailto:'.$email.'">&nbsp;'.$email.'</a></li>
									<li><i class="fa fa-facebook"></i> <a href="'.$fb.'">&nbsp;&nbsp;&nbsp;Facebook Link</a></li>
									<li><i class="fa fa-globe"></i> <a href="'.$web.'">&nbsp;&nbsp;Web Link</a></li>
									</ul>');
								}
									
								

							
							
							
							?>
							<!--<ul>
                                <li><i class="fa fa-phone"></i> <a href="callto:+8801911854378">&nbsp;&nbsp;011-299-9999</a></li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:backpiper.com@gmail.com">&nbsp;xxx.com@gmail.com</a></li>
								<li><i class="fa fa-facebook"></i> <a href="#">&nbsp;&nbsp;&nbsp;Facebook Link</a></li>
								<li><i class="fa fa-globe"></i> <a href="#">&nbsp;&nbsp;Facebook Link</a></li>
                            </ul>-->
                    	</div>
						<div class="single-sidebar-widget widget_categories">
							<h3>Star rating</h3>
							<div class="box">

							</div>
                    	</div>
						<?php
							
							if(isset($_SESSION['userNameCustomer'])){
								echo('<div class="single-sidebar-widget widget_categories">
									<h3>Give a comment</h3>
									<form class="quote-form" action="../Controller/commentPromoter.php?pr_username='.$_GET['pr_username'].'" method = "post">
									<p>
									<textarea name="comment" id="quote-message" cols="30" rows="4" placeholder="Your Comment..."></textarea>
									</p>
									<button type="submit" name="commentPromoter">Comment</button>
									</form>
                    				</div>');
							}
						
							$len = sizeof($comments);
							echo('<div class="single-sidebar-widget widget_categories">
								<h3>comments</h3>
								<ul>');
						
							if ($len>0){
								
								if ($len>5){
									for($i=0;$i<5;$i++){
										$temp = $comments[$i];
										echo('<li><h5>"'.$temp[1].'"&nbsp;-&nbsp;'.$temp[0].'</h5></li>');		
									}
								}
								else{
									for($i=0;$i<$len;$i++){
										$temp = $comments[$i];
										echo('<li><h5>"'.$temp[1].'"&nbsp;-&nbsp;'.$temp[0].'</h5></li>');					
									}
									
								}
							}
							else{
								echo('<li><a href="#">No comments just yet!</a></li>');
							}
							
							echo ('</ul>
							</div>');
							
						?>
						<!--<div class="single-sidebar-widget widget_categories">
							<h3>comments</h3>
							<form class="quote-form" action="#">
							</form>
                    	</div>-->
						
                        <div class="single-sidebar-widget widget_categories">
                            <h4>Main Categories</h4>
                            <ul>
                                <li><a href="food.php">Food</a></li>
                                <li><a href="cloths.php">Cloths and Accessories</a></li>
                                <li><a href="movies.php">Movies</a></li>
                                <li><a href="electronic.php">Electronic Devices</a></li>
                                <li><a href="sports.php">Sports Equipments</a></li>
								<li><a href="other.php">Other</a></li>
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

    <?php include "footer.php";?>

</body>

</html>
