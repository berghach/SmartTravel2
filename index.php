<?php 
include "Controller/controllercompany.php" ;
include "Controller\controllerRoute.php" ;
$contoller_companys = new contoller_companys() ; 
$contoller_BUSs = new contoller_BUSs() ; 

$contoller_users = new controller_users() ; 
$contoller_Routes = new contoller_route() ; 
$contoller_horraires = new contoller_horraires() ; 
$controler_city = new contoller_Citys();
$contoller_searshes = new Controller_searsh();
// include("View\home.php");
session_start();
if (isset($_GET["action"])) {
    $action = $_GET["action"];

    if ($action === "find") {
        // $contoller_horraires->gethorraires($depart,$arrive) ;
        $contoller_searshes->searsh() ;
    }
    if ($action === "reserve") {
        // $contoller_horraires->gethorraires($depart,$arrive) ;
        $contoller_searshes->searsh() ;
    }

    // Add condition to display travels
    if ($action === "travels") {
        $controller_Travels->getTravels();
    }
} else {
    if(!empty($_SESSION["depart"]) && !empty($_SESSION["arrive"])){
        $depart = $_SESSION["depart"];
        $arrive = $_SESSION["arrive"];
    }else{

    }

    $depart = '';
    $arrive = '';
    $contoller_horraires->gethorraires() ;


}

if (isset($_GET["action"])) {
    switch ($action) {
        case 'showRoute':
            $contoller_Routes->getRouteController();
            break;

        }
}else {
//     // $contoller_companys->getcompanys() ;
//     $contoller_Routes->getRouteController();
//     // $contoller_BUSs->getBUSs() ;
//     // $contoller_Routes->getRoutes() ;

// include 'View/rooms.php';
    // $contoller_horraires->gethorraires() ;
}






//    $contoller_companys->afficheform() ;

// $contoller_companys->setcompanys() ;