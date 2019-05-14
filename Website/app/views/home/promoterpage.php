<?php
    $promoter = new Promoter($_GET['promoter']);
    // dnd($promoter->promoter_name);
?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>

<header class="top-area single-page-promoter" id="home">

		
    <div class="top-area-bg-promoter-template" data-stellar-background-ratio="0.6">
	   <div class = "service-image"></div>
	   <div class = "brand">
		   <h2><?= $promoter->promoter_name ?></h2>
	   </div>
   </div>
		

    </header>


<section class="blog-area blog-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                    <div class="single-blog wow fadeIn">
                        <div class="blog-image">
                            <img src="<?=PROOT?>/img/blog/blog_7.jpg" alt="">
                        </div>
                        <div class="blog-details">
                            <div class="blog-meta"><a href="#"><i class="fa fa-ship"></i></a></div>
                            <h3><a href="single-blog.html">Quick Transportation Service in the world</a></h3>
                            <div class="post-date"><a href="#"><i class="fa fa-calendar"></i>20 January, 2015</a></div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                            <a href="single-blog.html" class="read-more">Read More</a>
                        </div>
                    </div>
                    <div class="single-blog wow fadeIn">
                        <div class="blog-image">
                            <img src="<?=PROOT?>/img/blog/blog_8.jpg" alt="">
                        </div>
                        <div class="blog-details">
                            <div class="blog-meta"><a href="#"><i class="fa fa-ship"></i></a></div>
                            <h3><a href="single-blog.html">Quick Transportation Service in the world</a></h3>
                            <div class="post-date"><a href="#"><i class="fa fa-calendar"></i>20 January, 2015</a></div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                            <a href="single-blog.html" class="read-more">Read More</a>
                        </div>
                    </div>
                    <div class="single-blog wow fadeIn">
                        <div class="blog-image">
                            <img src="<?=PROOT?>/img/blog/blog_9.jpg" alt="">
                        </div>
                        <div class="blog-details">
                            <div class="blog-meta"><a href="#"><i class="fa fa-ship"></i></a></div>
                            <h3><a href="single-blog.html">Quick Transportation Service in the world</a></h3>
                            <div class="post-date"><a href="#"><i class="fa fa-calendar"></i>20 January, 2015</a></div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                            <a href="single-blog.html" class="read-more">Read More</a>
                        </div>
                    </div>
                    <div class="single-blog wow fadeIn">
                        <div class="blog-image">
                            <img src="<?=PROOT?>/img/blog/blog_10.jpg" alt="">
                        </div>
                        <div class="blog-details">
                            <div class="blog-meta"><a href="#"><i class="fa fa-ship"></i></a></div>
                            <h3><a href="single-blog.html">Quick Transportation Service in the world</a></h3>
                            <div class="post-date"><a href="#"><i class="fa fa-calendar"></i>20 January, 2015</a></div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                            <a href="single-blog.html" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="sidebar-area wow fadeIn">
					  <div class="single-sidebar-widget widget_categories">
							<form class="quote-form subscribe" action="#">
								<button type="submit">Subscribe</button>	
							</form>
                   	  </div>
                        <div class="single-sidebar-widget widget_search">
                            <h4>Search</h4>
                            <form action="#">
                                <input type="text" name="s" id="s" placeholder="Search Here...">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
						<div class="single-sidebar-widget widget_search">
							<h4>Contact us</h4>
							<ul>
                                <li><i class="fa fa-phone"></i> <a href="callto:+8801911854378">&nbsp;&nbsp;011-299-9999</a></li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:backpiper.com@gmail.com">&nbsp;xxx.com@gmail.com</a></li>
								<li><i class="fa fa-facebook"></i> <a href="#">&nbsp;&nbsp;&nbsp;Facebook Link</a></li>
                            </ul>
                    	</div>
						<div class="single-sidebar-widget widget_categories">
							<h3>Star rating</h3>
							<div class="box">

							</div>
                    	</div>

						<div class="single-sidebar-widget widget_categories">
							<h3>Give a comment</h3>
							<form class="quote-form" action="#">
								<p>
									<textarea name="quote-message" id="quote-message" cols="30" rows="4" placeholder="Your Comment..."></textarea>
								</p>
								<button type="submit">Comment</button>
							</form>
                    	</div>
						<div class="single-sidebar-widget widget_categories">
							<h3>Give a comment</h3>
							<form class="quote-form" action="#">
							</form>
                    	</div>
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
            <div class="row">
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
            </div>
        </div>
    </section>
<?php $this->end(); ?>