<?php

include "model\city\City.php";
include "model\\city\\CityDAO.php";

class CityController {


    function getCities() {
        $cityDAO = new CityDAO();
        $cities = $cityDAO->getCities();
        include "View\\Cities.php" ;
    }


    function getCityById($id) {
        $cityDAO = new CityDAO();
        $city = $cityDAO->getCityById($id);
        include "View\\Cities.php" ;
    }

}





?>