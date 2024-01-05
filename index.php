<?php 
include "Controller/controllercompany.php" ;

$contoller_companys = new contoller_companys() ; 
$contoller_BUSs = new contoller_BUSs() ; 

$contoller_users = new controller_users() ; 
// $contoller_Routes = new contoller_route() ; 
$contoller_horraires = new contoller_horraires() ; 

include("View\home.php");

if (isset($_GET["action"])) {
//     switch ($action) {
//         case 'showRoute':
//             $contoller_Routes->getRouteController();
//             break;

//         }
// }else {
//     // $contoller_companys->getcompanys() ;
//     $contoller_Routes->getRouteController();
//     // $contoller_BUSs->getBUSs() ;
//     // $contoller_Routes->getRoutes() ;
//     // $contoller_horraires->gethorraires() ;
// }

        }
else {
    // $contoller_companys->getcompanys() ;
    $contoller_horraires->gethorraires();
    // $contoller_BUSs->getBUSs() ;
    // $contoller_Routes->getRoutes() ;
    // $contoller_horraires->gethorraires() ;
}





//    $contoller_companys->afficheform() ;

// $contoller_companys->setcompanys() ;
