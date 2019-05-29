<?php

class Users extends Model {
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

    /**
     * static method is used becoz we want to log out from all the devices we use
     */
    public static function currentLoggedInUser() {
        if(!isset(self::$currentLoggedInUser) && Session::exists(CURRENT_USER_SESSION_NAME)) {
                $u = new Users((int)Session::get(CURRENT_USER_SESSION_NAME));
                self::$currentLoggedInUser = $u;
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

    public function registerNewUser($params) {
        $this->assign($params);
        $this->deleted = 0;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->save(); 
    }

    public function acls() {
        if(empty($this->acl)) return [];
        return json_decode($this->acl,true);
    }
	
	public function checkPassword($password){
		
		if(password_verify($password, $this->password)){
			return true;
		}
		else{
			return false;
		}

		
	}
	
	public function passwordChange($id,$username,$oldPassword,$newPassword){
		
		$newPassword= password_hash($newPassword, PASSWORD_DEFAULT);
		
		if($this->update($id,['password' => $newPassword])){
			if ($this->user_type == 'Customer'){
				$user = new Customer($username);
				if($user->update($user->id,['password' => $newPassword])){
					return true;
				}
				return false;
			}
			elseif ($this->user_type == 'Promoter'){
				$user = new Promoter($username);
				if($user->update($user->id,['password' => $newPassword])){
					return true;
				}
				return false;
			}
		}
		else{
			return false;
		}

//		$this->save();
	}
	
	public function usernameChange($id,$currentUsername,$newUsername,$password){
		
		if($this->update($id,['username' => $newUsername])){
			if ($this->user_type == 'Customer'){
				$user = new Customer($currentUsername);
				if($user->update($user->id,['username' => $newUsername])){
					return true;
				}
				return false;
			}
			elseif ($this->user_type == 'Promoter'){
				$user = new Promoter($currentUsername);
				if($user->update($user->id,['username' => $newUsername])){
					return true;
				}
				return false;
			}
		}
		else{
			return false;
		}

//		$this->save();
	}
	
	public function emailChange($id,$username,$newEmail,$password){
		
		if($this->update($id,['email' => $newEmail])){
			if ($this->user_type == 'Customer'){
				$user = new Customer($username);
				if($user->update($user->id,['email' => $newEmail])){
					return true;
				}
				return false;
			}
			elseif ($this->user_type == 'Promoter'){
				$user = new Promoter($username);
				if($user->update($user->id,['email' => $newEmail])){
					return true;
				}
				return false;
			}
		}
		else{
			return false;
		}

//		$this->save();
	}
	
	
}