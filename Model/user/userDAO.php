<?php 
require_once 'Model\connexion.php';
require_once 'Model\user\modeluser.php';

class userDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function get_users(){
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $usersData = $stmt->fetchAll();
        $users = array();
        foreach ($usersData as $B) {
            $users[] = new user($B["name"],$B["email"],$B["password"],$B["role"],$B["is_active"],$B["date_register"]);
            
        }
        return $users;

    }

    public function ajout_operateur($user) {
        $type = $user->getRole();
        if ($type == "admin") {
            $query = "INSERT INTO users (name, email, password, role, is_active, date_register) VALUES (
                '" . $user->getName() . "' ,
                '" . $user->getEmail() . "',
                '" . $user->getpassword() . "' ,
                '" . $user->getRole() . "' ,
                NULL , NULL 
            )";
        } elseif ($type == 'operateur') {
            $query = "INSERT INTO users (name, email, password, role, is_active, date_register, fk_idEn) VALUES (
                '" . $user->getName() . "' ,
                '" . $user->getEmail() . "',
                '" . $user->getpassword() . "' ,
                '" . $user->getRole() . "' ,
                1, NULL, '" . $user->getFkIdEn() . "'
            )";
        }
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
    
    
    
    
    
    
}
?>