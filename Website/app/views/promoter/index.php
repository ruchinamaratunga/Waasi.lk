<?php
//    $subscribes = $this->promoter->getSubscribers(); 
?>


		  
<?php $this->start('body'); ?>

<header class="top-area" id="home">
    <div class="top-area-bg-promoter-index" data-stellar-background-ratio="0.6"></div>
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

    <!--BLOG AREA-->
    <section class="blog-area gray-bg" style ="padding-bottom: 25px;">
        <div class="container">
            <div class="row">
				<br />
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
                        <!--<div class="blog-image">
                            <img src="img/blog/blog_1.jpg" alt="">
                        </div>-->
                        <div class="blog-details text-center">
                            <div class="blog-meta"><a href="#"><!--<i class="fa fa-ship"></i>--></a></div>
                            <h3><a href="addpromo" target = "new">ADD PROMOTIONS</a></h3>
                            <p>Click below to add a new promotion!</p>
                            <a href="addpromo" class="read-more" target = "_blank">ADD</a>
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
                            <h3><a href="<?=PROOT?>settings/index" target = "_blank">UPDATE DETAILS</a></h3>
                            <p>Click below to upadte your business details!</p>
                            <a href="<?=PROOT?>settings/index" class="read-more" target = "_blank">UPDATE</a>
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
							//echo('<h3><a href="promoterTemplate.php?pr_username='.$_SESSION['userName'].'">VIEW PROMOTIONS</a></h3>');
                                echo('<h3><a href="mypromo" target = "_blank">VIEW PROMOTIONS</a></h3>');

                            ?>
                            
                            <p>Click below to view promotions of your business.</p>
							<?php
							//echo('<a href="promoterTemplate.php?pr_username='.$_SESSION['userName'].'" class="read-more">VIEW</a>');
                                echo('<a href="mypromo" class="read-more" target = "_blank">VIEW</a>');

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
    <!-- <section class="service-area-three section-padding">
        <div class="container">
            <div class="row">
            	<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>What does customers says..</h2>
                        <p>Customer comments.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-service-three wow fadeInUp" data-wow-delay=".2s">
                        <div class="service-icon-three"><i class="fa fa-comment"></i></div>
                        <h4>No comments just yet..</h4>
                    </div>
                </div>
			    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                	<div class="single-service-three wow fadeInUp" data-wow-delay=".2s">
                        <div class="service-icon-three"><i class="fa fa-comment"></i></div>
                        <h4>'.$temp[1].'</h4>
						<h5>'.$temp[0].'</h5>
                	</div>
            	</div>
			</div>
		</div>
    </section> -->

	
	<!--SUBSCRIBERS SECTION-->
    <section class="service-area-three section-padding">
        <div class="container">
        	<div class="row">
            	<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>Subscribers</h2>
                        <p>People who have subscribed you!</p>
                    </div>
            	</div>
        	</div>
            <div class="row">
                <?php if($subscribes):?>
		            <?php foreach($subscribes as $subscribe):?>
                        <?php subscribersBlock($subscribes) ?>
		            <?php endforeach;?>
		        <?php else: ?>
		            <div class="single-blog wow fadeIn">
			            <div class="blog-details">
				            <div class="blog-meta"></div>
				            <h3>You have not subscribed any promoters</h3>
			            </div>
		            </div><br/>
		        <?php endif;?>
	        </div>
        </div>
    </section>


	


<?php $this->end();?>