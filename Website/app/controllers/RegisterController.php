<?php

class RegisterController extends Controller {

    public function __construct($controller, $action){
        parent::__construct($controller,$action);
        $this->load_model('Users');
        $this->view->setLayout('default');

    }

    public function loginAction() {
        
        // echo password_hash('password', PASSWORD_DEFAULT);
        $validation = new Validate();
        if($_POST) {
            // $validation = true;
            // if($validation) {
            //     $user = $this->UsersModel->findByUsername($_POST['username']);
            //     dnd($user);
            // }
            //from valisation
            $validation->check($_POST,[
                'username' =>[
                    'display' => "Username",
                    'required' => true
                ],
                'password' => [
                    'display' => 'password',
                    'required' => true
//                    'min' => 6
                ]
            ]);
            
            if($validation->passed()) {
                $user = new Users($_POST['username']);
                $usertype = $user->user_type;
                $currentUser = UserFactory::createUser($usertype,$user->username);
                if($usertype == 'Customer') {
                    if($user && password_verify(Input::get('password'), $user->password)) {
                        $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true :false;
                        // $customer = new Customer($user->username);
                        $this->view->currentUser = $currentUser;
                        $user->login($remember);
                        Router::redirect('');
                    } else {
                        $validation->addError("There is an error with your uesrname or password");
                    }
                } elseif($usertype == 'Promoter') {
                    if($user && password_verify(Input::get('password'), $user->password)) {
                        $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true :false;
                        // $promoter = new Promoter($user->username);
                        $this->view->currentUser = $currentUser;
                        $user->login($remember);
                        // $user->login($remember);
                        Router::redirect('promoter/index');
                    } else {
                        $validation->addError("There is an error with your uesrname or password");
                    }
                } else {
                    if($user && password_verify(Input::get('password'),$user->password)) {
                        $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
                        // $admin = new Administrator($user->username);
                        $this->view->currentUser = $currentUser;
                        $user->login($remember);
                        Router::redirect('admin/index');
                    } else {
                        $validation->addError("There is an error with your uesrname or password");
                    }
                }
            } 
        }
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/login');
    }

    public function logoutAction() {
        if(currentUser()) {
            currentUser()->logout();
        }
        Router::redirect('');
    }

    public function registerAction() {
        $validation = new Validate();
        $posted_values = ['fname' =>'','lname' => '','username'=>'','email'=>'','email'=>'','password'=>'','confirm'=>''];
        if($_POST) {
            $posted_values = posted_values($_POST);
            $validation->check($_POST, [
                'fname' => [
                    'display' => 'First Name',
                    'required' => true
                ],
                'lname' => [
                    'display' => 'Last Name',
                    'required' => true
                ],
                'username' => [
                    'display'=> 'Username',
                    'required'=> true,
                    'unique' => 'users',
                    'min' => 6,
                    'max' => 150
                ],
                'email' => [
                    'display'=> 'Email',
                    'required'=> true,
                    'unique' => 'users',
                    'max' => 150
                ],
                'password' => [
                    'display' => 'Password',
                    'required' => true,
                    'min' => 6
                ],
                'confirm' => [
                    'display' => 'Confirm Password',
                    'required' =>true,
                    'matches' => 'password'
                ]

            ]);

            if($validation->passed()) {
                $newUser = new Users();
                $newUser->registerNewUser(array_merge($_POST,['user_type'=>'Customer']));
                $newcustomer = new Customer();
                $newcustomer->registerNewCustomer($_POST);
                Router::redirect('register/login');
            }
        }
        $this->view->post = $posted_values;
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/register');
    }

    public function promoterRegistrationAction() {
        $validation = new Validate();
        $posted_values = ['username'=>'','promoter_name'=>'','email'=>'','password'=>'','confirm'=>'','phone_number'=>'', 'website'=>'','fb_link'=>''];
        if($_POST) {

            $posted_values = posted_values($_POST);
            $validation->check($_POST, [
                'username' => [
                    'display'=> 'Username',
                    'required'=> true,
                    'unique' => 'users',
                    'min' => 6,
                    'max' => 150
                ],
                'email' => [
                    'display'=> 'Email',
                    'required'=> true,
                    'unique' => 'users',
                    'max' => 150
                ],
                'password' => [
                    'display' => 'Password',
                    'required' => true,
                    'min' => 6
                ],
                'confirm' => [
                    'display' => 'Confirm Password',
                    'required' =>true,
                    'matches' => 'password'
                ],
                'phone_number' => [
                    'display' => 'Contact Number',
                    'required' => true
                ]

            ]);
            
            // dnd($validation->passed());
            if($validation->passed()) {
                $newuser = new Users();
                $userary = ['fname' => '','lname'=>'','username'=>$_POST['username'],'email'=>$_POST['email'],'acl'=>['Promoter'],'user_type'=>'Promoter'];
                $newuser->registerNewUser($userary);
                $newpromoter = new Promoter();
                $newpromoter->registerNewPromoter($_POST);
                Router::redirect('register/login');
            }
        }
        $this->view->post = $posted_values;
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/promoterRegistration');
    }
	
	public function lostpsswordAction(){
		
	}
}