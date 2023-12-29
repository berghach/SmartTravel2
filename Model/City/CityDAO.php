<?php
require_once 'Model\connexion.php';
require_once 'Model\City\modelCity.php';
class CityDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function get_Citys(){
        $query = "SELECT * FROM City";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $CitysData = $stmt->fetchAll();
        $Citys = array();
        foreach ($CitysData as $B) {
            $Citys[] = new City($B["id"],$B["name"]);
        }
        return $Citys;

    }


    function getCityByID($id) {
        $query = "SELECT * FROM City where id = $id";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $B = $stmt->fetch();
     
            $City = new City($B["id"],$B["name"]);
        
        return $City;
          
    }



}



