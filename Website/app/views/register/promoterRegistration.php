<?php $this->start('body'); ?>

<!--START TOP AREA-->
    <header class="top-area single-page" id="home">
	    <div class="top-area-bg-signup-promoter" data-stellar-background-ratio="0.6"></div>
        <div class="header-top-area"></div>
        <div class="welcome-area">
            <div class="area-bg"></div>
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="welcome-text text-center">
                            <h2>Signup to experience more!</h2>
                            <p>Join your Business with us...</P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--END TOP AREA-->

    <!--ABOUT AREA-->
	<section class="about-area gray-bg" style = "padding-bottom: 300px;">
		<div class="container-signup">	
            <div class="form-promter" style = "height : 125px;">
                <form class="form" method="post">
                    <input type="text" placeholder="Enter the User name" name="username" id="username" value="<?=$this->post['username']?>">
                    <input type="text" placeholder="Enter the Promoter name" name="promoter_name" id="promoter_name" value="<?=$this->post['promoter_name']?>">
                    <input type="email" placeholder="Enter your email" name="email" id="email" style = "margin-top:0px; margin-bottom:5px;" value="<?=$this->post['email']?>">
                    <input type="password" placeholder="Enter the password" name="password" id="password"style = "height: 30px; margin-bottom:5px;" value="<?=$this->post['password']?>">
                    <input type="password" placeholder="Re enter the password" name="confirm" id="confirm" style = "height: 30px; margin-bottom:5px;" value="<?=$this->post['confirm']?>">
                    <input type="tel" placeholder="Enter your Contact number" name="phone_number" id="phone_number" value="<?=$this->post['phone_number']?>">
                    <input type="text" placeholder="Enter the promoter web site*" name="website" id="website"  value="<?=$this->post['website']?>">
                    <input type="text" placeholder="Enter the promoter facebook link*" name="fb_link" id="fb_link"  value="<?=$this->post['fb_link']?>">
                    <br />
                    <p >* Enter if any, else left blank.</p>
                    <button type="submit" name="signup-submit">Sign Up</button>
                </form>
			</div>
		</div>	
    </section>

<?php $this->end(); ?>