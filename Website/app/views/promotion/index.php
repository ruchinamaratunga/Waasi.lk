<?php 
// dnd($this->searchResults[0]);
    $results = $this->searchResults[0];
    $districtList = $this->searchResults[1];
    // function runMyFunction() {
    //     echo 'I just ran a php function';
    //   }
    
    //   if (isset($_GET['hello'])) {
    //     echo $_GET['hello'];
    //   }
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
                    <!-- <div class="dropdown pull-right">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
                        </button> -->
                        <!-- <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" method="post">
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
                     </div> -->
                
                    <div class="input-group pull-right">
                        <input type="text" class="form-control" id="search" name="search"  placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </form>
            </div> 
            
        </div>
        <div class= "panel-body">
            <form id="district" action="<?=PROOT?>promotion/index/" method= "post" style="border : none; ">    
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                Select Location     
                <span class="glyphicon glyphicon-search"></span></button>

                <!-- Modal -->
                <div class="modal fade  " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select a City</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class=".p-3">
                                
                                <div class="dropdown">
                                    <div class="col-sm-6">
                                        <ul class="nav nav-pills nav-stacked">
                                            <?php
                                            $midlength = (int)(sizeof($districtList["districts"])/2)+1;
                                            $townlist = $districtList["towns"];
                                            // dnd($midlength);
                                            for($i=0;$i<$midlength;$i++){ 
                                                $ln = sizeof($townlist[$i]);
                                                echo("<li class='dropdown'>
                                                    <a class='dropdown-toggle' data-toggle='dropdown' href='#'  >".
                                                    
                                                        $districtList["districts"][$i]."
                                                        <b class='caret'></b>
                                                    </a>
                                                    <ul class='dropdown-menu' >");
                                                    for($j=0;$j<$ln;$j++){      
                                                        // echo "<input type='hidden' name='town' value='".$townlist[$i][$j]."'>";  
                                                        echo"<li ><a href='".$townlist[$i][$j]."'><p>".$townlist[$i][$j]."<p></a></li>";   
                                                    }
                                                echo("</ul>
                                                </li>");
                                            }
                                            ?>
                                        </ul>
                                
                                    </div> 
                                    <div class="col-sm-6">
                                        <ul class="nav nav-pills nav-stacked">
                                            <?php
                                            $midlength = sizeof($districtList["districts"])/2+1;
                                            $length = sizeof($districtList["districts"]);
                                            $townlist = $districtList["towns"];
                                            for($i=$midlength;$i<$length;$i++){ 
                                                $ln = sizeof($townlist[$i]);
                                                echo("<li class='dropdown'>
                                                    <a class='dropdown-toggle' data-toggle='dropdown' href='#'  >".
                                                    
                                                        $districtList["districts"][$i]."
                                                        <b class='caret'></b>
                                                    </a>
                                                    <ul class='dropdown-menu' >");
                                                    for($j=0;$j<$ln;$j++){      
                                                        // echo "<input type='hidden' name='town' value='".$townlist[$i][$j]."'>";  
                                                        echo"<li ><a href='".$townlist[$i][$j]."'><p>".$townlist[$i][$j]."<p></a></li>";   
                                                    }
                                                echo("</ul>
                                                </li>");
                                            }
                                            ?>
                                        </ul>
                                        
                                    </div> 
                                </div>
                                
                            </div>    
                            
                            <div class="modal-footer">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <button type="button" id="modal-close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-body">
            <div class="container">
                <div class="row">
                    <?php if(count($results)):?>
                        <?php foreach($results as $result): ?>
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="single-blog wow fadeIn">
                                    <div class="blog-image">
                                        <img src="<?=PROOT?><?=$result->image_path?>" alt="">
                                    </div>
                                    <div class="blog-details">
                                        <div class="blog-meta"><a href="#"><i class="fa fa-ship"></i></a></div>
                                        <h3><a href="<?=PROOT?>home/promoterpage/<?=$result->pr_username?>"><?=$result->title?></a></h3>
                                        <div class="post-date"><a href="#"><i class="fa fa-calendar"></i><?=$result->start_date?></a></div>
                                        <p><?=$result->description?></p> 
                                        <a href="<?=$result->link?>" class="read-more">Visit us</a>
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

        <!-- <div class="panel-body">
            <div class="container">
                <div class="row">
                    <?php if(count($results)):?>
                        <?php foreach($results as $result): ?>
                            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="<?=PROOT?><?=$result->image_path?>" class="img-rounded card-img-top" alt="...">
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
        </div>  -->
    </section>
<?php $this->end() ?>