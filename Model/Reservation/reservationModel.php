<?php

include("connection\connexion.php");

class Reservation {
    private $id;
    private $siege_num;
    private $reserv_date;
    private $client_id;

    public function __construct($id, $siege_num, $reserv_date, $client_id){
        $this->id = $id;
        $this->siege_num = $siege_num;
        $this->reserv_date = $reserv_date;
        $this->client_id = $client_id;
    }

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of siege_num
     */ 
    public function getSiege_num()
    {
        return $this->siege_num;
    }

    /**
     * Get the value of reserv_date
     */ 
    public function getReserv_date()
    {
        return $this->reserv_date;
    }

    /**
     * Get the value of client_id
     */ 
    public function getClient_id()
    {
        return $this->client_id;
    }
}

?>