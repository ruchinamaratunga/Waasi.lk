<?php

class PromotionController extends Controller {
    public function __construct($controller,$action) {
        parent::__construct($controller,$action);
        $this->view->setLayout('default');
    }

    public function indexAction() {
        
        $this->view->render('promotion/index');
    }

    public function addpromoAction() {
        $this->view->render('promotion/addpromo');
    }
}