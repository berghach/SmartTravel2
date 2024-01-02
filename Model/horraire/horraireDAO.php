<?php

require_once 'Model\horraire\modelhorraire.php';
class horraireDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function get_horraires(){
        $query = "SELECT * FROM voyage";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $horrairesData = $stmt->fetchAll();
        $horraires = array();
        foreach ($horrairesData as $B) {
            $horraires[] = new horraire($B["idVoy"], $B["hr_dep"],$B["hr_arv"],$B["fk_idVil_dep"],$B["fk_idVil_arv"],$B["prix"],$B["date_voy"]);
        }
        return $horraires;

    }

    public function update_horraire(horraire $horraire){
        $query = "UPDATE voyage SET hr_dep='".$horraire->gethr_dep()."'  ,hr_arv='".$horraire->gethr_arv()."' ,fk_idVil_dep='".$horraire->getVille_depart()."' ,fk_idVil_arv='".$horraire->getVille_arriv()."' ,prix=".$horraire->getPrix()." ,date_voy='".$horraire->getDate_voy()."' WHERE idVoy=".$horraire->getIdVoy()." ";
        // echo $query;
        $stmt = $this->db->query($query);
        $stmt -> execute();
    }

    function gethorraireByID($id) {
        $query = "SELECT * FROM voyage where idVoy = $id";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $B = $stmt->fetch();
     
            $horraire = new horraire($B["idVoy"], $B["hr_dep"],$B["hr_arv"],$B["fk_idVil_dep"],$B["fk_idVil_arv"],$B["prix"],$B["date_voy"]);
        
        return $horraire;
          
    }



}


