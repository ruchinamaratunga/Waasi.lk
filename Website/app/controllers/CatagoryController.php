<?php

class CatagoryController extends Controller {

    public function __construct($controller,$action) {
        parent::__construct($controller,$action);
        $this->view->setLayout('default');
    }

    public function clothsAction() {
        $pr = new Promotion();
        $this->view->searchResults = $pr->getPromoByCatagory('Cloths');
        $this->view->render('catagory/cloths');
    }

    public function foodAction() {
        $pr = new Promotion();
        $this->view->searchResults = $pr->getPromoByCatagory('Food');
        $this->view->render('catagory/food');
    }

    public function moviesAction() {
        $pr = new Promotion();
        $this->view->searchResults = $pr->getPromoByCatagory('Movie');
        $this->view->render('catagory/movies');
    }

    public function electronicsAction() {
        $pr = new Promotion();
        $this->view->searchResults = $pr->getPromoByCatagory('Electronic');
        $this->view->render('catagory/electronics');
    }

    public function sportsAction() {
        $pr = new Promotion();
        $this->view->searchResults = $pr->getPromoByCatagory('Sport');
        $this->view->render('catagory/sports');
    }

    public function othersAction() {
        $pr = new Promotion();
        $this->view->searchResults = $pr->getPromoByCatagory('Other');
        $this->view->render('catagory/others');
    }
}