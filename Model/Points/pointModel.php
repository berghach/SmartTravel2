<?php

include("connection\connexion.php");

class Points {
    private $idPnts;
    private $nbrPnts;
    public function __construct($idPnts, $nbrPnts){
        $this->idPnts = $idPnts;
        $this->nbrPnts = $nbrPnts;
    }

    public function getIdPnts(){
        return $this->idPnts;
    }
    public function getNbrPnts(){
        return $this->nbrPnts;
    }
}

?>