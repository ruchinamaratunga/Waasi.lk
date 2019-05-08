<?php

class PromoterController extends Controller {

    public function __construct($controller,$action) {
        parent::__construct($controller,$action);
        $this->view->setLayout('default');

    }

    public function indexAction() {
        $this->view->render('promoter/index');
    }

    public function addPromoAction() {
        $this->view->render('promoter/addpromo');
    }

    public function editPromoAction() {
        $this->view->render('promoter/editpromo');
    }

    public function myPromoAction() {
        $this->view->render('promoter/mypromo');
    }
}