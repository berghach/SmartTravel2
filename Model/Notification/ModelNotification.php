<?php 



    class Notification{
        private $id;
        private $message ;
        private $user_role;
        private $foreingresev ; 



        public function __construct($id,$message,$user_role,$foreingresev){
            $this->id = $id;
            $this->message = $message;
            $this->user_role = $user_role;
            $this->foreingresev = $foreingresev;

    }




        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of message
         */ 
        public function getMessage()
        {
                return $this->message;
        }

        /**
         * Get the value of user_role
         */ 
        public function getUser_role()
        {
                return $this->user_role;
        }


        /**
         * Get the value of foreingresev
         */ 
        public function getForeingresev()
        {
                return $this->foreingresev;
        }
    }