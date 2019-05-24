<?php

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
}