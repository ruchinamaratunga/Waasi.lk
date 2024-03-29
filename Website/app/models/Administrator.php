<?php

include_once(ROOT.DS."app".DS."lib".DS."PHPMailer".DS."PHPMailerAutoload.php");
//include_once(ROOT."\app\lib\fpdf\fpdf.php");
//include_once(ROOT."/app/lib/fpdf/fpdf.php");

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
        $subscribers = $promoter->getSubscribers();
        foreach ($subscribers as $subscriber) {
            $c = new Customer($subscriber->customer);
            $customer_id = $c->id;
            $this->_db->insert('notification_system',array(
                'promo_id' => $promo_id,
                'customer_id' => $customer_id,
                'status'=> 'unread'
            ));
        }  
		$email = $promoter->email;
		$title = $promotion->title;
		$description = $promotion->description;
		$state = "Approved";
		$emailTitle = "Promotion Acceptence Conformation!";
		$a = $this->sendEmail($email,$title,$description,$state,$emailTitle);
		if ($a){
			return true;
		}
		return false;
    }
    
    public function rejectPromotion($promo_id){
        $promotion = new Promotion((int)$promo_id);
        $promotion->reject();
		$promoter = new Promoter($promotion->pr_username);
		$email = $promoter->email;
		$title = $promotion->title;
		$description = $promotion->description;
		$state = "Rejected";
		$emailTitle = "Promotion Rejection Conformation!";
		$a = $this->sendEmail($email,$title,$description,$state,$emailTitle);
		if ($a){
			return true;
		}
		return false;
    }

    
    public function getRejectedPromotion($promoID){
		$this->rejectPromotion($promoID);
	}
	
    public function getViewPromotion(){
		$temp = $this->viewPromotion();
		return $temp;
	}
	
	public function sendEmail($email,$title,$description,$state,$emailTitle){
		$mail = new PHPMailer(true);
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAutoTLS = false;
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = '587';
		$mail->isHTML(true);
		$mail->Username = BUSINESS_EMAIL;
		$mail->Password = BUSINESS_PASSWORD;
		$mail->SetFrom(BUSINESS_EMAIL,'Waasi.lk');
		$mail->Subject = $emailTitle;
		$body = nl2br("YOUR PROMOTION:  \r\n\r\nTITLE - ".$title." \r\n\r\nDescription - ".$description."was ".$state." \r\n\r\nThankyou for doing business with us!\r\nWaasi.lk");
		$mail->Body = $body;
		$mail->AddAddress('achinthaisuru.17@cse.mrt.ac.lk');
		
		if ($mail->Send()){
			return true;
		}
		else{
			return false;
		}
	}

    

}