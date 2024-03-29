<?php

include("TokenGenerator.php");


class SendMail{


    public function resetPassword($to, $token) {
        try {
            require_once 'mail.php';

            // Recipient
            $mail->setFrom('smarttravel498@gmail.com', 'SmartTravel Support');
            $mail->addAddress($to);
    
            // Content
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "
                <p>Hello,</p>
                <p>We received a request to reset your password for your SmartTravel account.</p>
                <p><strong>http://localhost/brief-10/index.php?action=resetpassword&token=$token</strong></p>
                <p>If you did not make this request, please ignore this email.</p>
                <p>Thank you,<br>SmartTravel Support Team</p>
            ";
    
            $mail->send();
    
    
            return true;
        } catch (Exception $e) {

    
            return false;
        }
    }
    


}


$sendMail = new sendMail();

$token = TokenGenerator::generateToken(1);
// print_r($token);
$sendMail->resetPassword("badreddynelhirch2@gmail.com", $token);




?>