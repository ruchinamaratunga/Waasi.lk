<?php

class HomeController extends Controller{
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        
    }

    public function indexAction() {                   //queryParam will be passed into the method 
        // $db = DB::getInstance();
        // $contact =$db->findFirst('contacts', [
        //     'conditions' => "lname = ?",
        //     'bind' => ['Parham'],
        //     'order' => "lname",
        //     'limit' => 5
        // ]);
        // dnd($contact);
        // dnd($_SESSION);
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
	
	public function settingsAction(){
        $this->view->render('home/settings');	
	}
}