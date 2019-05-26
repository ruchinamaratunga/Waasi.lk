<?php $this->setSiteTitle('Settings'); ?>
<?php $this->start('head') ?>
	<link rel="stylesheet" href="<?=PROOT?>css/settingsUsername.css">
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
    
<section class="service-area-three section-padding">
        <div class="container">
            <div class="row">
				
				<a href="<?=PROOT ?>settings/password" target="_blank">
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-service-three wow fadeInUp" data-wow-delay=".2s">
                        <div class="service-icon-three"><i class="fa fa-key"></i></div>
                        <h4>Change Your Password</h4>
                        <p>Click here to change your password.</p>
                    </div>
                </div>
				</a> 
				
				
<!--
				<a href="<?=PROOT ?>settings/username" target="_blank">
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-service-three wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-icon-three"><i class="fa fa-user"></i></div>
                        <h4>Change Your Username</h4>
                        <p>Click here to change your username.</p>
                    </div>
                </div>
				</a>
-->
					
				<a href="<?=PROOT ?>settings/email" target="_blank">
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-service-three wow fadeInUp" data-wow-delay="0.4s">
                        <div class="service-icon-three"><i class="fa fa-envelope"></i></div>
                        <h4>Change Your Email</h4>
                        <p>Click here to chage your email.</p>
                    </div>
                </div>
				</a>
					
				<?php if (currentUser()->user_type == 'Promoter'):?>
					
					<a href="<?=PROOT ?>settings/website" target="_blank">
					<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
						<div class="single-service-three wow fadeInUp" data-wow-delay="0.2s">
							<div class="service-icon-three"><i class="fa fa-globe"></i></div>
							<h4>Change your website</h4>
							<p>Click here to chenge your website link</p>
						</div>
					</div>
					</a>
						
					<a href="<?=PROOT ?>settings/fb" target="_blank">
					<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
						<div class="single-service-three wow fadeInUp" data-wow-delay="0.3s">
							<div class="service-icon-three"><i class="fa fa-facebook-f"></i></div>
							<h4>Change your FB link</h4>
							<p>Click here to chenge your facebook link</p>
						</div>
					</div>
					</a>
				<?php endif; ?>
				
				
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