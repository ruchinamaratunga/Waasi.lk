<?php

class Promotion extends Model {
    
    public function __construct() {
        $table = "promotion";
        parent::__construct($table);
        $this->_softDelete = true;
    }

    public function Search($params=[]) {
        $results = [];
        $today = currentDate();

        if($params["promoter"] == "on") {
            $this->query("SELECT * FROM promotion WHERE  pr_username = ? AND end_date > ? ORDER BY start_date DESC" , [$params['search'],$today]);
        } elseif ($params['catagory'] == "on") {
            $this->query("SELECT * FROM promotion WHERE  catagory = ? AND end_date > ? ORDER BY start_date DESC" , [$params['search'],$today]);
        } else {
            $this->query("SELECT * FROM promotion WHERE (catagory = ? OR pr_username = ? OR title = ?) AND end_date > ? ORDER BY start_date DESC", [$params['search'],$params['search'],$params['search'],$today]);
        }
        $resultsQuery = $this->_db->results();
        foreach($resultsQuery as $result) {
            $obj = new Promotion($this->_table);
            $obj->populateObjData($result);
            $results[] =$obj;
        }

        return $results;
        
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

// $contact =DB::getInstance()->find('contacts', [
//     'conditions' => ['lname => ?', 'fname => ?' ],
//     'bind' => ['Subasinghe'],
//     'order' => "lname,fname",
//     'limit' => 5
// ]);