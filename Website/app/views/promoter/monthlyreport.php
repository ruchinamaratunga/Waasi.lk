<?php
    $promoter = $this->currentUser;
    $username = $this->searchResults[0];
    $subscribedCount = $this->searchResults[1];
    $promotionList = $this->searchResults[2];
?>

<?php $this->start('head'); ?>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<style>

</style>
    <header class="top-area single-page" id="home">
        <div class="top-area-bg-addPromo" data-stellar-background-ratio="0.6"></div>
        <div class="welcome-area">
            <div class="area-bg"></div>
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="welcome-text text-center">
                            <h2>Report</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class  = "report">
        <div class= "row">
            <div class = "col-sm-6 ">
                <div class="paralleltab alert alert-success" ><i class="material-icons">business_center</i>    Promoter Name: <?php echo $username?></div>
            </div>
            <div class = "col-sm-6 ">
                <div class="paralleltab alert alert-success"><i class="material-icons">person_add</i>  No of Subscribers: <?php echo $subscribedCount?></div><br><br>
            </div>
        </div>

        <div class="table-responsive" id= "table">
            <table class="table table-hover " >
                <thead>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>State</th>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            foreach ($promotionList as $promo){
                                echo "<tr>";
                                echo "<td>".$promo["title"]."</td>";
                                echo "<td>".$promo["category"]."</td>";
                                echo "<td>".$promo["description"]."</td>";
                                echo "<td>".$promo["start_date"]."</td>";
                                echo "<td>".$promo["end_date"]."</td>";
                                echo "<td>".$promo["state"]."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group" align = "right">
            <form action="<?=PROOT?>promoter/monthlyreport" method="post" target="_blank">
                <input type="submit" value="Download Pdf" id="locationbtn" name="generatepdf" class="btn btn-primary"><br>
            </form>
        </div>
    </div>
<?php $this->end();?>







