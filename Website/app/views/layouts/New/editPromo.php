<?php

session_start();
if(!(isset($_SESSION['userNamePromoter']))){
    header("Location: ../View/404.php");
    exit();
}
if(!isset($_GET['promoID'])){
    header("Location: ../View/404.php");
    exit();
}
?>



<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>වාසි.lk</title>
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


    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>





</head>


<body style="background-color:DodgerBlue;">

<header class="top-area single-page" id="home">
    <div class="top-area-bg-addPromo" data-stellar-background-ratio="0.6"></div>
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
                        <h2>Edit Promotion</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="about-area gray-bg section-padding">

    <?php
        require_once("../Model/Promotion.php");
        $currentPromotion=Promotion::readPromotionFromDB($_GET['promoID']);
       // echo(var_dump($currentPromotion));
        echo('<div class="panel-body">
            <form  action="../Controller/editPromo_submit.php?promoID='.$_GET['promoID'].'" id="editForm" method="post" enctype="multipart/form-data" class="form-horizontal" >
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="category">Category:</label>
                    <div class="col-sm-5">
                        <select name="category" id="category">
                            <option value="food">FOOD</option>
                            <option value="cloths-accessories">CLOTHS & ACCESSORIES</option>
                            <option value="movies">MOVIES</option>
                            <option value="electronic-devices">ELECTRONIC DEVICES</option>
                            <option value="sport-equipments">SPORTS EQUIPMENTS</option>
                            <option value="other">OTHER</option>
                        </select>
<!--                        <input type="text" class="form-control" id="firstname1" name="firstname1" placeholder="First name" />-->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="title">Title:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" value="'.$currentPromotion->getTitle().'" id="title" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="description">Description:</label>
                    <div class="col-sm-5">
                        <textarea class="form-control"  id="description" name="description">'.$currentPromotion->getDescription().'</textarea>
                    </div>
                </div>





                <div class="form-group">
                    <label class="col-sm-4 control-label" for="start-time">Start Date:</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" id="start-time" value="'.$currentPromotion->getStartDate().'" name="start-time">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="end-time">End Date:</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" id="end-time" value="'.$currentPromotion->getEndDate().'" name="end-time">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="link">Link to Original Site:</label>
                    <div class="col-sm-5">
                        <input type="url" class="form-control" id="link" value="'.$currentPromotion->getLink() .'" name="link">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="location">Location:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="location" value="'.$currentPromotion->getLocation().'" name="location">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="fileToUpload">Promo Image:</label>
                    <div class="col-sm-5">
                        <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" >
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-4">
                        <button type="submit" class="btn btn-primary"  name="editPromo-submit">Edit Promo</button>
                        <button type="reset" class="btn btn-primary"  name="editPromo-submit">Reset</button>
                    </div>
                </div>
            </form>



        </div>');


    ?>



</section>



<!--		<section class="about-area gray-bg section-padding">-->
<!--		<div class="container-addPromo">-->
<!--      		<div class="form-addPromo">-->
<!---->
<!---->
<!---->
<!--			<form action="../Controller/addPromo_submit.php" id="form" method="post" enctype="multipart/form-data">-->
<!--				-->
<!--				-->
<!--				<select name="category">-->
<!--					<option value="food">FOOD</option>-->
<!--					<option value="cloths-accessories">CLOTHS & ACCESSORIES</option>-->
<!--					<option value="movies">MOVIES</option>-->
<!--					<option value="electronic-devices">ELECTRONIC DEVICES</option>-->
<!--					<option value="sport-equipments">SPORTS EQUIPMENTS</option>-->
<!--					<option value="other">OTHER</option>-->
<!--			  </select>-->
<!---->
<!--<!--                <label class="col-sm-4 control-label" for="title">Title</label>-->-->
<!---->
<!---->
<!---->
<!--				<input type="text" placeholder="Enter the Title" id="title" name="title">-->
<!--				<textarea placeholder="Enter the Description" name="description"></textarea>-->
<!--				<!--<input type="text" placeholder="Enter the Description" name="description">-->-->
<!---->
<!--                <div class='input-group date' id='datetimepicker11'>-->
<!--                    <input type='text' class="form-control" />-->
<!--                    <span class="input-group-addon">-->
<!--                    <span class="glyphicon glyphicon-calendar">-->
<!--                    </span>-->
<!--                </span>-->
<!--                </div>-->
<!---->
<!--				<input type="date" placeholder="Enter the Start Date" name="start-time">-->
<!--				<input type="date" placeholder="Enter the end date" name="end-time">-->
<!--				<input type="url" placeholder="Enter your link" name="link">-->
<!--				<input type="text" placeholder="Enter the location" name="location">-->
<!--				<input type="file" name="fileToUpload" id="fileToUpload">-->
<!--				-->
<!--				<br>-->
<!--				-->
<!--				<button type="submit" name="addPromo-submit">Add Promo</button>-->
<!--				-->
<!--			</form>-->
<!--		-->
<!--			</div>-->
<!--		</div>	-->
<!--    </section>-->



<?php include "footer.php";?>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


<script src="formValidation.js"></script>

</body>





</html>