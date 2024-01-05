<?php


include("reservationModel.php");

class ReservationDAO {
    private $db;
    public function __construct() {
    $this->db = Database::getInstance()->getConnection();
    }

    public function get_reservations(){
        $query = "SELECT * FROM reservation";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $resultData = $stmt->fetchAll();
        $results = array();
        foreach ($resultData as $R) {
            $results[] = new Reservation($R["idRes"],$R["num_sieg"],$R["date_res"],$R["fk_email"],$R["fk_idVoy"]);
            //$id, $siege_num, $reserv_date, $client_email,$voyage_id
        }
        return $results;
    }
    public function get_reservation_by_id($reservation_id){
        $query = "SELECT * FROM reservation WHERE idRes=$reservation_id";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $R = $stmt->fetch();
        $results = new Reservation($R["idRes"],$R["num_sieg"],$R["date_res"],$R["fk_email"],$R["fk_idVoy"]);
        return $results;

    }
    public function add_reservation($num_siege,$fk_email,$fk_voy){
        $query = "INSERT INTO T(num_sieg,fk_email,fk_idVoy) VALUE (:num_siege,:fk_email,:fk_idVoy)";
        $stmt = $this->db->query($query);
       
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':num_siege', $num_siege, PDO::PARAM_INT); // Assuming $departcity is an integer, adjust accordingly
            $stmt->bindParam(':fk_email', $fk_email, PDO::PARAM_STR); // Assuming $arrivecity is an integer, adjust accordingly
            $stmt->bindParam(':fk_voy', $fk_voy, PDO::PARAM_INT); 
        $stmt -> execute();
    }
    public function cancel_reservation($c1){
        $query = "DELETE FROM T WHERE id=$c1";
        $stmt = $this->db->query($query);
        $stmt -> execute();
    }
    public function edit_reservation($c1,$c2,$c3,$c4){
        $query = "";
    }

}

?>