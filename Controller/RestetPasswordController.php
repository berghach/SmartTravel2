<?php

require_once 'connection\connexion.php';
require_once "Model\user\userDAO.php" ;
require_once "Model\user\modeluser.php" ;

require_once "mail\sendMail.php";


class RestetPasswordController {

    private $userDAO;

    public function __construct() {
        $this->userDAO = new userDAO();
    }


    public function resetPassword() {



        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
            $newPassword = $_POST["new_password"];
            $confirmPassword = $_POST["confirm_password"];

            if (strlen($newPassword) < 8) {
                echo '<div class="alert alert-danger" role="alert">New password must be at least 8 characters long.</div>';
            } elseif ($newPassword !== $confirmPassword) {
                echo '<div class="alert alert-danger" role="alert">Passwords do not match.</div>';
            } else {
                $id = $_GET["token"];
                $result = $this->userDAO->updatePasswordById($id, $newPassword);
                if($result) {
                    // echo "Password updated successfully!";
                    header("location: index.php");
                }

            }

        }

        $users = $this->userDAO->get_users();

        if(isset($_GET["token"])) {
            $userIsExist = false;
            $id = $_GET["token"];
            foreach($users as $user) {
                if($user->getId() == $id) {
                    $userIsExist = true;
                }
            }

            if(!$userIsExist) {
                include "View\\NOT-FOUND-PAGE.php" ;
                die();
            }
        }

        include "View\\reset-password-view.php" ; 
    }


    public function sendEmailForResetPassword() {

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
            $token = $_POST["id"];
            $to = $_POST["email"];

            $sendEmail = new SendMail();
            $sendEmail->resetPassword($to, $token) ;

        }

    }

}


?>