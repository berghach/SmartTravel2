
<?php 


 
    class company{
        private $id;
        private $name;
        private $image;
       



        public function __construct($id, $name, $image){
            $this->id = $id;
            $this->name = $name;
            $this->image = $image;

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
         * Get the value of image
         */ 
        public function getimage()
        {
                return $this->image;
        }

        /**
         * Get the value of NumofPges
         */ 
        
    }
?>