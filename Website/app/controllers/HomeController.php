<?php

class HomeController extends Controller{
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        
    }

    public function indexAction() {                   //queryParam will be passed into the method 
        if(userType() == "Customer"){
            $customer = new Customer(currentUser()->username);
            $this->view->customer = $customer;
        }
        $this->view->render('home/index');
    }

    public function adminAction() {
        $this->view->render('home/admin');
    }

    public function aboutAction() {
        $this->view->render('home/about');
    }

	
	public function contactusAction(){
        $this->view->render('home/contactus');	
	}
	
//	public function settingsAction(){
//	
//        $validation = new Validate();
//        if($_POST) {
//            $validation->check($_POST,[
//                'current' =>[
//                    'display' => "Current Password",
//                    'required' => true
//                ],
//                'new' =>[
//                    'display' => "New Password",
//                    'required' => true,
//					'min' => 6
//                ],
//                'new-check' =>[
//                    'display' => "New Password",
//                    'required' => true,
//					'matches' => 'new'
//                ]
//            ]);
//			
////							$newPassword = $POST['new_password'];
////				$newCheckPassword = $_POST['new_check_password'];
//
//            if($validation->passed()) {
//
//				$username = currentUser()->username;
//				$user = new Users($username);
//				if($user && password_verify(Input::get('current_password'), $user->password)){
//					$newPassword = $POST['new_password'];
//					//$newCheckPassword = $_POST['new_check_password'];
//					$id = $user->id;
//					$user->passwordChange($id,$username,$newPassword);
//					Router::redirect('register/login');
//					
//				}
//				else{
//					 $validation->addError("There is an error with your current password!");
//				}
//				
////                $promotion = new Promotion();
////                $image_path = $promotion->uploadImage();
//////                $image_path="testpath";
////                if ($image_path) {
//////                    dnd($_POST);
////                    $promotion->addPromo(array_merge($_POST,['image_path'=>$image_path,'state'=>'Pending','pr_username'=>Promoter::currentLoggedInUser()->username,'ad_username'=>'admin']));
//////                    Promoter::currentLoggedInUser()->promoter_name
////
////                    if($validation->passed()){
////
////                        $validation->addError("Promotion added successfully.");
////                        $this->view->displayErrors = $validation->displayErrors();
////                        $this->view->render('promoter/addpromo');
//////                        Router::redirect('promoter/addpromo');
////                    }
////
////                }
////                else{
////                    $validation->addError(["Image upload failed"]);
////                }
//            }
//        }
////        dnd($validation->displayErrors());
//       // $this->view->displayErrors = $validation->displayErrors();
//        //$this->view->render('promoter/addpromo');
//    
//        $this->view->render('home/settings');	
//	}


    public function promoterpageAction($username) {
        $promoter = new Promoter($username);
        $this->view->promoter = $promoter;
        $this->view->promotions = $promoter->getPromotions();
        $this->view->subscribe = $promoter->isSubscribe();       
        $this->view->render('home/promoterpage');
    }

    public function subscribeAction() {
        $promoter = new Promoter($_POST['promoter']);
        $subscribe = $promoter->isSubscribe();
        $customer = new Customer(currentUser()->username);
        
        if($subscribe) {
            $customer->unsubscribe($_POST['promoter']);
            $resp = ['resp' =>'Subscribe'];
        } else {
            $customer->subscribe($_POST['promoter']);
            $resp = ['resp' =>'Unsubscribe'];
        }
        
        $this->jsonResponse($resp);
        exit;
    }


    public function seeCommentAction() {
        $p = new Promoter($_POST['promoter']);
        $comments= $p->showComments();
        $count = ($_POST['count']);
        if($comments){
            for($i=0;$i<min($count,count($comments));$i++){
                echo(notificationHead($comments[$i]->customer,$comments[$i]->comment,$comments[$i]->date));
                // echo('<div class="row">
                //     <div class="col-sm-1">
                //         <div class="thumbnail">
                //             <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                //         </div>
                //     </div>
                //     <div class="col-sm-5">
                //         <div class="panel panel-default">
                //             <div class="panel-heading">
                //                 <strong>'.$comments[$i]->customer.'</strong> <span class="text-muted">date</span>
                //             </div>
                //             <div class="panel-body">
                //                 '.$comments[$i]->comment.'
                //             </div>
                //         </div>
                //     </div>
                // </div>');
            }
        } else {
            echo('<div class="nopromo">
                <div class="text-center">No comments</div>
            </div>');
        }
        exit;

        $resp = ['resp' => 'more comments'];
        $this->jsonResponse($resp);
        
    }

    public function commentAction() {
        $promoter = new Promoter($_POST['promoter']);
        $comment = $_POST['comment'];
        $promoter->recieveComment($comment,currentUser()->username);
        exit;
        $resp = ['success' => true, 'data'=>['id'=>23,'name'=>'Curtis','food'=>'bread']];
        $this->jsonResponse($resp);
    }
}

