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
        $this->view->render('promoter/editpromo');
    }

    public function myPromoAction() {
        $this->view->render('promoter/mypromo');
    }
}