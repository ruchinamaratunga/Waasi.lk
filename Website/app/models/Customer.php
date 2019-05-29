<?php

class Customer extends Model {
    private $_isLoggedIn,
            $_sessionName,
            $_cookieName;
    public static $currentLoggedInUser = null;

    public function __construct($user='') {
        $table = 'customer';
        parent::__construct($table);
        $this->_sessionName = CURRENT_USER_SESSION_NAME;
        $this->_cookieName = REMEMBER_ME_COOKIE_NAME;
        $this->_softDelete = true;

        if($user != '') {
            if(is_int($user)) {
                $u = $this->_db->findFirst('customer',['conditions'=>'id = ?', 'bind'=>[$user]]);
            } else {
                $u = $this->_db->findFirst('customer',['conditions'=>'username = ?', 'bind'=>[$user]]);
            }
            if($u) {
                foreach($u as $key =>$val) {
                    $this->$key = $val;
                }
            }
        }
    }

    public function findByUsername($username) {
        return $this->findFirst(['condition' => "username = ?" , 'bind' => [$username]]);
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

    public function registerNewCustomer($params) {
        $this->assign($params);
        $this->deleted = 0;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->save();
    }

    public function acls() {
        if(empty($this->acl)) return [];
        return json_decode($this->acl,true);
    }

    public function subscribe($promoter){
        $this->_db->insert('subscribe',array(
            'customer' => $this->username,
			//'customer' => $this->fname,
            'promoter' => $promoter
        ));
    }

    public function unsubscribe($promoter) {
        $this->_db->query("DELETE FROM subscribe WHERE customer = ? AND promoter = ?" , array($this->username,$promoter));
    }

    public function subscribePromoters() {
        // return $this->_db->query("SELECT * FROM subscribe WHERE customer = ?", array($this->username));
        return $this->_db->find('subscribe',array(
            'conditions' => 'customer = ?',
            'bind' => [$this->username]
        ));
    }

    public function getNotifications() {
        $promoters = $this->subscribePromoters();
        $promotions = [];
        if($promotions) {
            foreach ($promoters as $promoter) {
                $result = $this->_db->find('promotion',array(
                    'conditions' => [
                        'pr_username = ?',
                        'state = ?',
                        'end_date > ?'
                    ],
                    'bind' => [$promoter->promoter,"Approved",currentDate()],
                    'order' => "start_date",
                    'limit' => 5
                ));
                $promotions[] = $result; 
            }
        }
        
        // dnd($promotions);
        $output =[];
        $temp=[];
        foreach($promotions as $promotion) {
            if($promotion) {
                foreach($promotion as $p) {
                    // test($k->promo_id);
                    $r = $this->_db->find('notification_system',array(
                        'conditions' => ['promo_id = ?','customer_id = ?','status = ?'],
                        'bind' => [$p->promo_id,$this->id,'unread']
                    ));
                    if($r) {
                        $pr = new Promotion();
                        $output[] = $pr->getPromoById($r[0]->promo_id); 
                    }
                    
                }
            } 
        }
        return $output;
    }

    public function unreadPromo($promoter) {
        $promotion= $promoter->getPromotions();
        // dnd($promotion);
        foreach($promotion as $p) {
            $this->_db->query("UPDATE notification_system SET status = ? WHERE promo_id = ?",array('read',$p->promo_id));
        }
    }
}


