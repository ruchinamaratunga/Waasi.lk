<?php 

class SettingsController extends Controller {

    public function __construct($controller,$action) {
        parent::__construct($controller,$action);
        $this->view->setLayout('default');
    }
	
	public function indexAction() {
        $this->view->render('settings/index');
    }
	
	public function passwordAction(){
		$validation = new Validate();
		if($_POST) {
            $validation->check($_POST,[
                'current_password' =>[
                    'display' => "Current Password",
                    'required' => true
                ],
				'newPassword' =>[
                    'display' => "New Password",
                    'required' => true,
					'min'=>6
				],
				'newCheckPassword' =>[
                    'display' => "New Password Check",
                    'required' => true,
					'matches' => 'newPassword'
				]
            ]);
			

            if($validation->passed()) {

				$username = currentUser()->username;
				$user = new UserProxy();
				$newPassword = $_POST['newPassword'];
				$oldPassword = $_POST['current_password'];
				$id = currentUser()->id;
				if($user->passwordChange($id,$username,$oldPassword,$newPassword)){
					 echo '<script type="text/javascript">alert("Password Changed Successfully!")</script>';
					Router::redirect('register/logout');
				}
				else{
					 $validation->addError("Password you entered is wrong!");
				}
				
            }
			
        }
		$this->view->displayErrors = $validation->displayErrors();
		$this->view->render('settings/password');
		
	}
	
//	public function usernameAction(){
//		$validation = new Validate();
//		if($_POST) {
//            $validation->check($_POST,[
//                'current_password' =>[
//                    'display' => "Current Password",
//                    'required' => true
//                ],
//				'username' =>[
//                    'display' => "username",
//                    'required' => true					
//				]
//            ]);
//			
//
//            if($validation->passed()) {
//
//				$currentUsername = currentUser()->username;
//				$user = new Users($currentUsername);
//				if($user->checkPassword($_POST['current_password'])){
//					$newUserPassword = $_POST['username'];
//					$id = $user->id;
//					if($user->usernameChange($id,$currentUsername,$newUserPassword)){
//						Router::redirect('settings/index');
//					}
//					else{
//						$validation->addError("Database error!");
//					}
//				}
//				else{
//					 $validation->addError("Password you entered is wrong!");
//				}
//				
//            }
//			
//        }
//		$this->view->displayErrors = $validation->displayErrors();
//		$this->view->render('settings/username');
//	}

	public function emailAction(){
		$validation = new Validate();
		if($_POST) {
            $validation->check($_POST,[
                'current_password' =>[
                    'display' => "Current Password",
                    'required' => true
                ],
				'email' =>[
                    'display' => "Email",
                    'required' => true,
					'unique' => "users",
					'max'=>150,
					'valid_email'=>'email'
				]
            ]);
			

            if($validation->passed()) {

				$username = currentUser()->username;
				$user = new UserProxy();
				$newEmail = $_POST['email'];
				$password = $_POST['current_password'];
				$id = currentUser()->id;
				if($user->emailChange($id,$username,$newEmail,$password)){
					echo '<script type="text/javascript">alert("Email Changed Successfully!")</script>';
					$this->view->render("settings/index");
				}
				else{
					 $validation->addError("Password you entered is wrong!");
				}
				
            }
        }
		$this->view->displayErrors = $validation->displayErrors();
		$this->view->render('settings/email');
	}

	public function websiteAction(){
		$validation = new Validate();
		if($_POST) {
            $validation->check($_POST,[
                'current_password' =>[
                    'display' => "Current Password",
                    'required' => true
                ],
				'website' =>[
                    'display' => "Website",
                    'required' => true,
					'valid_url' => 'website'
				]
            ]);
			

            if($validation->passed()) {
			
				$username = currentUser()->username;
				$user = new PromoterProxy();
				$newWeb = $_POST['website'];
				$password = $_POST['current_password'];
				if($user->websiteChange($username,$password,$newWeb)){
					echo '<script type="text/javascript">alert("Website Changed Successfully!")</script>';
					$this->view->render("settings/index");
				}
				else{
					 $validation->addError("Password you entered is wrong!");
				}
            }
        }
		$this->view->displayErrors = $validation->displayErrors();
		$this->view->render('settings/website');
	}

	public function fbAction(){
		$validation = new Validate();
		if($_POST) {
            $validation->check($_POST,[
                'current_password' =>[
                    'display' => "Current Password",
                    'required' => true
                ],
				'fb' =>[
                    'display' => "Facebook link",
                    'required' => true,
					'valid_url' => 'fb'
				]
            ]);
			

            if($validation->passed()) {
			
				$username = currentUser()->username;
				$user = new PromoterProxy();
				$newFb = $_POST['fb'];
				$password = $_POST['current_password'];
				if($user->websiteChange($username,$password,$newFb)){
					echo '<script type="text/javascript">alert("Facebook Link Changed Successfully!")</script>';
					$this->view->render("settings/index");
				}
				else{
					 $validation->addError("Password you entered is wrong!");
				}
            }
        }
		$this->view->displayErrors = $validation->displayErrors();
		$this->view->render('settings/fb');
	}


    public function notificationAction() {
        

        exit;
        $resp = ['resp' => 'more comments'];
        $this->jsonResponse($resp);
        
    }
}