<?php

include_once("../Model/Person.php");

session_start();
$person = new Person();
$tempPromoter = $person->getViewPromterDetails($_SESSION["userNamePromoter"]);
$viewPromo = $person->getViewAllPromotionByPromoter($_SESSION["userNamePromoter"]);
//$comments = $person->getCommentPromoter($_GET['pr_username']);
//if (isset($_SESSION['userNameCustomer'])){
//    include_once("../Model/customer.php");
//    $tempCustomer = new Customer($_SESSION['userName'],$_SESSION['uemail'],$_SESSION['phone']);
//    $check = $tempCustomer->checkPromterIsSubscribed($_GET['pr_username']);
//}

if(!isset($_SESSION["userNamePromoter"])){
    header("Location: ../View/index.php");
    exit();
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
            <h1>Your Promotions</h1>
            <br>
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
                        $editurl='editPromo.php?promoID='.$tempPromo->getPromoID();
                        $deleteurl='../Controller/deletePromo.php?promoID='.$tempPromo->getPromoID();
                        echo('<div class="single-blog wow fadeIn">
								<div class="blog-image">
									<img src="'.$tempPromo->getImage().'" alt="">
								</div>
								<div class="blog-details">
									<div class="blog-meta"></div>
									    <label for="pcategory">Category:</label>
									<p id="pcategory">'.$tempPromo->getCategory().'</p>
									<label for="ptitle">Title:</label>
									<p id="ptitle">'.$tempPromo->getTitle().'</p>
									<label for="pdescription">Description:</label>
									<p id=""pdescription>'.$tempPromo->getDescription().'</p>
									<label for="validtime">Valied Time Period:</label>
									<p id="validtime"><div  class="post-date"><a href="#"><i class="fa fa-calendar"></i>'.$tempPromo->getStartDate().'</a>&nbsp; &nbsp; to &nbsp; &nbsp; <a href="#"><i class="fa fa-calendar"></i>'.$tempPromo->getEndDate().'</a></div>
									</p>
									<label for="pstate">State:</label>
									<p id="pstate">'.$tempPromo->getState().'</p>
								</div>
								
								<div class="blog-details">
								     <a href='.$editurl.'  class="btn btn-primary">Edit</a>
								     <a href='.$deleteurl.'  class="btn btn-primary">Delete</a>
                                </div>
							</div><br />');
                    }
                }
                ?>
            </div>
<!--
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
