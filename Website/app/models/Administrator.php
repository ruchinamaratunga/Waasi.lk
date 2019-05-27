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
            'conditions' => ['state = ?','end_date > ?'],
            'bind' => ["Pending",currentDate()] 
        ));

	}

    public function acceptPromotion($promo_id){
        $promotion = new Promotion((int)$promo_id);
        $promotion->confirmPromotion($promo_id);
        $promoter = new Promoter($promotion->pr_username);
        // dnd($promoter);
        $subscribers = $promoter->getSubscribers();
        // dnd($subscribers);
        foreach ($subscribers as $subscriber) {
            $c = new Customer($subscriber->customer);
            $customer_id = $c->id;
            $this->_db->insert('notification_system',array(
                'promo_id' => $promo_id,
                'customer_id' => $customer_id,
                'status'=> 'unread'
            ));
        }  

    }
    
    public function rejectPromotion($promo_id){
        $promotion = new Promotion((int)$promo_id);
        $promotion->reject();
    }

    
    public function getRejecteddPromotion($promoID){
		$this->rejectPromotion($promoID);
	}
	
    public function getViewPromotion(){
		$temp = $this->viewPromotion();
		return $temp;
	}

    

}