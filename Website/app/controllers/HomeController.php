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

    public function promoterpageAction($username) {
        $promoter = new Promoter($username);
        // dnd($promoter);
        if($promoter->id) {
            $customer = new Customer(currentUser()->username);
            $customer->unreadPromo($promoter);
            $this->view->promoter = $promoter;
            $this->view->promotions = $promoter->getPromotions();
            $this->view->subscribe = $promoter->isSubscribe();       
            $this->view->render('home/promoterpage');
        } else {
            Router::redirect('restricted');
        }
        
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



