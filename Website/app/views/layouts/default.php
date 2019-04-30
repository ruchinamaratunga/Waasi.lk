<!doctype html>
<html lang="en">
  <head>
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $this->siteTitle(); ?></title> -->
    <!-- <link rel="stylesheet" href="<?=PROOT?>css/bootstrap.min.css" media="screen" title = "no title" charset = "utf-8">
    <link rel="stylesheet" href="<?=PROOT?>css/custom.css" media="screen" title = "no title" charset = "utf-8">
    <script src = "<?=PROOT?>js/jQuery-2.2.4.min.js"></script>
    <script src = "<?=PROOT?>js/bootstrap.min.js"></script> -->
    <meta charset="UTF-8">
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

  <script src="<?=PROOT?>js/vendor/jquery-1.12.4.min.js"></script>
  <script src="<?=PROOT?>js/vendor/bootstrap.min.js"></script>  
    
    <!--====== MAIN STYLESHEETS ======-->
	<link rel="stylesheet" href="<?=PROOT?>css/style2.css">
    <link href="<?=PROOT?>/css/style/style.css" rel="stylesheet">
    <link href="<?=PROOT?>css/responsive.css" rel="stylesheet">
	<link href="<?=PROOT?>css/ihover.css" rel="stylesheet">

    <script src="<?=PROOT?>js/vendor/modernizr-2.8.3.min.js"></script>
    <?= $this->content('head'); ?>

  </head>
  <body>
  <div class="top-area-bg" data-stellar-background-ratio="0.6"></div>
        <div class="header-top-area">
            <!--MAINMENU AREA-->
            <?php include 'main_menu.php' ?>
            <!--END MAINMENU AREA END-->
        </div>
    
    <?php include 'body.php' ?>
    <div class="container-fluid" style="min-height:cal(100% - 125px);">
      <?= $this->content('body'); ?>
    </div>

    
  </body>
</html>