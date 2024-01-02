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
}   
?>