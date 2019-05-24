<?php
	$subscribes = false;
	if(currentUser()){
		$subscribes = $this->customer->subscribePromoters();
	}
	
	// dnd($subscribes);
?>


<!-- Here $this means View class -->
<?php $this->setSiteTitle('වාසි.lk'); ?>

<?php $this->start('body'); ?>
<!-- <h1 class="text-center red">Welcom to the website</h1> -->
<header class="top-area" id="home">
 
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
						<a href="catagory/food">
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
						<a href="catagory/cloths">
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
						<a href= "catagory/movies">
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
						<a href="catagory/electronics">
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
						<a href="catagory/sports">
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
					<a href="catagory/others">
                        <div class ="blog-image">
							<figure class="imghvr-hinge-right"><img src="<?=PROOT?>img/blog/04-fashion-upgrades-classic-coat11s.jpg"="example-image">
							<figcaption>
								<h3 align="center">OTHER</h3>
								<p align="center">Check out other promotions here!</p>
							</figcaption>
							</figure>
						</div>
					</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	
	<section class="service-area-three section-padding">
    	<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
					<div class="area-title text-center wow fadeIn">
						<h2>Subscribed Promoters</h2>
						<p>List of promoters I have subscribed.</p>
					</div>
				</div>
			</div>

			<div class="row">
				<?php if(currentUser()): ?>
					<?php if($subscribes):?>
						<?php foreach($subscribes as $subscribe):?>
							<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
								<div class="single-service-three wow fadeInUp" data-wow-delay=".2s">
									<div class="service-icon-three"><i class="fa fa-building"></i></div>
									<a href = "<?=PROOT?>home/promoterpage/<?=$subscribe->promoter?>"><h4>'.<?=$subscribe->promoter?>.'</h4></a>
								</div>
							</div>
						<?php endforeach;?>
					<?php else: ?>
						<div class="single-blog wow fadeIn">
							<div class="blog-details">
								<div class="blog-meta"></div>
								<h3>You have not subscribed any promoters</h3>
							</div>
						</div><br/>
					<?php endif;?>
				<?php else: ?>
				<div class="single-blog wow fadeIn">
					<div class="blog-details">
						<div class="blog-meta"></div>
						<h3>LoggIn to subscribe</h3>
					</div>
				</div>
				<?php endif;?>
			</div>
		</div>
    </section>
	
<?php $this->end(); ?>





