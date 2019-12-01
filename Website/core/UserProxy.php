<?php

class UserProxy extends Proxy implements IUser{
		
	public function passwordChange($id,$username,$oldPassword,$newPassword){
		
		if ($this->checkPassword($oldPassword)){
			if (currentUser()->passwordChange($id,$username,$oldPassword,$newPassword)){
				return true;
			}
			return false;
		}
		return false;
	}
	
	public function emailChange($id,$username,$newEmail,$password){
		
		if ($this->checkPassword($password)){
			if (currentUser()->emailChange($id,$username,$newEmail,$password)){
				return true;
			}
			return false;
		}
		return false;
	}
	
	public function usernameChange($id,$currentUsername,$newUsername,$password){
		
		if ($this->checkPassword($password)){
			$tempUser = new User($username);
			if ($tempUser->usernameChange($id,$currentUsername,$newUsername,$password)){
				return true;
			}
			return false;
		}
		return false;
	}
	
}