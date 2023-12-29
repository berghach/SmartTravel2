<?php 
 include "Model\company\companyDAO.php" ;
 include "Model\BUS\BUSDAO.php" ;
 include "Model\City\CityDAO.php" ;
 include "Model\Route\RouteDAO.php" ;
 include "Model\horraire\horraireDAO.php" ;



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

class contoller_Citys {

    function getCitys()  {
        
   $CityDAO = new CityDAO() ;
   $Citys = $CityDAO-> get_Citys();

   include "View\City.php" ; 


    }

    function getCitysForm()  {
        
   $CityDAO = new CityDAO() ;
   $Citys = $CityDAO-> get_Citys();

 return $Citys ;


    }


    function afficheform()  {
        $id = "2345678901234"  ; 
        $CityDAO = new CityDAO() ;
        $City = $CityDAO->getCityByID($id) ;
  
        include "View\CityForm.php" ; 
    }
 


    function setCitys()  {
       $name = $_POST["name"] ; 
       $capacite = $_POST["capacite"] ; 
       $id = $_POST["id"] ; 
       $company = $_POST["company"] ; 

   $CityDAO = new CityDAO() ;
   $City = new City(  $id  ,  $name) ;


    $CityDAO->update_City($City);

    include "View\CityForm.php"  ; 
       
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

   include "View\horraire.php" ; 


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
   $horraire = new horraire(  $hr_dep, $hr_arv,$Prix,$nhar,$tri9) ;


    $horraireDAO->update_horraire($horraire);

    include "View\horraireForm.php"  ; 
       
    }
}