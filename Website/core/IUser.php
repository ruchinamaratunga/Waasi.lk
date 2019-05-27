<?php

interface IUser{
	public function passwordChange($id,$username,$newPassword);
	
	public function usernameChange($id,$currentUsername,$newUsername);
	
	public function emailChange($id,$username,$newEmail);
}