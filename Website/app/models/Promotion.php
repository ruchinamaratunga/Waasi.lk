<?php

class Promotion extends Model {
    
    public function __construct() {
        $table = "promotion";
        parent::__construct($table);
        $this->_softDelete = true;
    }

    public function search($params=[]) {
        $results = [];
        $today = currentDate();
        // dnd($params);
        $this->query("SELECT * FROM promotion WHERE (catagory LIKE ? OR pr_username LIKE ? OR title LIKE ?) AND state = ? AND end_date > ? ORDER BY start_date DESC", [$params['search'],$params['search'],$params['search'],"Approved",$today]);
        
        $resultsQuery = $this->_db->results();
        // dnd($resultsQuery);
        foreach($resultsQuery as $result) {
            $obj = new Promotion($this->_table);
            $obj->populateObjData($result);
            $results[] =$obj;
        }

        return $results;
    }

    public function getPromoByCatagory($catagory) {
        $today = currentDate();
        $results = $this->find(['conditions' => ['catagory = ?' ,'end_date > ?','state = ?'],'bind' => [$catagory,$today,'Approved'],'order' => "start_date DESC"]);
        return $results;
    }

    public function getPromoByPromoter($promoter) {
        $today = currentDate();
        return $this->find(['conditions' => ['pr_username = ?' ,'end_date > ?','state = ?'],'bind' => [$promoter,$today,'Approved'],'order' => "start_date DESC"]);
    }

    public function comfirmPromotions($promotion) {
        $this->update($promotion->id,array(
            'state' => 'Approved'
        ));
    }

    public function addPromo($params) {
        $this->assign($params);
        $this->deleted = 0;
        $this->save();
    }

    public function uploadImage(){

        $target_dir = ROOT.'/img/Promotions/';
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["tmp_name"],".tmp").".".strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));

//        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $image='/img/Promotions/'.basename($target_file);

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            return $image;

        } else {
//          echo "Sorry, there was an error uploading your file.";
            return null;
        }

        // End of file upload

//        //$promotion->image=("../Extra/img/users/promotions/".$image);
//        $tmp=$_SESSION["userName"];
//        $promotion=new Promotion(null,$category,$title,$description,("../Extra/img/users/promotions/".$image),$link,$state,$startTime,$endTime,$location,$tmp,$ad_username);
//
//        Promotion::addPromotionToDB($promotion);

    }


    public function validatePromo() {

    }

    public function registerPromo() {

    }

    

    // public static function readPromotionFromDB($promoID){
	// 	$dbh=new Dbh();
	// 	$conn = $dbh->connect();
	// 	$sql = $conn->prepare("SELECT * from confirmed_promotion WHERE promo_id = ?");
				
	// 	$sql->bind_param("s", $promoID);
	// 	$sql->execute();
	// 	$results = $sql->get_result();
	// 	if($row = $results->fetch_array(MYSQLI_ASSOC)){

	// 		//$promoID,$category,$title,$description,$image,$link,$state,$startDate,$endDate,$location,$pr_username,$ad_username
    //         return new Promotion($row["promo_id"],$row["category"],$row["title"],$row["description"],$row["image_path"],$row["link"],$row["state"],$row["start_date"],$row["end_date"],$row["location"],$row['pr_username'],$row["ad_username"]);
	// 	}

	// 	else{
	// 		return null;
	// 	}	
	// }


}
