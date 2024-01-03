<?php


include("reservationModel.php");

class ReservationDAO {
    private $db;
    public function __construct() {
    $this->db = Database::getInstance()->getConnection();
    }

    public function get_reservations(){
        $query = "SELECT * FROM T";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $resultData = $stmt->fetchAll();
        $results = array();
        foreach ($resultData as $R) {
            $results[] = new Reservation($R[""],$R[""],$R[""],$R[""]);
        }
        return $results;
    }
    public function get_reservation_by_id($reservation_id){
        $query = "SELECT * FROM T WHERE id=$reservation_id";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $R = $stmt->fetch();
        $results = new Reservation($R[""],$R[""],$R[""],$R[""]);
        return $results;
        
    }
    public function add_reservation($c2,$c3,$c4){
        $query = "INSERT INTO T(C2,C3,C4) VALUE ($c2,$c3,$c4)";
        $stmt = $this->db->query($query);
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