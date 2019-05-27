<?php

class UserProxy implements IUser{
	
	public function checkPassword($password){
		if(password_verify($password, $this->password)){
			return true;
		}
		else{
			return false;
		}
	}
	
}