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
    public function get_name_of_the_company($id){
        $query = "SELECT nomEn from entreprise where idEn = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['nomEn'];
        } else {
      
            return "company name Not Found"; 
        }
    }
    public function get_immage_of_the_company($id){
        $query = "SELECT img from Entreprise where idEn = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['img'];
        } else {
      
            return "company image Not Found"; 
        }
    }
    

}