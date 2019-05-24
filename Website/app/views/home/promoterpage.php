<?php
    $promoter = $this->promoter;
    $promotions = $this->promotions;
    $user = currentUser();
    $comments = $this->promoter->showComments();
    $count = $this->promoter->count;
    $subscribe = $this->subscribe;
    // dnd($subscribe);
    // $subscribe = true;
?>

<?php $this->start('head'); ?>

    <style>
        .submit {
            background: #5d6b82 none repeat scroll 0 0;
            border: 0 none;
            border-radius: 5px;
            color: #fff;
            letter-spacing: 2px;
            padding: 10px 20px;
            text-transform: uppercase;
            -webkit-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .submit:hover {
            background: #f39c12;
            color: #fff;
        }

    </style>


<?php $this->end(); ?>

<?php $this->start('body'); ?>

<script type="text/javascript"> 

var count = 5;
var promoter = '<?=$promoter->username?>';


$(document).ready(function(){
    $("#comment-submit").click(function(){
        var comment = $("#comment").val().trim();
        if(comment != '') {
            $.ajax({
            type : "POST",
            url : "<?=PROOT?>home/comment",
            data : {comment : comment,
                promoter: promoter
                },
            success : function(resp) {
                $("#comment").val('');
                $('#thanks').html("Thanks for the comment");
            }
        });
        }
    });
});


$(document).ready(function() {
    if('<?=$subscribe?>') {
        $("#subscribe").html('Unubscribe');
    } else {
        $("#subscribe").html('Subscribe');
    }
    
    $("#subscribe").click(function() {
            $.ajax({
                type : "POST",
                url : '<?=PROOT?>home/subscribe',
                data : {promoter : promoter},
                success : function(resp) {
                    console.log(resp);
                    $("#subscribe").html(resp['resp']);
                }
            });
        });

});

$(document).ready(function() {
    var count = 5;
    $("#see-more").click(function() {
        count = count + 5;
        $.ajax({
            type : "POST",
            url : '<?=PROOT?>home/seeComment',
            data : {count:count, promoter:promoter},
            success : function(resp) {
                $("#see-comment").html(resp);
                $("#see-more").html("more comments");
            }
        });
    });
});


</script>



<header class="top-area single-page-promoter" id="home">

		
    <div class="top-area-bg-promoter-template" data-stellar-background-ratio="0.6">
	   <div class = "service-image"></div>
	   <div class = "brand">
		   <h2><?= $promoter->promoter_name ?></h2>
	   </div>
   </div>
		
</header>


<section class="blog-area blog-page section-padding">
        <div class="container">
            <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                <?php if(count($promotions)):?>
                    <?php foreach($promotions as $promotion): ?>
                        
                            <div class="single-blog wow fadeIn">
                                <div class="blog-image">
                                    <img src="<?=PROOT?><?=$promotion->image_path?>" alt="">
                                </div>
                                <div class="blog-details">
                                    <div class="blog-meta"><a href="#"><i class="fa fa-ship"></i></a></div>
                                    <h3><a href="<?=PROOT?>home/promoterpage/<?=$promotion->pr_username?>"><?=$promotion->title?></a></h3>
                                    <div class="post-date"><a href="#"><i class="fa fa-calendar"></i><?=$promotion->start_date?></a></div>
                                    <p><?=$promotion->description?></p> 
                                    <a href="<?=$promotion->link?>" class="read-more">Visit us</a>
                                </div>
                            </div>
                        
                    <?php endforeach;?>
                <?php else: ?>
                    <div class="nopromo">
                        <div class="text-center">No Promotions</div>
                    </div>
                <?php endif; ?>
            

            </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="sidebar-area wow fadeIn">
					    <div class="single-sidebar-widget widget_categories">
                            <div class="quote-form">
                                <button id="subscribe">subscribe</button>  
                            </div>                          
                   	    </div>
 
						<div class="single-sidebar-widget widget_search">
							<h4>Contact us</h4>
							<ul>
                                <li><i class="fa fa-phone"></i> <a href="callto:+8801911854378">&nbsp;&nbsp;<?=$promoter->phone_number?></a></li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:backpiper.com@gmail.com">&nbsp;<?=$promoter->email?></a></li>
								<li><i class="fa fa-facebook"></i> <a href="#">&nbsp;&nbsp;&nbsp;<?=$promoter->fb_link?></a></li>
                            </ul>
                    	</div>
						<div class="single-sidebar-widget widget_categories">
							<h3>Star rating</h3>
							<div class="box">

							</div>
                    	</div>

						<div class="single-sidebar-widget widget_categories">
							<h3>Give a comment</h3>
                            <div class="quote-form">
                                <p><textarea name="comment" id="comment" cols="30" rows="4" form="comment-form" placeholder="Your Comment..."></textarea></p>
								<button id="comment-submit">Comment</button>
                                <p id="thanks"></p>
                            </div>
                    	</div>
                        

                        <div class="container" style="width: 500px;">
                            <div class="row">
                                <div class="col-sm-12">
                                <h3>Comments</h3>
                                </div>
                            </div>

                            <div id="see-comment">
                                <?php if($comments): ?>
                                    <?php for($i=0;$i<min(5,count($comments));$i++): ?>
                                        <div class="row">
                                            <div class="col-sm-2 col-xs-2">
                                                <div class="thumbnail">
                                                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                                </div>
                                            </div>
                                            <div class="col-sm-10 col-xs-10">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <strong style="padding-left: 5px;"><?=$comments[$i]->customer?></strong> <span class="text-muted pull-right"><?=$comments[$i]->date?></span>
                                                    </div>
                                                    <div class="panel-body">
                                                        <?=$comments[$i]->comment?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php endfor; ?>
                                <?php else: ?>
                                    <div class="nopromo">
                                        <div class="text-center">No comments</div>
                                    </div>
                                <?php endif; ?>
                            <!-- </div> -->

                            
                        </div>
                        <div id="see-more" class="text-right" ><a id="get-comments">see more...</a></div>
						

                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-12 col-xs-12">
                    <ul class="pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div> -->
        </div>
    </section>
<?php $this->end(); ?>