

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
										<li><a href="promoterSignup.php">Register as a Promoter</a></li>
										
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
            </div>
            <!--END MAINMENU AREA END-->
        </div>
        <!--HOME SLIDER AREA-->
        

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


</header> 
