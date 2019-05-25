
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

    public function indexAction($district = "") {
        $districtList = array('districts'=>array("Colombo","Kandy","Kurunegala","Gampaha","Matara"),
                'towns'=>array(
                    array("Colombo","Moratuwa","Dehiwala"),
                    array("Kandy","Moratuwa","Dehiwala"),
                    array("Kurunegala","Moratuwa","Dehiwala"),
                    array("Gampaha","Negombo"),
                    array("Matara","Negombo")   
                ));
        // $posted_value = ['promoter' =>'off','catagory'=>'off','search' =>''];
        $promos = $this->PromotionModel->find(['conditions'=>'end_date > ?','bind'=>[currentDate()],'order' => "start_date DESC"]);
        $this->view->searchResults = array($promos,$districtList);
        // dnd($this->view->searchResults[1]);
        // dnd($district);
        // dnd($_POST['town']);
        if($_POST) {
            // dnd($_POST['town']);
            // $posted_values = mergeArray($posted_value,posted_values($_POST));
            $p = new Promotion();
            // dnd($p->Search($_POST));
            $this->view->searchResults[0] = $p->Search($_POST);
            
        }
        elseif($district!=""){
            // dnd($district);  
            $p = new Promotion();
            $params= array("search"=>$district);
            // dnd($p->Search($params));
            $this->view->searchResults[0] = $p->Search($params);
            // dnd($district);
            
        }
        
        $this->view->render('promotion/index');
    }

    




}