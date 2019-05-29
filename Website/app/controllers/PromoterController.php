<?php
include_once(ROOT."/app/lib/fpdf/fpdf.php");

class PromoterController extends Controller {

    public function __construct($controller,$action) {
        parent::__construct($controller,$action);
        $this->view->setLayout('default');
    }

    public function indexAction() {
        $promoter = new Promoter(currentUser()->username);
        $this->view->promoter = $promoter;
        $this->view->render('promoter/index');
    }

    public function addPromoAction() {

        // echo password_hash('password', PASSWORD_DEFAULT);
        $validation = new Validate();
        if($_POST) {
            $validation->check($_POST,[
                'title' =>[
                    'display' => "Title",
                    'required' => true
                ],
                'description' =>[
                    'display' => "Description",
                    'required' => true
                ],
                'start_date' =>[
                    'display' => "Start Date",
                    'required' => true
                ],
                'end_date' =>[
                    'display' => "Expire Date",
                    'required' => true
                ]
            ]);

            $validation->imageFileValidate();

            if($validation->passed()) {
                $promotion = new Promotion();
                $image_path = $promotion->uploadImage();
//                $image_path="testpath";
                if ($image_path) {
//                    dnd($_POST);
                    $promotion->addPromo(array_merge($_POST,['image_path'=>$image_path,'state'=>'Pending','pr_username'=>Promoter::currentLoggedInUser()->username,'ad_username'=>'admin']));
//                    Promoter::currentLoggedInUser()->promoter_name

                    if($validation->passed()){

                        $validation->addError("Promotion added successfully.");
                        $this->view->displayErrors = $validation->displayErrors();
                        $this->view->render('promoter/addpromo');
//                        Router::redirect('promoter/addpromo');
                    }

                }
                else{
                    $validation->addError(["Image upload failed"]);
                }
            }
        }
//        dnd($validation->displayErrors());
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('promoter/addpromo');
    }

    public function editPromoAction($promo_id='-1') {
        if($promo_id=='-1'){
            header("Location: ../");
            die();
        }
        $this->view->displayErrors=null;
        $p = new Promotion();
        $this->view->searchResults = $p->find(['conditions'=>'promo_id = ?','bind'=>[$promo_id]]);

        if(isset($promo_id)&&!isset($_POST["editpromo-submit"])){
//            dnd($_POST);
//            $this->view->displayErrors=null;
//            $p = new Promotion();
//            $this->view->searchResults = $p->find(['conditions'=>'promo_id = ?','bind'=>[$promo_id]]);
//            dnd($this->view->searchResults);
            if(count($this->view->searchResults)){
                $this->view->render('promoter/editpromo');
            }
            else{
                Router::redirect('promoter/mypromo');
            }


        }
        else if(isset($promo_id)&&isset($_POST["editpromo-submit"])) {
//            dnd($_POST);
            $validation = new Validate();
            $validation->check($_POST,[
                'title' =>[
                    'display' => "Title",
                    'required' => true
                ],
                'description' =>[
                    'display' => "Description",
                    'required' => true
                ],
                'start_date' =>[
                    'display' => "Start Date",
                    'required' => true
                ],
                'end_date' =>[
                    'display' => "Expire Date",
                    'required' => true
                ]
            ]);

            $image_path=null;
            if($_FILES['fileToUpload']["error"] == 0){
                $validation->imageFileValidate();
                if($validation->passed()){
                    $promotion = new Promotion();
                    $image_path = $promotion->uploadImage();
                }
                if(empty($image_path)){
                    $validation->addError("Image upload failed.");
                }
            }



            if($validation->passed()) {

                $promotion = new Promotion();

//                dnd($_POST);
                if(empty($image_path)){
//                    dnd($_POST);
                    $promotion->updatePromo(['catagory'=>$_POST['catagory'],'title'=>$_POST['title'],'description'=>$_POST['description'],'start_date'=>$_POST['start_date'],'end_date'=>$_POST['end_date'],'link'=>$_POST['link'],'location'=>$_POST['location'],'state'=>'Pending','pr_username'=>Promoter::currentLoggedInUser()->username,'ad_username'=>'admin'],$promo_id);
                }
                else{
                    $promotion->updatePromo(['catagory'=>$_POST['catagory'],'title'=>$_POST['title'],'description'=>$_POST['description'],'start_date'=>$_POST['start_date'],'end_date'=>$_POST['end_date'],'link'=>$_POST['link'],'location'=>$_POST['location'],'image_path'=>$image_path,'state'=>'Pending','pr_username'=>Promoter::currentLoggedInUser()->username,'ad_username'=>'admin'],$promo_id);
                }

                if($validation->passed()){

                    $this->view->searchResults = $p->find(['conditions'=>'promo_id = ?','bind'=>[$promo_id]]);
                    $validation->addError("Promotion updated successfully.");
                    $this->view->displayErrors = $validation->displayErrors();
                    $this->view->render('promoter/editpromo');
//                        Router::redirect('promoter/addpromo');
                }

            }
            $this->view->searchResults = $p->find(['conditions'=>'promo_id = ?','bind'=>[$promo_id]]);
            $this->view->displayErrors = $validation->displayErrors();
            $this->view->render('promoter/editpromo');
        }
        else{
//            $this->view->render('promoter/addpromo');
            header("Location: ../");
            die();
//            redirect('promoter/index');
        }

    }

    public function deletepromoAction($promo_id='-1'){
        if($promo_id=='-1'){
            Router::redirect('');
        }

        if(isset($_POST["deletepromo-submit"])){
            $p=new Promotion();
            $p->deletePromo($promo_id);
        }
        Router::redirect('promoter/mypromo');
    }

    public function myPromoAction() {
        $p = new Promotion();
//        $this->view->searchResults = $p->find(['conditions'=>'pr_username = ?','bind'=>[currentUser()->username],'order' => "start_date DESC"]);
        $this->view->searchResults = $p->loadMyPromos();
        $this->view->render('promoter/mypromo');
    }

    
    /*******************************************
     * The Promoter can View All the Active Promotions in a table 
     ********************************************/
    public function monthlyreportAction(){
        
        $username = Promoter::currentLoggedInUser()->username;
        $promoter = new Promoter($username);
        $promotion = new Promotion();
        $params = array("promoter"=>"off","catagory"=>"off","promoterDetails"=>"on",'search'=>$username,'deleted'=>0);
        $promotions = $promotion->search($params);
        //Title 	Category 	Description 	Start Date 	End Date 	State
        $promotionDetails = [];
        foreach($promotions as $promo){
            $promoDetail = [];
            $promoDetail["title"] = $promo->{"title"};
            $promoDetail["category"] = $promo->{"title"};
            $promoDetail["description"] = $promo->{"description"};
            $promoDetail["start_date"] = $promo->{"start_date"};
            $promoDetail["end_date"] = $promo->{"end_date"};
            $promoDetail["state"] = $promo->{"state"};

            array_push($promotionDetails,$promoDetail);
        }

        $subscribeCount = $promoter->findSubscribedCustomerCount($username);

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (isset($_POST['generatepdf'])) {
                $this->pdfReport($username,$subscribeCount,$promotionDetails);
            }
        }

        $this->view->currentUser = $promoter;
        $this->view->searchResults = array($username,$subscribeCount,$promotionDetails);
        $this->view->render('promoter/monthlyreport');
    }   

    /*******************************************
     * The Promoter can download the exact report as a pdf
     ********************************************/
    public function pdfReport($username,$subscribeCount,$promotionDetails){
        $weights = array(40,40,35,35,30);
        $header = array('Title','Category','Start Date','End Date','State');

        ob_start();

        $pdf = new FPDF();

        $pdf->AddPage();
        
        $pdf->Ln(15);

        $pdf->Image(ROOT.'\img\logo.png',10,10,20,0,'PNG');
        
        $pdf->SetFont('Arial','B');
        $pdf->Cell(40,7,'Promoter Name: '.$username,0,1);
        $pdf->Cell(40,7,'Number of Subscribers: '.$subscribeCount,0,1);
        $pdf->Ln();

        for($i=0;$i<count($header);$i++){
            $pdf->Cell($weights[$i],10,$header[$i],1,0,'C');
        }

        $pdf->Ln();
        $pdf->SetFont('Arial');
        foreach($promotionDetails as $row){
            $pdf->Cell($weights[0],10,$row['title'],1,0,'C');
            $pdf->Cell($weights[1],10,$row['category'],1,0,'C');
            $pdf->Cell($weights[2],10,$row['start_date'],1,0,'C');
            $pdf->Cell($weights[3],10,$row['end_date'],1,0,'C');
            $pdf->Cell($weights[4],10,$row['state'],1,0,'C');
            $pdf->Ln();
        }

        $pdf->Output();
        ob_end_flush();
    }

}