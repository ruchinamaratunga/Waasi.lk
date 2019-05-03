<?php $this->setSiteTitle("වාසි.lk"); ?>
<?php $this->start('head'); ?>

    <style>

        .card{
            background-color : #f39c12;
            border: 1px solid black;
            border-radius : 6px;
            padding: 10px;
            width: 30rem;
            margin-bottom : 30px;
        }

    </style>

<?php $this->end();?>
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
                            <h2>Promotions</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="about-area gray-bg section-padding">
        <div class="panel-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="card">
                            <img src="<?=PROOT?>img/blog/04-fashion-upgrades-classic-coats.jpg" class="img-rounded card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="card">
                            <img src="<?=PROOT?>img/blog/04-fashion-upgrades-classic-coats (1).jpg" class="img-rounded card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <img src="<?=PROOT?>img/blog/movies.jpg" class="img-rounded card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <img src="<?=PROOT?>img/blog/perfect-selfie.jpg" class="img-rounded card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <img src="<?=PROOT?>img/blog/Girl_Soccer_Goalie.jpg" class="img-rounded card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
<?php $this->end() ?>