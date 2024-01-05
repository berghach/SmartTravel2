<?php

include("Model\Points\pointDAO.php");

class pointController{
    public function index(){
        $points = new PointDAO();
        $point = $points->getPoint();
    }
}

?>