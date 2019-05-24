<?php

class Administrator extends Model {
    private $_isLoggedIn,
            $_sessionName,
            $_cookieName;
    public static $currentLoggedInUser = null;

    public function __construct($user='') {
        $table = 'users';
        parent::__construct($table);
        $this->_sessionName = CURRENT_USER_SESSION_NAME;
        $this->_cookieName = REMEMBER_ME_COOKIE_NAME;
        $this->_softDelete = true;

        if($user != '') {
            if(is_int($user)) {
                $u = $this->_db->findFirst('users',['conditions'=>'id = ?', 'bind'=>[$user]]);
            } else {
                $u = $this->_db->findFirst('users',['conditions'=>'username = ?', 'bind'=>[$user]]);
            }
            if($u) {
                foreach($u as $key =>$val) {
                    $this->$key = $val;
                }
            }
            // echo $this->username;
        }
    }

    public function findByUsername($username) {
        return $this->findFirst(['condition' => "username = ?" , 'bind' => [$username]]);
    }

    public function acls() {
        if(empty($this->acl)) return [];
        return json_decode($this->acl,true);
    }

    /**
     * methods from the initial file
     * have to refactor
     */
    private function viewPromotion(){
		return $this->_db->find('promotion',array(
            'conditions' => 'end_date > ?',
            'bind' => [currentDate()] 
        ));

	}

    private function acceptPromotion($promotion){
        $promotion->confirmPromotion();
        $promoter = new Promoter($promotion->pr_username);
        $subscribers = $promoter->getSubscribers();
        foreach ($subscribers as $subscriber) {
            $this->_db->insert('notification_system',array(
                'promo_id' => $promotion->id,
                'customer_id' => $subscriber->id,
                'status'=> 'unread'
            ));
        }   
    }
    
    private function rejectPromotion($promoID){
		
		$conn = $this->dbh->connect();
		$sql = $conn->prepare("UPDATE `confirmed_promotion` SET state='Rejected' WHERE `promo_id` =".$promoID.";");
		$sql->execute();
		
    }
    
    public function getAcceptedPromotion($promoID){
		$this->acceptPromotion($promoID);
    }
    
    public function getRejecteddPromotion($promoID){
		$this->rejectPromotion($promoID);
	}
	
    public function getViewPromotion(){
		$temp = $this->viewPromotion();
		return $temp;
	}


}