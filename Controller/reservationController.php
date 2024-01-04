<?php

include("Model\Reservation\reservationDAO.php");

class ReservationController{
    public function index(){
        $reserv=new ReservationDAO();
        $R=$reserv->get_reservations();

        include("");
    }
    public function getReserv_for_op(){
        $reserv=new ReservationDAO();
        $R=$reserv->get_reservations();

        include("View\operator-pannel.php");
    }
}

?>