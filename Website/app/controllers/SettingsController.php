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
				$user = new Users($username);
				if($user->checkPassword($_POST['current_password'])){
					$newPassword = $_POST['newPassword'];
					//$newCheckPassword = $_POST['new_check_password'];
					$id = $user->id;
					$user->passwordChange($id,$username,$newPassword);
					Router::redirect('register/logout');
					//Router::redirect('settings/index');
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
					'max'=>150
				]
            ]);
			

            if($validation->passed()) {

				$username = currentUser()->username;
				$user = new Users($username);
				if($user->checkPassword($_POST['current_password'])){
					$newEmail = $_POST['email'];
					$id = $user->id;
					if($user->emailChange($id,$username,$newEmail)){
						Router::redirect('settings/index');
					}
					else{
						$validation->addError("Database error!");
					}
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
                    'required' => true
				]
            ]);
			

            if($validation->passed()) {

				$username = currentUser()->username;
				$user = new Users($username);
				if($user->checkPassword($_POST['current_password'])){
					$newWeb = $_POST['website'];
					$id = $user->id;
					$p = new Promoter($username);
					if($p->websiteChange($newWeb)){
						Router::redirect('settings/index');
					}
					else{
						$validation->addError("Database error!");
					}
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
                    'required' => true
				]
            ]);
			

            if($validation->passed()) {

				$username = currentUser()->username;
				$user = new Users($username);
				if($user->checkPassword($_POST['current_password'])){
					$newFb = $_POST['fb'];
					$id = $user->id;
					$p = new Promoter($username);
					if($p->fblinkChange($newFb)){
						Router::redirect('settings/index');
					}
					else{
						$validation->addError("Database error!");
					}
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