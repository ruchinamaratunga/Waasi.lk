<?php

class Promotion extends Model {
    
    public function __construct($user='') {
        $table = "promotion";
        parent::__construct($table);
        $this->_softDelete = true;
        if($user != '') {
            if(is_int($user)) {
                $u = $this->_db->findFirst('promotion',['conditions'=>'promo_id = ?', 'bind'=>[$user]]);
            } else {
                $u = $this->_db->findFirst('promotion',['conditions'=>'title = ?', 'bind'=>[$user]]);
            }
            if($u) {
                foreach($u as $key =>$val) {
                    $this->$key = $val;
                }
            }
        }
    }

    public function Search($params=[]) {
        $results = [];
        $today = currentDate();
        // dnd($params);
        $this->query("SELECT * FROM promotion WHERE (catagory LIKE ? OR pr_username LIKE ? OR title LIKE ? or location LIKE ?) AND state = ? AND end_date > ? ORDER BY start_date DESC", [$params['search'],$params['search'],$params['search'],$params['search'],"Approved",$today]);
        
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

    public function getPromoById($id) {
        $today = currentDate();
        return $this->find(['conditions' => ['promo_id = ?' ,'end_date > ?','state = ?'],'bind' => [$id,$today,'Approved'],'order' => "start_date DESC"]);
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

    public function updatePromo($params,$promo_id) {
        //$this->assign($params);
        $this->deleted = 0;

        $fieldString = '';
        $values = array();

        foreach($params as $field => $value) {
            $fieldString .= ' ' . $field . ' = ?,';
            $values[] = $value;
        }
        $fieldString = trim($fieldString);
        $fieldString = rtrim($fieldString,',');
        $sql = "UPDATE {$this->_table} SET {$fieldString} WHERE promo_id = {$promo_id}";
//        dnd($sql);
        if(!$this->query($sql, $values)->error()) {
            return true;
        }
        return false;
//        $this->save();
    }

    public function deletePromo($promo_id){
        $this->deleted = 0;
        $sql = "UPDATE {$this->_table} SET state = ? WHERE promo_id = {$promo_id}";
//        dnd($sql);
        if(!$this->query($sql, ['Deleted'])->error()) {
            return true;
        }
        return false;
    }

    public function  loadMyPromos(){
        $results = [];
        $sql = "SELECT * FROM {$this->_table} WHERE (state = ? OR state=?) AND pr_username = ? ORDER BY start_date = ?";
        $this->_db->query($sql,['Approved','Pending', currentUser()->username,'start_date DESC']);

        $resultsQuery=$this->_db->results();

        if($resultsQuery){
            foreach($resultsQuery as $result) {
                $obj = new $this->_modelName($this->_table);
                $obj->populateObjData($result);
                $results[] =$obj;
            }
        }
        return $results;
    }

    public function confirmPromotion($promo_id) {
        $this->query("UPDATE promotion SET state = ? WHERE promo_id = ?",array('Approved',$promo_id));
    }

    public function reject() {
        $this->query("UPDATE promotion SET state = ? WHERE promo_id = ?", array('Rejected',$this->promo_id));
    }
}
