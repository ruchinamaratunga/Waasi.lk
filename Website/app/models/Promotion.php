<?php

class Promotion extends Model {
    
    public function __construct() {
        $table = "promotions";
        parent::__construct($table);
    }


}