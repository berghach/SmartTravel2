<?php



class Route
{
    private $depart_city;
    private $Arrive_city;
    private $dist;
    private $duree;

    private $depcityName;
    private $arvcityName;






    public function __construct($depart_city, $Arrive_city, $dist, $duree)
    {

        $this->depart_city = $depart_city;
        $this->Arrive_city = $Arrive_city;
        $this->dist = $dist;
        $this->duree = $duree;

    }

    public function setdepcityName($depcityName)
    {
            $this->depcityName = $depcityName;
    }
    public function setarvcityName($arvcityName)
    {
            $this->arvcityName = $arvcityName;
    }
    public function getDepart_city()
    {
        return $this->depart_city;
    }

    /**
     * Get the value of Arrive_city
     */
    public function getArrive_city()
    {
        return $this->Arrive_city;
    }

    /**
     * Get the value of duree
     */
    public function getDuree()
    {
        return $this->duree;
    }



    /**
     * Get the value of dist
     */
    public function getDist()
    {
        return $this->dist;
    }

    /**
     * Get the value of cityName
     */ 


    /**
     * Get the value of depcityName
     */ 
    public function getDepcityName()
    {
        return $this->depcityName;
    }

    /**
     * Get the value of arvcityName
     */ 
    public function getArvcityName()
    {
        return $this->arvcityName;
    }
}
?>