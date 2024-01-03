<?php

require_once 'Model\BUS\modelBUS.php';
class BUSDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function get_BUSs(){
        $query = "SELECT * FROM Autobus";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $BUSsData = $stmt->fetchAll();
        $BUSs = array();
        foreach ($BUSsData as $B) {
            $BUSs[] = new BUS($B["immat"],$B["numbus"],$B["capacite"],$B["fk_idEn"]);
        }
        return $BUSs;

    }

    public function update_BUS($BUS){
        $query = "UPDATE Autobus SET numbus='".$BUS->getname()."', capacite='".$BUS->getCapacite()."' , fk_idEn=".$BUS->getCompany()." where immat=".$BUS->getid()."";
        // echo $query;
        $stmt = $this->db->query($query);
        $stmt -> execute();
    }

    function getBUSByID($id) {
        $query = "SELECT * FROM Autobus where immat = $id";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $B = $stmt->fetch();
     
            $BUS = new BUS($B["immat"],$B["numbus"],$B["capacite"],$B["fk_idEn"]);
        
        return $BUS;
          
    }



}



