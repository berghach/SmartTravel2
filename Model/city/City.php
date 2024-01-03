<?php


class City {

    private $objectId;
    private $name;
    private $population;

    public function __construct($objectId, $name, $population) {
        $this->objectId = $objectId;
        $this->name = $name;
        $this->population = $population;
    }




    /**
     * Get the value of id
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set the value of id
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the value of population
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set the value of population
     */
    public function setPopulation($population)
    {
        $this->population = $population;
    }


    public function displayInfo() {
        return $this->objectId . " ". $this->name . " " . $this->population . "<br>";
    }
}




?>