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
	
//	protected function sendEmail(){
//		$mail = new PHPMailer();
//		$mail->isSMTP();
//		$mail->SMTPAuth = true;
//		$mail->SMTPSecure = 'ssl';
//		$mail->Host = 'smtp.gmail.com';
//		$mail->Port = '465';
//		$mail->isHTML();
//		$mail->Username = BUSINESS_EMAIL;
//		$mail->Password = BUSINESS_PASSWORD;
//		$mail->Subject = 'A TEST EMAIL!';
//		$mail->Body = 'A ts';
//		$mail->AddAddress('achinthaisuru.17@cse.mrt.ac.lk');
//		
//		$mail->Send();
//	}
	
}