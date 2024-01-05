<?php 
require_once 'connection\connexion.php';
 include "Model\Company\CompanyDAO.php" ;
 include "Model\BUS\BUSDAO.php" ;
 include "Model\Points\pointDAO.php";
 include "Model\Route\RouteDAO.php" ;
 include "Model\horraire\horraireDAO.php" ;
 include "Model\user\userDAO.php" ;
 include "Model/Reservation/reservationDAO.php";
include "Model/CityAPI/CityDAO.php";



class controller_users{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }
    function getusers()  {

        $userDAO = new userDAO() ;
        $users = $userDAO-> get_users();

        include "View\operateur_add.php" ; 
        include "View\user.php" ; 



        }
}
class contoller_companys {

    function getcompanys()  {

   $companyDAO = new CompanyDAO() ;
   $companys = $companyDAO-> get_companys();

   include "View\company.php" ; 


    }

    function getcompanysForm()  {

   $companyDAO = new CompanyDAO() ;
   $companys = $companyDAO-> get_companys();

 return $companys ;


    }


    function afficheform()  {
        $id = "2345678901234"  ; 
        $companyDAO = new CompanyDAO() ;
        $company = $companyDAO->getcompanyByID($id) ;

        include "View\companyForm.php" ; 
    }



    function setcompanys()  {
       $name = $_POST["name"] ; 
       $image = $_POST["image"] ; 
       $id = $_POST["id"] ; 

   $companyDAO = new CompanyDAO() ;
   $company = new company(  $id  ,  $name , $image) ;


    $companyDAO->update_company($company);

    include "View\companyForm.php"  ; 

    }
}

class contoller_BUSs {

    function getBUSs()  {

   $BUSDAO = new BUSDAO() ;
   $BUSs = $BUSDAO-> get_BUSs();

   include "View\BUS.php" ; 


    }

    function getBUSsForm()  {

   $BUSDAO = new BUSDAO() ;
   $BUSs = $BUSDAO-> get_BUSs();

 return $BUSs ;


    }


    function afficheform()  {
        $id = "2345678901234"  ; 
        $BUSDAO = new BUSDAO() ;
        $BUS = $BUSDAO->getBUSByID($id) ;

        include "View\BUSForm.php" ; 
    }



    function setBUSs()  {
       $name = $_POST["name"] ; 
       $capacite = $_POST["capacite"] ; 
       $id = $_POST["id"] ; 
       $company = $_POST["company"] ; 

   $BUSDAO = new BUSDAO() ;
   $BUS = new BUS(  $id  ,  $name , $capacite , $company) ;


    $BUSDAO->update_BUS($BUS);

    include "View\BUSForm.php"  ; 

    }
}


class contoller_Routes {

    function getRoutes()  {

   $RouteDAO = new RouteDAO() ;
   $Routes = $RouteDAO-> get_Routes();

   include "View\Route.php" ; 


    }

    function getRoutesForm()  {

   $RouteDAO = new RouteDAO() ;
   $Routes = $RouteDAO-> get_Routes();

 return $Routes ;


    }


    function afficheform()  {
        $id = "2345678901234"  ; 
        $RouteDAO = new RouteDAO() ;
        $Route = $RouteDAO->getRouteByID($id) ;

        include "View\RouteForm.php" ; 
    }



    function setRoutes()  {
       $depart_city = $_POST["depart_city"] ; 
       $Arrive_city = $_POST["Arrive_city"] ; 
       $id = $_POST["id"] ; 
       $duree = $_POST["duree"] ; 
       $periode = $_POST["periode"] ; 

   $RouteDAO = new RouteDAO() ;
   $Route = new Route(  $id, $depart_city,$Arrive_city,$duree,$periode) ;


    $RouteDAO->update_Route($Route);

    include "View\RouteForm.php"  ; 

    }
}

class contoller_horraires {

    function gethorraires()  {

   $horraireDAO = new horraireDAO() ;
   $horraires = $horraireDAO-> get_horraires();
 
   $BUSDAO = new BUSDAO();
   $companyDAO = new CompanyDAO();
    $cityDAO = new CityDAO();
    foreach ($horraires as $horraire){
        $horraire->setNameofthecompany($companyDAO->get_immage_of_the_company($BUSDAO->get_companys_ID($horraire->getBus())));
        $horraire->setImageofthecompany($companyDAO->get_immage_of_the_company($BUSDAO->get_companys_ID($horraire->getBus())));
        // var_dump($horraire->setImageofthecompany($companyDAO->get_immage_of_the_company($BUSDAO->get_companys_ID($horraire->getBus()))));
       }
       
   $Cities = $cityDAO->getCities();
   include "View/rooms.php" ; 


    }


    function gethorrairesForm()  {

   $horraireDAO = new horraireDAO() ;
   $horraires = $horraireDAO-> get_horraires();

 return $horraires ;


    }


    function afficheform()  {
        $id = "2345678901234"  ; 
        $horraireDAO = new horraireDAO() ;
        $horraire = $horraireDAO->gethorraireByID($id) ;

        include "View\horraireForm.php" ; 
    }



    function sethorraires()  {
       $hr_dep = $_POST["hr_dep"] ; 
       $hr_arv = $_POST["hr_arv"] ; 
       $Prix = $_POST["Prix"] ; 
       $nhar = $_POST["nhar"] ; 
       $tri9 = $_POST["tri9"] ; 

   $horraireDAO = new horraireDAO() ;
   $horraire = new horraire($hr_dep, $hr_arv,$Prix,$nhar,$tri9) ;


    $horraireDAO->update_horraire($horraire);

    include "View\horraireForm.php"  ; 

    }
}

class contoller_Citys {

    function getCitys()  {

   $CityDAO = new CityDAO() ;
   $Cities = $CityDAO-> getCities();

   include "View/rooms.php" ; 


    }

    function getCitysForm()  {

   $CityDAO = new CityDAO() ;
   $Citys = $CityDAO-> getCities();

 return $Citys ;


    }


    function afficheform()  {
        $id = "2345678901234"  ; 
        $CityDAO = new CityDAO() ;
        $City = $CityDAO->getCityByID($id) ;

        include "View\CityForm.php" ; 
    }

}

class Notification {

    function getnotificationforadmin(){
        $NotifDAO = new NotificationDAO();
        $Notifs = $NotifDAO->add_notification_for_admins();
    }
}
class Controller_searsh {
    function searsh(){

        $CityDAO = new CityDAO();
        $BUSDAO = new BUSDAO();
        $companyDAO = new CompanyDAO();

        if($_SERVER["methode_request"] = "post"){
            $searshvar = new horraireDAO();
            if(isset($_POST["Depart_City"]) && isset($_POST["Arrive_City"]))
            $depart = $_POST["Depart_City"];
            $arrive = $_POST["Arrive_City"];
            $datetime = $_POST["datetime"];


            if($depart != $arrive){
            $_SESSION["depart"] = $depart;
            $_SESSION["arrive"] = $arrive;

            $horraires = $searshvar->get_horraires_by_search($depart, $arrive,$datetime);
            }else if(!empty($datetime)){
                var_dump($datetime);
                $horraires = $searshvar->get_horraires_by_date($datetime);
            }else{
                $horraires = $searshvar->get_horraires();
            }

        }


        foreach ($horraires as $horraire) {
            $horraire->setNameofthecompany($companyDAO->get_immage_of_the_company($BUSDAO->get_companys_ID($horraire->getBus())));
    $horraire->setImageofthecompany($companyDAO->get_immage_of_the_company($BUSDAO->get_companys_ID($horraire->getBus())));

        }
        $Cities = $CityDAO->getCities();

        include "View/rooms.php";

    }
}

class Controller_reservation{
    function add_reservation_controller($idofvoyage){
        $reservationDAO = new ReservationDAO();



    }
}