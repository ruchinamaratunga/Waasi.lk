<?php

class AdminController extends Controller {

    public function __construct($controller,$action) {
        parent::__construct($controller,$action);
        $this->view->setLayout('default');

    }

    public function indexAction() {

        $a = new Administrator();
        $this->view->searchResults = $a->getViewPromotion();
        $this->view->render('admin/index');
    }

    public function acceptAction($promo_id) {
        $a = new Administrator();
        $b = $a->acceptPromotion($promo_id);
		if($b){
        	Router::redirect('admin/index');
		}
		else{
			echo '<script type="text/javascript">alert("Email did not sent to the promoter! \nPlease the email manually!")</script>';
		}
    }

    public function rejectAction($promo_id) {
        $a = new Administrator();
        $a->rejectPromotion($promo_id);
        Router::redirect('admin/index');
    }



}