<?php

require_once('C:/xampp/htdocs/alphapack-Refactor/Website/app/lib/fpdf/fpdf.php');

class PDF extends FPDF{
    function loadTable($header,$weights,$promoList){
    //    dnd($header);
        
        // require('C:/xampp/htdocs/alphapack-Refactor/Website/app/lib/fpdf/fpdf.php');
        $this->SetFont('Arial','B');
        $this->addPage();
        for($i=0;$i<count($header);$i++){
            $this->Cell($weights[$i],10,$header[$i],1,0,'C');
        }
        $this->Ln();
        // foreach($promoList as $promo){
        //     // $promo->getTitle();
        //     // $promo->getCategory();
        //     // $promo->getDescription();
        //     // $promo->getStartDate();
        //     // $promo->getEndDate();
        //     // $promo->getState();
        // }
        $this->Output();
        
    }
}