<?php

class Reservation {
    private $id;
    private $siege_num;
    private $reserv_date;
    private $client_email;
    private $voyage_id;

    public function __construct($id, $siege_num, $reserv_date, $client_email,$voyage_id){
        $this->id = $id;
        $this->siege_num = $siege_num;
        $this->reserv_date = $reserv_date;
        $this->client_email = $client_email;
        $this->voyage_id = $voyage_id;
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
     * Get the value of client_email
     */ 
    public function getClient_email()
    {
        return $this->client_email;
    }

    /**
     * Get the value of voyage_id
     */ 
    public function getVoyage_id()
    {
        return $this->voyage_id;
    }

    /**
     * Set the value of voyage_id
     *
     * @return  self
     */ 
    public function setVoyage_id($voyage_id)
    {
        $this->voyage_id = $voyage_id;

        return $this;
    }
}

?>