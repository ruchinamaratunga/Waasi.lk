<?php 
	$comments = $this->promoter->showComments();
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
                        <h1>COMMENTS GIVEN FOR YOU</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
	
	<!--COMMETNS SECTION-->
    <section class="service-area-three section-padding">
        <div class="container">
        	<div class="row">
            	<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>Comments</h2>
                        <p>See what people told about you</p>
                    </div>
            	</div>
        	</div>
            <div class="row">
                <?php if($comments):?>
                    <?php //subscribersBlock($subscribes)?>
					<?php foreach($comments as $comment):?>
							<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
								<div class="single-service-three wow fadeInUp" data-wow-delay=".2s">
									<div class="service-icon-three"><i class="fa fa-comment"></i></div>
									<a href = "#"><h4><?=$comment->comment?></h4></a>
									<a href = "#"><h6><?=$comment->customer?></h6></a>
								</div>
							</div>
							
					<?php endforeach;?>
		        <?php else: ?>
                
		            <div class="single-blog wow fadeIn">
			            <div class="blog-details">
				            <div class="blog-meta"></div>
				            <h3>You have not been commented by any customers please add promotions to increase the number of good comments.</h3>
			            </div>
		            </div><br/>
		        <?php endif;?>
	        </div>
        </div>
    </section>
	
	


	


<?php $this->end();?>