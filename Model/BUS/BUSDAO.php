<?php
require_once 'Model\connexion.php';
require_once 'Model\BUS\modelBUS.php';
class BUSDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function get_BUSs(){
        $query = "SELECT * FROM BUS";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $BUSsData = $stmt->fetchAll();
        $BUSs = array();
        foreach ($BUSsData as $B) {
            $BUSs[] = new BUS($B["id"],$B["name"],$B["capacite"],$B["Company"]);
        }
        return $BUSs;

    }

    public function update_BUS($BUS){
        $query = "UPDATE `BUS` SET `name`='".$BUS->getname()."',`image`='".$BUS->getimage()."' where `id`='".$BUS->getid()."'";
        // echo $query;
        $stmt = $this->db->query($query);
        $stmt -> execute();
    }

    function getBUSByID($id) {
        $query = "SELECT * FROM BUS where id = $id";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $B = $stmt->fetch();
     
            $BUS = new BUS($B["id"],$B["name"],$B["capacite"],$B["Company"]);
        
        return $BUS;
          
    }



}



