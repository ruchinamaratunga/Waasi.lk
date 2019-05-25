<?php $this->setSiteTitle("Settings"); ?>
<?php $this->start('body'); ?>

<header class="top-area single-page" id="home">
        <div class="top-area-bg-contact-us" data-stellar-background-ratio="0.6"></div>
        <div class="header-top-area"></div>
        <div class="welcome-area">
            <div class="area-bg"></div>
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="welcome-text text-center">
                            <h2>Settings</h2>
                        </div>
                    </div>
                </div>
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
											<h3>Change the password</h3>
										
   											 <section class="about-area gray-bg section-padding">       
												<div class="container-login">
													<div class="blog-image login-box">
														<form action="<?=PROOT?>register/login" method="post">
															<div class="bg-danger"><?= $this->displayErrors ?></div>
															<input type="password" placeholder="Enter the current password" name="current_password" id="current_password" required for="current"><br>
															<input type="password" placeholder="Enter the new password" name="new_password" id="new_password" required for="new">
															<input type="password" placeholder="Re Enter the new password" name="new_check_password" id="new_check_password" required new="new-check">

															<input type="submit" value="Change the password" name="login-submit"><br>
															
														</form>
													</div>
												</div>
											</section>
										
									</div>
								</div><br />
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php $this->end(); ?>