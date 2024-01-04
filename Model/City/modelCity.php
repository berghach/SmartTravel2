
<?php 


 
    class City{
        private $city_name;

        public function __construct( $city_name
        ){
            $this->city_name = $city_name;

        }


        /**
         * Get the value of city_name
         */ 
        public function getcity_name()
        {
                return $this->city_name;
        }


    }
?>