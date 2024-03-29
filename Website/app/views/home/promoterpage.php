<?php
    $promoter = $this->promoter;
    $promotions = $this->promotions;
    $user = currentUser();
    $comments = $this->promoter->showComments();
    $count = $this->promoter->count;
    $subscribe = $this->subscribe;

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
        if('<?=$subscribe?>') {
            $("#subscribe").html('Unubscribe');
        } else {
            $("#subscribe").html('Subscribe');
        }
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
})

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
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <?php if(count($promotions)):?>
                            <?php foreach($promotions as $promotion): ?>
                                
                                    <div class="single-blog wow fadeIn">
                                        <div class="blog-image">
                                            <img src="<?=PROOT?><?=$promotion->image_path?>" alt="">
                                        </div>
                                        <div class="blog-details">
                                            <div class="blog-meta"><a href="#"><i class="fa fa-ship"></i></a></div>
                                            <h3><a href="#"><?=$promotion->title?></a></h3>
                                            <div class="post-date"><a href="#"><i class="fa fa-calendar"></i><?=$promotion->start_date?></a></div>
                                            <p><?=$promotion->description?></p> 
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
            
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="sidebar-area wow fadeIn">
					    <div class="single-sidebar-widget widget_categories">
                            <div class="quote-form">
                                <button id="subscribe"></button>  
                            </div>                          
                   	    </div>
 
						<div class="single-sidebar-widget widget_search">
							<h4>Contact us</h4>
							<ul>
                                <li><i class="fa fa-phone"></i> <a href="callto:<?=$promoter->phone_number?>">&nbsp;&nbsp;<?=$promoter->phone_number?></a></li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:<?=$promoter->email?>" target="_blank">&nbsp;<?=$promoter->email?></a></li>
								<li><i class="fa fa-facebook"></i> <a href="<?=$promoter->fb_link?>" target="_blank">&nbsp;&nbsp;&nbsp;facebook</a></li>
								<li><i class="fa fa-globe"></i> <a href="<?=$promoter->website?>" target="_blank">&nbsp;&nbsp;visit us</a></li>
                            </ul>
                    	</div>

						<div class="single-sidebar-widget widget_categories">
							<h3>Give a comment</h3>
                            <div class="quote-form">
                                <p><textarea name="comment" id="comment" cols="30" rows="4" form="comment-form" placeholder="Your Comment..."></textarea></p>
								<button id="comment-submit">Comment</button>
                                <p id="thanks"></p>
                            </div>
                    	</div>
                        

                        <div class="single-sidebar-widget widget_categories">
                            <div class="row">
                                <div class="col-sm-12">
                                <h3>Comments</h3>
                                </div>
                            </div>

                            <div id="see-comment">
                                <?php if($comments): ?>
                                    <?php for($i=0;$i<min(5,count($comments));$i++): ?>
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
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
                                    <div id="see-more" class="text-right" ><a id="get-comments">see more...</a></div>
                                <?php else: ?>
                                    <div class="nopromo">
                                        <div class="text-center">No comments</div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
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