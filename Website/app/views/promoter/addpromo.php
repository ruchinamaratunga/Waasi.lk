<?php $this->start('head'); ?>

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script type="text/javascript" src="<?=PROOT?>js/datepicker.js"></script>
    <script type="text/javascript" src="<?=PROOT?>js/formValidation.js"></script>



<?php $this->end(); ?>
<?php $this->start('body'); ?>

    <body style="background-color:DodgerBlue;">

    <header class="top-area single-page" id="home">
        <div class="top-area-bg-addPromo" data-stellar-background-ratio="0.6"></div>
        <div class="welcome-area">
            <div class="area-bg"></div>
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="welcome-text text-center">
                            <h2>Add Promotion</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="about-area gray-bg section-padding">

        <div class="panel-body">
            <form  action="<?=PROOT?>promoter/addpromo" id="form" method="post" enctype="multipart/form-data" class="form-horizontal" >
                <div class="bg-danger text-center"><?= $this->displayErrors ?></div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="catagory">Category:</label>
                    <div class="col-sm-5">
                        <select name="catagory" id="catagory">
                            <option value="food">FOOD</option>
                            <option value="cloths-accessories">CLOTHS & ACCESSORIES</option>
                            <option value="movies">MOVIES</option>
                            <option value="electronic-devices">ELECTRONIC DEVICES</option>
                            <option value="sport-equipments">SPORTS EQUIPMENTS</option>
                            <option value="other">OTHER</option>
                        </select>
                        <!--                        <input type="text" class="form-control" id="firstname1" name="firstname1" placeholder="First name" />-->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="title">Title:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="Enter the Title" id="title" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="description">Description:</label>
                    <div class="col-sm-5">
                        <textarea class="form-control" placeholder="Enter the Description" id="description" name="description"></textarea>
                    </div>
                </div>




<!---->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-4 control-label" for="start_date">Start Date:</label>-->
<!--                    <div class="col-sm-5">-->
<!--                        <input type="date" class="form-control" id="start_date" placeholder="Enter the Start Date" name="start_date">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-4 control-label" for="end_date">Expire Date:</label>-->
<!--                    <div class="col-sm-5">-->
<!--                        <input type="date" class="form-control" id="end_date" placeholder="Enter the end date" name="end_date">-->
<!--                    </div>-->
<!--                </div>-->

                <div class="form-group"> <!-- Date input -->
                    <label class="col-sm-4 control-label" for="start_date">Start Date:</label>
                    <div class="col-sm-5">
                    <input class="form-control" id="start_date" name="start_date" placeholder="MM/DD/YYY" type="text"/>
                    </div>
                </div>

                <div class="form-group"> <!-- Date input -->
                    <label class="col-sm-4 control-label" for="end_date">Expire Date:</label>
                    <div class="col-sm-5">
                    <input class="form-control" id="end_date" name="end_date" placeholder="MM/DD/YYY" type="text"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="link">Link to Original Site:</label>
                    <div class="col-sm-5">
                        <input type="url" class="form-control" id="link" placeholder="Enter your link" name="link">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="location">Location:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="location" placeholder="Enter the location" name="location">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="fileToUpload">Promo Image:</label>
                    <div class="col-sm-5">
                        <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" >
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-4">
                        <button type="submit" class="btn btn-primary"  name="addpromo-submit">Add Promo</button>
                    </div>
                </div>
            </form>



        </div>


    </section>

<!--    <header class="top-area single-page-promoter" id="home">-->
<!--       <div class="top-area-bg-promoter-template" data-stellar-background-ratio="0.6">-->
<!--		   <div class = "brand admin">-->
<!--			   <h2>ADD PROMO</h2>-->
<!--		   </div>-->
<!--	   </div>-->
<!--    </header>-->
<!--    <h1 class="text-center">Need to complete</h1>-->

<?php $this->end();?>