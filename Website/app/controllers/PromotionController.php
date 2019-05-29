
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

        $acl_file = file_get_contents(ROOT . DS . 'app' . DS . 'location.json');
        $acl = json_decode($acl_file,true);
        $districtList = array_chunk($acl, ceil(count($acl) / 2));

        // list($array1, $array2) = array_chunk($array, ceil(count($array) / 2));
        // dnd($districtList);
        // dnd($acl);

        // $districtList = array('districts'=>array("Colombo","Kandy","Kurunegala","Gampaha","Matara"),
        //         'towns'=>array(
        //             array("Colombo","Moratuwa","Dehiwala"),
        //             array("Kandy","Moratuwa","Dehiwala"),
        //             array("Kurunegala","Polgahawela","Kuliyapitiya"),
        //             array("Gampaha","Negombo"),
        //             array("Matara","Weligama")   
        //         ));
        $promos = $this->PromotionModel->find(['conditions'=>['end_date > ?','state = ?'],'bind'=>[currentDate(),'Approved'],'order' => "start_date DESC"]);
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