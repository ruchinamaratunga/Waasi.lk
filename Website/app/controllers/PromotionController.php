
<?php
/**
 * Can access the load_model as $this->PromotionModel
 */
class PromotionController extends Controller {

    public function __construct($controller,$action) {
        parent::__construct($controller,$action);
        $this->load_model('Promotion');
        $this->view->setLayout('default');
    }

    public function indexAction() {
        $posted_value = ['promoter' =>'off','catagory'=>'off','search' =>''];
        $this->view->searchResults = $this->PromotionModel->find(['order' => "start_date DESC"]);
        
        if($_POST) {
            $posted_values = mergeArray($posted_value,posted_values($_POST));
            $this->view->searchResults = $this->PromotionModel->Search($posted_values);
        }
        
        $this->view->render('promotion/index');
    }

    public function addpromoAction() {
        $this->view->render('promotion/addpromo');
    }
}