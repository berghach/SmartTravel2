<?php

include("pointModel.php");

class PointDAO {
    private $db;
    public function __construct() {
    $this->db = Database::getInstance()->getConnection();
    }
    public function getPoint() {
        $query = "SELECT * FROM points";
        $stmt = $this->db->query($query);
        $result = $stmt->fetchAll();
        return $result;
    }


    public function incrementPoint($id) {
        $query = "UPDATE points SET nbrPnts = nbrPnts + 1 WHERE dPnts = '$id'";
        $this->db->exec($query);
    }

    

    


}   
?>