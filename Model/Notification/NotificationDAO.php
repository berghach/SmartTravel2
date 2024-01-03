<?php

require_once 'Model\Notification\ModelNotification.php';
class NotificationDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function add_notification_for_admins($message) {
        $sql = "INSERT INTO `notification` (fk_idRes, fk_idRes , msg , )
        SELECT ?, email  FROM `users`
        WHERE users.state = 1 AND users.role = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($message));
    }
    public function display_notification_for_admins() {
        $sql = "SELECT msg FROM `notification` WHERE user.role = 1";
        
        
    }
    public function display_notification_for_users(){


    }
        
}
