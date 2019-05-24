<?php $this->setSiteTitle('Settings'); ?>
<?php $this->start('head') ?>
    <script>
    
    </script>
<?php $this->end() ?>

<?php $this->start('body') ?>
    <header class="top-area single-page-promoter" id="home">
       <div class="top-area-bg-promoter-template" data-stellar-background-ratio="0.6">
		   <div class = "brand admin">
			   <h2>SETTINGS PAGE</h2>
		   </div>
	   </div>
    </header>
    
    <div class="container">
        <div class="single-blog wow fadeIn" style="margin: 50px;">
			<div class="blog-details " >
				<div class="blog-meta"></div>
                <h4>Change your First name</h4>
                <div class="form-group" style="padding: 20px;"> <!-- Date input -->
                    <label class="col-sm-4 control-label" for="fname">First Name:</label>
                    <div class="col-sm-5">
                    <input class="form-control" id="fname" name="fname" placeholder="first name" type="text"/>
                    </div>
                </div>
                <button class="btn btn-default pull-right" style="margin : 20px;">Save</button>
    
			</div>
		</div>
    </div>

<?php $this->end() ?>