<?php
require_once 'connection\connexion.php';
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
    public function get_companys_ID($immat) {
        $query = "SELECT fk_idEn FROM autobus WHERE immat = :immat";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':immat', $immat, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['fk_idEn'];
        } else {
            return "Company Not Found"; 
        }
    }

    public function get_capacity_of_Bus($immat){
        $query = "SELECT capacite FROM autobus WHERE immat = :immat";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':immat', $immat, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['capacite'];
        } else {
            return "Company Not Found"; 
        }
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