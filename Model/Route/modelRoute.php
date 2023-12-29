
<?php 


 
    class Route{
        private $id;
        private $depart_city;
        private $Arrive_city;
        private $duree;
        private $periode;

        

       



        public function __construct($id, $depart_city,$Arrive_city,$duree,$periode
        ){
            $this->id = $id;
            $this->depart_city = $depart_city;
            $this->Arrive_city = $Arrive_city;
            $this->duree = $duree;
            $this->periode = $periode;
        }

            /**
             * Get the value of id
             */ 
            public function getid()
            {
                    return $this->id;
            }

            /**
             * Get the value of depart_city
             */ 
            public function getDepart_city()
            {
                        return $this->depart_city;
            }

            /**
             * Get the value of Arrive_city
             */ 
            public function getArrive_city()
            {
                        return $this->Arrive_city;
            }

            /**
             * Get the value of duree
             */ 
            public function getDuree()
            {
                        return $this->duree;
            }

            /**
             * Get the value of periode
             */ 
            public function getPeriode()
            {
                        return $this->periode;
            }
    }
?>