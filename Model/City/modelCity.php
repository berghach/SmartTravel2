
<?php 


 
    class City{
        private $id;
        private $name;

        public function __construct($id, $name
        ){
            $this->id = $id;
            $this->name = $name;

        }

        /**
         * Get the value of id
         */ 
        public function getid()
        {
                return $this->id;
        }

        /**
         * Get the value of name
         */ 
        public function getname()
        {
                return $this->name;
        }


    }
?>