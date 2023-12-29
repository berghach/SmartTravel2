<?php
require_once 'Model\connexion.php';
require_once 'Model\horraire\modelhorraire.php';
class horraireDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function get_horraires(){
        $query = "SELECT * FROM horraire";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $horrairesData = $stmt->fetchAll();
        $horraires = array();
        foreach ($horrairesData as $B) {
            $horraires[] = new horraire($B["hr_dep"], $B["hr_arv"],$B["Prix"],$B["nhar"],$B["tri9"]);
        }
        return $horraires;

    }

    public function update_horraire($horraire){
        $query = "UPDATE `horraire` SET `name`='".$horraire->getname()."',`image`='".$horraire->getimage()."' where `id`='".$horraire->getid()."'";
        // echo $query;
        $stmt = $this->db->query($query);
        $stmt -> execute();
    }

    function gethorraireByID($id) {
        $query = "SELECT * FROM horraire where id = $id";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $B = $stmt->fetch();
     
            $horraire = new horraire($B["hr_dep"], $B["hr_arv"],$B["Prix"],$B["nhar"],$B["tri9"]);
        
        return $horraire;
          
    }



}



