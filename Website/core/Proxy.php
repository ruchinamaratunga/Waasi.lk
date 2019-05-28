<?php

class Proxy{
	
	protected function checkPassword($password){
		if(password_verify($password, currentUser()->password)){
			return true;
		}
		else{
			return false;
		}
	}
	
}