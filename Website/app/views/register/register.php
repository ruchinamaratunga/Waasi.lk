<?php $this->start('head'); ?>
    <link rel="stylesheet" href="<?=PROOT?>css/style/registerform.css">
    <script type="text/javascript" src="<?=PROOT?>js/formValidation.js"></script>
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
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
        <div class="container">
            <div class="single-blog wow fadeIn" style="margin: 50px;">

                <div class="blog-details " >
                    <div class="blog-meta"></div>
                    <h4>Enter Customer Details...</h4>
                    <div class="form-group" style="padding: 20px;">
                        <form  action="<?=PROOT?>register/register" id="form-register-customer" method="post" enctype="multipart/form-data" class="form-horizontal" >
                            <div class="bg-danger text-center"><?= $this->displayErrors ?></div>



                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="fname">First Name:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="Enter the First Name" id="fname" name="fname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="lname">Last Name:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="Enter the Last Name" id="lname" name="lname">
                                </div>
                            </div>





                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="email">Email:</label>
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="username">Username:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="username" placeholder="Enter an Username" name="username">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="password">Password:</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" id="password" placeholder="Enter a Password" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="confirm">Confirm Password:</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" id="confirm" placeholder="Re-enter the Password" name="confirm">
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-4">
                                    <button type="submit" class="btn btn-warning"  name="register-customer-submit">Sign Up</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>

    </section>

<?php $this->end(); ?>


