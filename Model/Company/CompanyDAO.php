<?php
require_once 'Model\connexion.php';
require_once 'Model\company\modelcompany.php';
class CompanyDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function get_companys(){
        $query = "SELECT * FROM company";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $companysData = $stmt->fetchAll();
        $companys = array();
        foreach ($companysData as $B) {
            $companys[] = new company($B["id"],$B["name"],$B["image"]);
        }
        return $companys;

    }

    public function update_company($company){
        $query = "UPDATE `company` SET `name`='".$company->getname()."',`image`='".$company->getimage()."' where `id`='".$company->getid()."'";
        // echo $query;
        $stmt = $this->db->query($query);
        $stmt -> execute();
    }

    function getcompanyByID($id) {
        $query = "SELECT * FROM company where id = $id";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $B = $stmt->fetch();
     
            $company = new company($B["id"],$B["name"],$B["image"]);
        
        return $company;
          
    }



}



