<?php
require_once "Model/route/routeDAO.php";
require_once "Model/City/CityDAO.php";


class contoller_route
{


    function getRouteController()
    {
        $routeDAO = new RouteDAO();
        $routes = $routeDAO->get_Routes();
        include "View/admin/showRoute.php";
    }
    function addRouteController()
    {
        $villeDAO = new CityDAO();
        $villes = $villeDAO->getCities();
        include "View/admin/addRoute.php";
    }

    function addRouteControllerAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $routeDAO = new RouteDAO();
            $inserted = $routeDAO->insert_route();
            if ($inserted) {
                header('Location: index.php?action=showRoute');
                exit();
            } else {
                echo 'Adding error';
            }
        }
    }


    public function updtRouteController()
    {
        if (isset($_GET['vil_dep']) && isset($_GET['vil_arv'])) {
            $vil_dep = $_GET['vil_dep'];
            $vil_arv = $_GET['vil_arv'];
            $villeDAO = new CityDAO();
            $villes = $villeDAO->getCities();
            $routeDAO = new RouteDAO();
            $route = $routeDAO->getRouteByVilles($vil_dep, $vil_arv);
            // $idVilDep=$route->getDepart_city();
            // $idVilARV=$route->getArrive_city();
            include("View/admin/updtRoute.php");
            // var_dump($idVilDep);
            // var_dump($idVilARV);

        }
    }

    public function updtRouteControllerAction()
    {
        try{
            $routeDAO = new RouteDAO();
            $routeDAO->updateRoute();
            header('Location: index.php?action=showRoute');
            exit;
        }
        catch (Exception $e) {
            error_log('Error in updtBusControllerAction:' . $e->getMessage(), 0);
        }

    }

    public function deleteRouteControllerAction()
    {
        $vil_dep = $_GET['vil_dep'];
        $vil_arv = $_GET['vil_arv'];
        $routeDAO = new RouteDAO();
        $routeDAO->deleteRoute($vil_dep,$vil_arv);
        header('Location: index.php?action=showRoute');
        exit;
    }






}
?>