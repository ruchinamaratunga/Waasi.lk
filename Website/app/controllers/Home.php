<?php

class Home extends Controller{
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


}