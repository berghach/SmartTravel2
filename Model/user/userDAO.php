<?php 

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
            $users[] = new user($B["id"],$B["name"],$B["email"],$B["password"],$B["role"],$B["is_active"],$B["date_register"]);
            
        }
        return $users;

    }

    public function ajout_operateur($user) {
        $type = $user->getRole();
        if ($type == "admin") {

            $query = "INSERT INTO users (name, email, password, role) VALUES (
                '" . $user->getName() . "' ,
                '" . $user->getEmail() . "',
                '" . $user->getpassword() . "' ,
                '" . $user->getRole() . "' 
                
            )";
        } elseif ($type == 'operateur') {
            $query = "INSERT INTO users (name, email, password, role, is_active, date_register, fk_idEn) VALUES (
                '" . $user->getName() . "' ,
                '" . $user->getEmail() . "',
                '" . $user->getpassword() . "' ,
                '" . $user->getRole() . "' ,
                1, NULL, '" . $user->getFkIdEn() . "'
            )";
        } elseif ($type == 'user'){
            $query = "INSERT INTO users (name, email, password, role, is_active, date_register, fk_idEn) VALUES (
                '" . $user->getName() . "' ,
                '" . $user->getEmail() . "',
                '" . $user->getpassword() . "' ,
                '" . $user->getRole() . "' ,
                1, '" . $user->getDate_register() . "',  NULL 
            )";

        } elseif ($type == 'visitor'){
            $query = "INSERT INTO users (name, email, password, role, is_active, date_register, fk_idEn) VALUES (
                '" . $user->getName() . "' ,
                '" . $user->getEmail() . "',
                NULL ,
                '" . $user->getRole() . "' ,
                NULL, NULL,  NULL 
            )";
            
        }
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
    
    
    
    
    
    
}
?>