<?php
include_once("C:/xampp/htdocs/alphapack-Refactor/Website/app/lib/pdf.php");

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

    public function editPromoAction() {
        if(isset($_POST["editpromo-submit"])){
//            dnd($_POST);
            $this->view->render('promoter/editpromo');
        }
        else{
//            $this->view->render('promoter/addpromo');
            header("Location: ../");
            die();
//            redirect('promoter/index');
        }

    }

    public function myPromoAction() {
//        dnd(currentUser()->username);
        // $posted_value = ['promoter' =>'off','catagory'=>'off','search' =>''];
        $p = new Promotion();
//        $this->view->searchResults = $p->find(['conditions'=>'end_date > ?','bind'=>[currentDate()],'order' => "start_date DESC"]);
        $this->view->searchResults = $p->find(['conditions'=>'pr_username = ?','bind'=>[currentUser()->username],'order' => "start_date DESC"]);
        // dnd($_POST);
//        dnd($this->view->searchResults);
//        if($_POST) {
//            // $posted_values = mergeArray($posted_value,posted_values($_POST));
//            $p = new Promotion();
//            $this->view->searchResults = $p->Search($_POST);
//        }
        $this->view->render('promoter/mypromo');
    }

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
                $weights = array(40,40,35,35,30);
                $header = array('Title','Category','Start Date','End Date','State');
                
                ob_start();
                require_once('C:/xampp/htdocs/alphapack-Refactor/Website/app/lib/fpdf/fpdf.php');

                $pdf = new FPDF();
                $pdf->SetFont('Arial','B');
                $pdf->AddPage();
                for($i=0;$i<count($header);$i++){
                    $pdf->Cell($weights[$i],10,$header[$i],1,0,'C');
                }
                $pdf->Ln();
                foreach($promotionDetails as $row){
                    // dnd($promotionDetails);
                    $pdf->Cell($weights[0],10,$row['title'],1,0,'C');
                    $pdf->Cell($weights[1],10,$row['category'],1,0,'C');
                    // $pdf->Cell($weights[2],10,$row['description'],1,0,'C');
                    $pdf->Cell($weights[2],10,$row['start_date'],1,0,'C');
                    $pdf->Cell($weights[3],10,$row['end_date'],1,0,'C');
                    $pdf->Cell($weights[4],10,$row['state'],1,0,'C');
                    $pdf->Ln();
                }

                $pdf->Output();
                ob_end_flush(); 
            }
        }

        $this->view->currentUser = $promoter;
        $this->view->searchResults = array($username,$subscribeCount,$promotionDetails);
        $this->view->render('promoter/monthlyreport');
        // var_dump($_SERVER['REQUEST_METHOD']);
        

            
        

    }   

}