<?php 
    $results = $this->searchResults ;
    // dnd($results);
?>

<?php $this->start('head'); ?>
    <link rel="stylesheet" href="<?=PROOT?>css/promotion_card.css">
<?php $this->end(); ?>

<?php $this->start('body'); ?>

<header class="top-area single-page" id="home">
        <div class="top-area-bg-movies" data-stellar-background-ratio="0.6"></div>
        <div class="header-top-area"></div>
        <div class="welcome-area">
            <div class="area-bg"></div>
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="welcome-text text-center">
                            <h2>Sports promotions</h2>
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
                                        <div class="single-blog wow fadeIn">
											<div class="blog-details">
												<div class="blog-meta"></div>
												<h3>NO PROMOTIONS</h3>
											</div>
										</div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->end(); ?>
