
<?php 


 
    class BUS{
        private $id;
        private $name;
        private $capacite;
        private $company;

       



        public function __construct($id, $name, $capacite, $company){
            $this->id = $id;
            $this->name = $name;
            $this->capacite = $capacite;
            $this->company = $company;

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

        /**
         * Get the value of capacite
         */ 




        /**
         * Get the value of company
         */ 
        public function getCompany()
        {
                return $this->company;
        }

        /**
         * Get the value of capacite
         */ 
        public function getCapacite()
        {
                return $this->capacite;
        }
    }
?>