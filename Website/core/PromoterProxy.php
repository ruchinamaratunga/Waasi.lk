<?php

class PromoterProxy extends Proxy implements IPromoter{
		
	public function websiteChange($username,$password,$newWebsite){
		
		if ($this->checkPassword($password)){
			$tempUser = new Promoter($username);
			if ($tempUser->websiteChange($username,$password,$newWebsite)){
				return true;
			}
			return false;
		}
		return false;
	}
	
	public function fblinkChange($username,$password,$newFb){
		
		if ($this->checkPassword($password)){
			$tempUser = new Promoter($username);
			if ($tempUser->fblinkChange($username,$password,$newFb)){
				return true;
			}
			return false;
		}
		return false;
	}
	
//	public function usernameChange($id,$currentUsername,$newUsername,$password){
//		
//		if ($this->checkPassword($password)){
//			$tempUser = new User($username);
//			if ($tempUser->usernameChange($id,$currentUsername,$newUsername,$password)){
//				return true;
//			}
//			return false;
//		}
//		return false;
//	}
	
}