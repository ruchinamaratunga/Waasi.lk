<?php

class Promoter extends Model {
    private $_isLoggedIn,
            $_sessionName,
            $_cookieName;
    public static $currentLoggedInUser = null;
    public $count = 5;

    public function __construct($user='') {
        $table = 'promoter';
        parent::__construct($table);
        $this->_sessionName = CURRENT_USER_SESSION_NAME;
        $this->_cookieName = REMEMBER_ME_COOKIE_NAME;
        $this->_softDelete = true;

        if($user != '') {
            if(is_int($user)) {
                $u = $this->_db->findFirst('promoter',['conditions'=>'id = ?', 'bind'=>[$user]]);
            } else {
                $u = $this->_db->findFirst('promoter',['conditions'=>'username = ?', 'bind'=>[$user]]);
            }
            if($u) {
                foreach($u as $key =>$val) {
                    $this->$key = $val;
                }
            }
        }
    }

    /*
    * This method is used to read the first result of the result query
    */
    public function findByUsername($username) {
        return $this->findFirst(['condition' => "username = ?" , 'bind' => [$username]]);
    }
    
    /*
    * This method is used to read all the results of the result query
    */
    public function findPromotionsByUsername($username) {
        return $this->find(['condition' => "username = ?" , 'bind' => [$username]]);
    }

    /*
    * This method is used to read the number of subscribed customers of the promoter
    */
    public function findSubscribedCustomerCount($username){
        $count_obj =  ($this->query("SELECT COUNT(DISTINCT customer) FROM subscribe WHERE promoter = (?)",[$username]))->results()[0];
        return ($count_obj->{"COUNT(DISTINCT customer)"});
    }

    /**
     * static method is used becoz we want to log out from all the devices we use
     */
    public static function currentLoggedInUser() {
        if(!isset(self::$currentLoggedInUser) && Session::exists(CURRENT_USER_SESSION_NAME)) {
                $u = new Users((int)Session::get(CURRENT_USER_SESSION_NAME));
                $p = new Promoter($u->username);                            
                self::$currentLoggedInUser = $p;
        } 
        return self::$currentLoggedInUser;
    }

    public function login($rememberMe = false) {
        Session::set($this->_sessionName,$this->id);
        if($rememberMe) {
            $hash = md5(uniqid() + rand(0,100));
            $user_agent = Session::uagent_no_version();
            Cookie::set($this->_cookieName, $hash, REMEMBER_ME_COOKIE_EXPIRY);
            $fields = ['session' => $hash, 'user_agent' =>$user_agent, 'user_id' =>$this->id];
            $this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?",[$this->id, $user_agent]);      //delete old cookies saved in the DB
            $this->_db->insert('user_sessions', $fields);
        }
    }

    public static function loginUserFromCookie() {
        $userSession = UserSessions::getFromCookie();
        if($userSession->user_id != '') {
            $user = new self((int)$userSession->user_id);
        }
        if($user) {
            $user->login();
        }
        return $user;
    }

    public function logout() {
        $userSession = UserSessions::getFromCookie();
        if($userSession) $userSession->delete();
        Session::delete(CURRENT_USER_SESSION_NAME);
        if(Cookie::exists(REMEMBER_ME_COOKIE_NAME)) {
            Cookie::delete(REMEMBER_ME_COOKIE_NAME);
        }
        self::$currentLoggedInUser = null;
        return true;
    }

    public function registerNewPromoter($params) {
        $this->assign($params);
        $this->deleted = 0;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->save();
    }

    public function acls() {
        if(empty($this->acl)) return [];
        return json_decode($this->acl,true);
    }

    public function getPromotions() {
        $p = new Promotion();
        $promotions = $p->getPromoByPromoter($this->username);
        return $promotions;
    }

    public function recieveComment($comment,$commentee) {
        $promoter = $this->username;
        $date = currentDate();
        $this->_db->insert('comments',array(
            'promoter' => $promoter,
            'customer' => $commentee,
            'comment' => $comment,
            'date' => $date
        ));
    }

    public function showComments() {
        // $comments = $this->query("SELECT * FROM comments WHERE promoter = ?", array($this->username));
        $comments = $this->_db->find('comments',array(
            'conditions' => 'promoter = ?',
            'bind' => [$this->username]
        ));
        return $comments;
    }
	
	public function commentCount(){
        if($this->showComments()) {
            return sizeof($this->showComments());
        }
	}
	
	public function showLastFiveComments(){
        $comments = $this->showComments();
        if($comments) {
            if(sizeof($comments)<=5){
                return $comments;
            }
            else{
                $comments = array_reverse($comments);
                $comments = array_slice($comments,0,5);
                return $comments;
            }
        }
	}

    public function isSubscribe() {
        $customer = currentUser()->username;
        // dnd($customer);
        // dnd($this->_db->find('subscribe',['conditions' =>['promoter = ?','customer = ?'],'bind'=>[$this->username,$customer]]));
        if($this->_db->find('subscribe',['conditions' =>['promoter = ?','customer = ?'],'bind'=>[$this->username,$customer]])){
            return true;
        }
        return false;
    }

    public function getSubscribers() {
        return $this->_db->find('subscribe',array(
            'conditions' => 'promoter = ?',
            'bind' => [$this->username]
        ));
    }
	
	public function websiteChange($username,$password,$newWebsite){
			if($this->update($this->id,['website' => $newWebsite])){
				return true;
			}
				return false;
	}
	
	public function fblinkChange($username,$password,$newFb){
			if($this->update($this->id,['fb_link' => $newFb])){
				return true;
			}
				return false;
	}


}


