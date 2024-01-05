<?php

require_once 'Model\Notification\ModelNotification.php';
include'Model\user\userDAO.php';
class NotificationDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function add_notification_for_reservation($message,$idreservation,$reservationid) {
        $sql = "INSERT INTO `notification` (user_role, fk_idRes , msg  )
        VAlUE ( 'admin' , ? , ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($idreservation),array($message));
    }

    public function get_all_notifications_for_admin() {
        $sql = "SELECT * FROM `notification` WHERE `dest_role` = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $DAOuser = new userDAO();
        $resultObj = array();

        foreach ($result as $notification) {
            $resultObj[] = new notification($notification['idNot'], $notification['user_role'],$notification['fk_idRes'],$notification['msg']);
        }
        return $resultObj;
    }

}