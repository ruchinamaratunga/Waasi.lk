<?php $this->start('head'); ?>
    <link rel="stylesheet" href="<?=PROOT?>css/login.css">
<?php $this->end(); ?>
<?php $this->start('body'); ?>

    <header class="top-area single-page" id="home">
        <div class="top-area-bg-login" data-stellar-background-ratio="0.6">
            <div class="login-top"></div>
        </div>
        <div class="header-top-area"></div>
        <div class="welcome-area">
            <div class="area-bg"></div>
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="welcome-text text-center">
                            <h2>Login to enjoy!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="about-area gray-bg section-padding">       
        <div class="container-login">
			<div class="blog-image login-box">
			    <form action="<?=PROOT?>register/login" method="post">
                    <div class="bg-danger"><?= $this->displayErrors ?></div>
                    <input type="text" placeholder="Enter the user name" name = "username" id="username" required>
                    <input type="password" placeholder="Enter the password" name="password" id="password" required><br>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name ="remember me">
                        <label class="form-check-label" for="remember_me">Remember Me</label>
                    </div>
                    <input type="submit" value="Login" name="login-submit"><br>
                    <a href="#">Lost your password</a><br>
                    <a href="<?=PROOT?>register/register">Don't have an account</a>
			    </form>
			</div>
		</div>
    </section>

<?php $this->end(); ?> 