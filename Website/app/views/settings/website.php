<?php $this->setSiteTitle('Settings'); ?>
<?php $this->start('head') ?>
    <script>
    
    </script>
	<link rel="stylesheet" href="<?=PROOT?>css/settingsUsername.css">
	<link rel="stylesheet" href="<?=PROOT?>css/style/registerform.css"> 


    <!--        <script type="text/javascript" src="--><?//=PROOT?><!--js/utilityFormValidation.js"></script>-->
    <!--    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">-->
    <script type="text/javascript" src="<?=PROOT?>js/formValidation.js"></script>

    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

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
                <h4>Change your website</h4>
                <div class="form-group" style="padding: 20px;">
					
					<form action="<?=PROOT?>settings/website" id="changeWebsiteForm" method="post">
					<div class="bg-danger"><?= $this->displayErrors ?></div>
						<label class="col-sm-4 control-label" for="current_password">Currnet Password:</label>
						<div class="col-sm-5">
						<input class="form-control" id="current_password" name="current_password" placeholder="Enter the current password" type="password"/>
						</div>

						<br>

						<label class="col-sm-4 control-label" for="website">Enter the new website link:</label>
						<div class="col-sm-5">
						<input class="form-control" id="website" name="website" placeholder="Enter the website" type="url"/>
						</div>
					
					
                </div>
                		<button class="btn btn-default pull-right" style="margin : 20px; background-color: #f39c12; color: white; transform:scale(1.10)" type="submit">Save</button>
					</form>
    
			</div>
		</div>
    </div>

<?php $this->end() ?>