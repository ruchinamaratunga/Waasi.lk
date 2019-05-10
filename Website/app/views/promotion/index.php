<?php 
    $results = $this->searchResults ;
?>

<?php $this->setSiteTitle("වාසි.lk"); ?>

<?php $this->start('head'); ?>
    <link rel="stylesheet" href="<?=PROOT?>css/promotion_card.css">
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
        <div class="container search">
            <!-- <div class="single-sidebar-widget widget_search">
                <form action="#">
                    <input type="text" name="search" id="search" placeholder="Search Here...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div> -->
            <div class="single-sidebar-widget widget_search">
                <form method= "post" style="border : none;">
                    <div class="dropdown pull-right">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" method="post">
                            <div class="input-group">
                                <input name = "promoter" id="promoter" type="checkbox" aria-label="...">
                                <label for="promoter">Promoter</label>
                            </div>
                            <li role="separator" class="divider"></li>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input name = "catagory" id="catagory" type="checkbox" aria-label="...">
                                </span><label for="catagory">Catagory</label>
                            </div>
                        </ul>
                    </div>
                
                    <div class="input-group pull-right">
                        <input type="text" class="form-control" id="search" name="search"  placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </form>
            </div> 
            
        </div>

        <div class="panel-body">
            <div class="container">
                <div class="row">
                    <?php if(count($results)):?>
                        <?php foreach($results as $result): ?>
                            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="<?=PROOT?><?=$result->image_path?> " class="img-rounded card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?=$result->title?></h5>
                                        <p class="card-text"><?=$result->description?></p>
                                        <a href="<?=$result->link?>" class="btn btn-primary"><?=$result->pr_username?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php else: ?>
                        <div class="nopromo">
                            <div class="text-center">No Promotions</div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php $this->end() ?>