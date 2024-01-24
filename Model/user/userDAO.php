<?php 

require_once 'Model\user\modeluser.php';

class userDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function get_users() {
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $usersData = $stmt->fetchAll();
        $users = [];
    
        foreach ($usersData as $user) {
            $users[] = new user(
                $user["id"],
                $user["name"],
                $user["email"],
                $user["password"],
                $user["role"],
                $user["is_active"],
                $user["date_register"]
            );
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
    
    
    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$userData) {
            // User not found
            return null;
        }

        return new user(
            $userData["id"],
            $userData["name"],
            $userData["email"],
            $userData["password"],
            $userData["role"],
            $userData["is_active"],
            $userData["date_register"]
        );
    }


    public function updatePasswordById($id, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $query = "UPDATE users SET password = :password WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


}

?>