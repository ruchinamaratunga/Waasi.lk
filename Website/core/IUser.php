<?php

interface IUser{
	public function passwordChange($id,$username,$oldPassword,$newPassword);
	
	public function usernameChange($id,$currentUsername,$newUsername,$password);
	
	public function emailChange($id,$username,$newEmail,$password);
}