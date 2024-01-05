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
            $horraires[] = new horraire($B["idVoy"], $B["hr_dep"],$B["hr_arv"],$B["fk_idVil_dep"],$B["fk_idVil_arv"],$B["prix"],$B["date_voy"],$B["bus"]);
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

            $horraire = new horraire($B["idVoy"], $B["hr_dep"],$B["hr_arv"],$B["fk_idVil_dep"],$B["fk_idVil_arv"],$B["prix"],$B["date_voy"],$B["bus"]);

        return $horraire;

    }



    public function get_horraires_by_search($departcity, $arrivecity, $datetime) {
        try {
            // Format datetime
            $formattedDatetime = date('Y-m-d', strtotime($datetime));

            // Prepare and execute the SQL query with parameterized statements
            $query = "SELECT * FROM voyage WHERE fk_idVil_dep = :departcity and fk_idVil_arv  = :arrivecity AND date_voy > CURDATE() AND date_voy = :datetime";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':departcity', $departcity, PDO::PARAM_STR); // Assuming $departcity is an integer, adjust accordingly
            $stmt->bindParam(':arrivecity', $arrivecity, PDO::PARAM_STR); // Assuming $arrivecity is an integer, adjust accordingly
            $stmt->bindParam(':datetime', $formattedDatetime, PDO::PARAM_STR); // Assuming $datetime is a string, adjust accordingly
            $stmt->execute();

            // Fetch results
            $horrairesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Process the results
            $horraires = array();
            foreach ($horrairesData as $B) {
                $horraires[] = new horraire($B["idVoy"], $B["hr_dep"],$B["hr_arv"],$B["fk_idVil_dep"],$B["fk_idVil_arv"],$B["prix"],$B["date_voy"],$B["bus"]);
            }

            return $horraires;
        } catch (PDOException $e) {
            // Handle the exception
            echo "Error: " . $e->getMessage();
            return array(); // Return an empty array or handle the error as needed
        }
    }

    public function get_horraires_by_date($datetime) {
        try {
            // Format datetime
            $formattedDatetime = date('Y-m-d', strtotime($datetime));

            // Prepare and execute the SQL query with parameterized statements
            $query = "SELECT * FROM voyage WHERE  date_voy > CURDATE() AND date_voy = :datetime";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':datetime', $formattedDatetime, PDO::PARAM_STR); // Assuming $datetime is a string, adjust accordingly
            $stmt->execute();

            // Fetch results
            $horrairesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Process the results
            $horraires = array();
            foreach ($horrairesData as $B) {
                $horraires[] = new horraire($B["idVoy"], $B["hr_dep"],$B["hr_arv"],$B["fk_idVil_dep"],$B["fk_idVil_arv"],$B["prix"],$B["date_voy"],$B["bus"]);
            }

            return $horraires;
        } catch (PDOException $e) {
            // Handle the exception
            echo "Error: " . $e->getMessage();
            return array(); // Return an empty array or handle the error as needed
        }
    }


}

?>
