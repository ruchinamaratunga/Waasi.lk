<?php
$results = $this->searchResults;

?>

<?php $this->setSiteTitle("ADMIN"); ?>
<?php $this->start('body') ?>
<header class="top-area single-page-promoter" id="home">
       <div class="top-area-bg-promoter-template" data-stellar-background-ratio="0.6">
		   <div class = "brand admin">
			   <h2>ADMINSTRATOR</h2>
		   </div>
	   </div>
        <div class="header-top-area">
            
        </div>

    </header>
    <!--END TOP AREA-->

    <!--BLOG AREA-->
    <section class="blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">				
			        <!-- <div class="single-blog wow fadeIn">
			    		<div class="blog-details">
			    			<div class="blog-meta"></div>
			    			<h3>NO PENDING PROMOTIONS</h3>
			    		</div>
			    	</div><br/> -->

                    <div class="panel-body">
                        <div class="container" style="width:100%;">
                            <div class="row">
                                <?php if($results):?>
                                    <?php foreach($results as $result): ?>
                                        <div class="col-md-6 col-lg-6 col-sm-8 col-xs-8" style="margin-bottom:20px">
                                            <div class="single-blog wow fadeIn">
                                                <div class="blog-image">
                                                    <img src="<?=PROOT?><?=$result->image_path?>" alt="">
                                                </div>
                                                <div class="blog-details">
                                                    <div class="blog-meta"><a href="#"><i class="fa fa-ship"></i></a></div>
                                                    <h3><a href="<?=PROOT?>home/promoterpage/<?=$result->pr_username?>"><?=$result->title?></a></h3>
                                                    <div class="post-date"><a href="#"><i class="fa fa-calendar"></i><?=$result->start_date?></a></div>
                                                    <p><?=$result->description?></p> 
                                                    <a href="<?=$result->link?>" class="read-more" style="margin-left: 8px">Visit us</a>
                                                    <div class="row text-center">
                                                        <a href="<?=PROOT?>admin/accept/<?=$result->promo_id?>" class="read-more" >ACCEPT</a>
                                                        <a href="<?=PROOT?>admin/reject/<?=$result->promo_id?>" class="read-more" >REJECT</a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                <?php else: ?>
                                    <div class="nopromo">
                                        <div class="single-blog wow fadeIn">
											<div class="blog-details">
												<div class="blog-meta"></div>
												<h3>NO PROMOTIONS</h3>
											</div>
										</div>
                                        <!-- <div class="text-center">No Promotions</div> -->
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

			    		<!-- <div class="single-blog wow fadeIn">
			    			<div class="blog-image">
			    				<img src="" alt="">
			    			</div>
			    			<div class="blog-details">
			    				<div class="blog-meta"></div>
			    				<h3>Promoter Username</h3>
			    				<h4>Category</h4>
			    				<div class="post-date"><a href="#"><i class="fa fa-calendar"></i></a>&nbsp; &nbsp; to &nbsp; &nbsp; <a href="#"><i class="fa fa-calendar"></i></a></div>
			    				<br/>
			    				<h5>content</h5>
			    				<p></p>
			    				<a href="../Controller/acceptRejectPromotion.php?acceptedPromoID=" class="read-more">ACCEPT</a>
			    				&nbsp; &nbsp; &nbsp;
			    				<a href="../Controller/acceptRejectPromotion.php?rejectedPromoID=" class="read-more">REJECT</a>
			    			</div>
			    		</div><br/> -->

                </div>
<!--
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
-->
            </div>    
        </div>
    </section>
    <!--BLOG AREA END-->

  
<?php $this->end() ?>