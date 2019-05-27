
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

    /**************************************
     * The index of the promotion page... including Search and districtwise finding
     ***************************************/

    public function indexAction($district = "") {
        $districtList = array('districts'=>array("Colombo","Kandy","Kurunegala","Gampaha","Matara"),
                'towns'=>array(
                    array("Colombo","Moratuwa","Dehiwala"),
                    array("Kandy","Moratuwa","Dehiwala"),
                    array("Kurunegala","Polgahawela","Kuliyapitiya"),
                    array("Gampaha","Negombo"),
                    array("Matara","Weligama")   
                ));
        $promos = $this->PromotionModel->find(['conditions'=>'end_date > ?','bind'=>[currentDate()],'order' => "start_date DESC"]);
        $this->view->searchResults = array($promos,$districtList);
        
        if($_POST) {
            $p = new Promotion();
            $this->view->searchResults[0] = $p->Search($_POST);
            
        }
        elseif($district!=""){
            

            $p = new Promotion();
            $params= array("search"=>$district);
            $this->view->searchResults[0] = $p->Search($params);
            
        }
        
        $this->view->render('promotion/index');
    }

    




}