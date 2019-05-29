<?php

include_once(ROOT.'/app/lib/PHPMailer/PHPMailerAutoload.php');
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
		$email = $promoter->email;
		$title = $promotion->title;
		$description = $promotion->description;
		$state = "ACCEPTED";
		$a = $this->sendEmail($email,$title,$description,$state);
		if ($a){
			return true;
		}
		return false;
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
	
	public function sendEmail($email,$title,$description,$state){
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
		$mail->Subject = 'A TEST EMAIL!';
		$mail->Body = "YOUR PROMOTION: \r\nTITLE - ".$title."\r\nDescription - ".$description."\r\nwas ".$state."\r\nThankyou for doing business with us!\r\nWaasi.lk";
		$mail->AddAddress('achinthaisuru.17@cse.mrt.ac.lk');
		
		if ($mail->Send()){
			return true;
		}
		else{
			return false;
		}
	}

    

}