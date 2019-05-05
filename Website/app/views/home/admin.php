
<?php $this->setSiteTitle("ADMIN"); ?>
<?php $this->start('body') ?>
<header class="top-area single-page-promoter" id="home">
       <div class="top-area-bg-promoter-template" data-stellar-background-ratio="0.6">
		   <div class = "brand admin">
			   <h2>ADMINSTRATOR</h2>
		   </div>
	   </div>
        <div class="header-top-area">
            <!--MAINMENU AREA-->
            <!-- <div class="mainmenu-area" id="mainmenu-area">
                <div class="mainmenu-area-bg"></div>
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="#home" class="navbar-brand"><img src="../Extra/img/logo.png" alt="logo"></a>
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
									
									// if (isset($_SESSION["userName"])){
										
									// 	$username = $_SESSION["userName"];
									// 	echo '<a href="#" class="logged-user" background-colour="lightsalmon">
									// '.$username.'
									// </a>
                                    // <ul>
                                    //     <li class="logout-submit"><a href="../Controller/logout.php">Logout</a></li>
                                        
                                    // </ul>';
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
            </div> -->
            <!--END MAINMENU AREA END-->
        </div>

    </header>
    <!--END TOP AREA-->

    <!--BLOG AREA-->
    <section class="blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
					<?php
					// View Pending promotion to admin to accept or reject
						// if(empty($viewPromo)){
						// 	echo('<div class="single-blog wow fadeIn">
						// 		<div class="blog-details">
						// 			<div class="blog-meta"></div>
						// 			<h3>NO PENDING PROMOTIONS</h3>
						// 		</div>
						// 	</div><br />');
						// }
					
						// else{
							
						// 	$len = count($viewPromo);
						// 	for ($i=0; $i<$len; $i++){
						// 		$tempPromo = $viewPromo[$i];
						// 		echo('<div class="single-blog wow fadeIn">
						// 		<div class="blog-image">
						// 			<img src="'.$tempPromo->getImage().'" alt="">
						// 		</div>
						// 		<div class="blog-details">
						// 			<div class="blog-meta"></div>
						// 			<h3>Promoter Username- '.$tempPromo->getPr_username().'</h3>
						// 			<h4>Category - '.$tempPromo->getCategory().'</h4>
						// 			<div class="post-date"><a href="#"><i class="fa fa-calendar"></i>'.$tempPromo->getStartDate().'</a>&nbsp; &nbsp; to &nbsp; &nbsp; <a href="#"><i class="fa fa-calendar"></i>'.$tempPromo->getEndDate().'</a></div>
						// 			<br />
						// 			<h5>content</h5>
						// 			<p>'.$tempPromo->getDescription().'</p>
						// 			<a href="../Controller/acceptRejectPromotion.php?acceptedPromoID='.$tempPromo->getPromoID().'" class="read-more">ACCEPT</a>
						// 			&nbsp; &nbsp; &nbsp;
						// 			<a href="../Controller/acceptRejectPromotion.php?rejectedPromoID='.$tempPromo->getPromoID().'" class="read-more">REJECT</a>
						// 		</div>
						// 	</div><br />');
						// 	}							
						// }
					?>
                   
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
                       
                    </div>
                </div> 
            </div>
            
        </div>
    </section>
    <!--BLOG AREA END-->

  
<?php $this->end() ?>