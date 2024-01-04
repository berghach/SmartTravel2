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
    // public function getCityNameById($id) {
    //     $query = "SELECT name FROM City WHERE id = :id";
    //     $stmt = $this->db->prepare($query);
    //     $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    //     $stmt->execute();
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //     return $result['name'];
    // }
    public function getCityNameById($id) {
        $query = "SELECT name FROM City WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        // Check if the query was successful
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['name'];
        } else {
      
            return "City Not Found"; 
        }
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



