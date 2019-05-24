
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
        // $posted_value = ['promoter' =>'off','catagory'=>'off','search' =>''];
        $this->view->searchResults = $this->PromotionModel->find(['conditions'=>'end_date > ?','bind'=>[currentDate()],'order' => "start_date DESC"]);
        // dnd($_POST);
        if($_POST) {
            // $posted_values = mergeArray($posted_value,posted_values($_POST));
            $p = new Promotion();
            $this->view->searchResults = $p->Search($_POST);
        }
        
        $this->view->render('promotion/index');
    }

    public function addpromoAction() {
        $this->view->render('promotion/addpromo');
    }
}