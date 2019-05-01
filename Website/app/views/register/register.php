<?php $this->start('head'); ?>
<?php $this->end(); ?>
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
                            <h2>Register to experience more!</h2>
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
      		<!-- <div class="form"> -->
                <form class="form" method="post">
                    <div class="bg-danger"><?= $this->displayErrors ?></div>
                    <div class = "form-group">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name ="fname" class="form-control" value="<?=$this->post['fname']?>">
                    </div>
                    <div class = "form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name ="lname" class="form-control" value="<?=$this->post['lname']?>">
                    </div>
                    <div class = "form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name ="email" class="form-control" value="<?=$this->post['email']?>">
                    </div>
                    <div class = "form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name ="username" class="form-control" value="<?=$this->post['username']?>">
                    </div>
                    <div class = "form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name ="password" class="form-control" value="<?=$this->post['password']?>">
                    </div>
                    <div class = "form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" id="confirm" name ="confirm" class="form-control" value="<?=$this->post['confirm']?>">
                    </div>
                    <div class="pull-right">
                        <input type="submit" class="btn btn-primary btn-large" value="Register">
                    </div>
                    <!-- <input type="text" placeholder="Enter the User name" name="uid">
                    <input type="password" placeholder="Enter the password" name="password">
                    <input type="password" placeholder="Re enter the password" name="re-password">
                    <input type="email" placeholder="Enter your email" name="email">
                    <input type="number" placeholder="Enter your phone number" name="phone">
                    <button type="submit" name="signup-submit">Sign Up</button> --> 
                </form>
			<!-- </div> -->
		</div>	
    </section>

    <!-- <div class="col-md-6 col-md-offset-3 well">
        <h3 class="text-center">Register Here</h3><hr>
        <form class="form" action="" method = "post">
            <div class="bg-danger"><?= $this->displayErrors ?></div>
            <div class = "form-group">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name ="fname" class="form-control" value="<?=$this->post['fname']?>">
            </div>
            <div class = "form-group">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name ="lname" class="form-control" value="<?=$this->post['lname']?>">
            </div>
            <div class = "form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name ="email" class="form-control" value="<?=$this->post['email']?>">
            </div>
            <div class = "form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name ="username" class="form-control" value="<?=$this->post['username']?>">
            </div>
            <div class = "form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name ="password" class="form-control" value="<?=$this->post['password']?>">
            </div>
            <div class = "form-group">
                <label for="password">Confirm Password</label>
                <input type="password" id="confirm" name ="confirm" class="form-control" value="<?=$this->post['confirm']?>">
            </div>
            <div class="pull-right">
                <input type="submit" class="btn btn-primary btn-large" value="Register">
            </div>
        </form>
    </div> -->
<?php $this->end(); ?>


