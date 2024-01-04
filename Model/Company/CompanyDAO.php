<?php

require_once 'Model\Company\modelCompany.php';

class CompanyDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function get_companys(){
        $query = "SELECT * FROM Entreprise";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $companysData = $stmt->fetchAll();
        $companys = array();
        foreach ($companysData as $B) {
            $companys[] = new company($B["idEn"],$B["nomEn"],$B["img"]);
        }
        return $companys;

    }

    public function update_company($company){
        $query = "UPDATE Entreprise SET nomEn='".$company->getname()."',img = '".$company->getimage()."' where idEn='".$company->getid()."'";
        // echo $query;
        $stmt = $this->db->query($query);
        $stmt -> execute();
    }

    function getcompanyByID($id) {
        $query = "SELECT * FROM Entreprise where idEn = $id";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $B = $stmt->fetch();
     
            $company = new company($B["idEn"],$B["nomEn"],$B["img"]);
        
        return $company;
          
    }



}



