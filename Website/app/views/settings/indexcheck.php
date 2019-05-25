<?php $this->setSiteTitle('Settings'); ?>
<?php $this->start('head') ?>
    <script>
    
    </script>
<?php $this->end() ?>

<?php $this->start('body') ?>
    <header class="top-area single-page-promoter" id="home">
       <div class="top-area-bg-promoter-template" data-stellar-background-ratio="0.6">
		   <div class = "brand admin">
			   <h2>SETTINGS PAGE</h2>
		   </div>
	   </div>
    </header>
    
<section class="about-details-area section-padding wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="tab-content about-details-content">
                        <div id="team" class="team-list tab-pane fade in active">
                            <div class="row">
								
								<div class="single-blog wow fadeIn">
									<div class="blog-details">
										<div class="blog-meta"></div>
										
   											 <section class="about-area gray-bg">       
												<div class="container-login">
													<div class="blog-image login-box">
														<form action="<?=PROOT?>settings/indexcheck" method="post">
															<br><br><br>
															<div class="bg-danger"><?= $this->displayErrors ?></div>
															<input type="password" placeholder="Enter the current password" name="current_password" id="current_password" required for="current"><br>

															<input type="submit" value="CHECK" name="login-submit"><br>
															
														</form>
													</div>
												</div>
											</section>
										
									</div>
								</div>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!--
    <div class="container">
        <div class="single-blog wow fadeIn" style="margin: 50px;">
			
			<div class="blog-details " >
				<div class="blog-meta"></div>
                <h4>Change your First name</h4>
                <div class="form-group" style="padding: 20px;">  Date input 
                    <label class="col-sm-4 control-label" for="fname">First Name:</label>
                    <div class="col-sm-5">
                    <input class="form-control" id="fname" name="fname" placeholder="first name" type="text"/>
                    </div>
                </div>
                <button class="btn btn-default pull-right" style="margin : 20px;">Save</button>
    
			</div>
		</div>
    </div>
-->

<?php $this->end() ?>