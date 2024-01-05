<?php

require_once 'Model\Route\modelRoute.php';
class RouteDAO
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_Routes()
    {
        $query = "SELECT * FROM Route";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $RoutesData = $stmt->fetchAll();
        $Routes = array();
        $cityDAO = new CityDAO();
        foreach ($RoutesData as $B) {
            $vil_depName = $cityDAO->getCityById($B["idVil_dep"]);
            $vil_arvName = $cityDAO->getCityById($B["idVil_arv"]);
            $Routes[] = new Route($B["idVil_dep"], $B["idVil_arv"], $B["dist"], $B["duree"]);
            $Routes[count($Routes) - 1]->setdepcityName($vil_depName);
            $Routes[count($Routes) - 1]->setarvcityName($vil_arvName);
        }
        return $Routes;

    }


    function getRouteByID($id)
    {
        $query = "SELECT * FROM Route where id = $id";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $B = $stmt->fetch();

        $Route = new Route($B["id"], $B["depart_city"], $B["Arrive_city"], $B["duree"]);

        return $Route;

    }
    public function insert_route()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $vil_dep = $_POST["vil_dep"];
            $vil_arv = $_POST["vil_arv"];
            $dist = $_POST["dist"];
            $dure = $_POST["dure"];

            try {
                $query = "INSERT INTO route (idVil_dep, idVil_arv, dist, duree) VALUES (:vil_dep, :vil_arv, :dist, :dure)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':vil_dep', $vil_dep);
                $stmt->bindParam(':vil_arv', $vil_arv);
                $stmt->bindParam(':dist', $dist);
                $stmt->bindParam(':dure', $dure);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
        return false;
    }

    public function getRouteByVilles($vil_dep, $vil_arv)
    {
        $query = "SELECT * FROM route WHERE idVil_dep = :vil_dep and idVil_arv=:vil_arv";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":vil_dep", $vil_dep, PDO::PARAM_STR);
        $stmt->bindParam(":vil_arv", $vil_arv, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $route = new Route($result["idVil_dep"], $result["idVil_arv"], $result["dist"], $result["duree"]);
            $cityDAO = new CityDAO();
            $dep_city = $cityDAO->getCityById($result["idVil_dep"]);
            $arv_city = $cityDAO->getCityById($result["idVil_arv"]);
            $route->setdepcityName($dep_city);
            $route->setarvcityName($arv_city);
            return $route;
        } else {
            return null;
        }
    }
    public function updateRoute()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $vil_dep = $_POST["vil_dep"];
            $vil_arv = $_POST["vil_arv"];
            $dist = $_POST["dist"];
            $dure = $_POST["dure"];
            try {
                $query = "update route set dist=:dist, duree=:dure WHERE idVil_arv=:vil_arv and   idVil_dep=:vil_dep";
                $stmt = $this->db->prepare($query);

                $stmt->bindParam(':vil_dep', $vil_dep);
                $stmt->bindParam(':vil_arv', $vil_arv);
                $stmt->bindParam(':dist', $dist);
                $stmt->bindParam(':dure', $dure);
                $stmt->execute();

                return true;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }
    function deleteRoute($vil_dep,$vil_arv)
    {
        try {
            $query = "delete from route where idVil_dep=:vil_dep and idVil_arv=:vil_arv";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':vil_dep', $vil_dep);
            $stmt->bindParam(':vil_arv', $vil_arv);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}



