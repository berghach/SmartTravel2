
<?php 


 
    class horraire{
        private $hr_dep;
        private $hr_arv;
        private $Prix;
        private $nhar;
        private $tri9;
        private $imagecompany;
        private $citynamedepart;
        private $citynamearrive;
        
        

        public function __construct($hr_dep, $hr_arv,$Prix,$nhar,$tri9
        ){
            $this->hr_dep = $hr_dep;
            $this->hr_arv = $hr_arv;
            $this->Prix = $Prix;
            $this->nhar = $nhar;
            $this->tri9 = $tri9;
        }

        /**
         * Get the value of hr_dep
         */ 
        public function gethr_dep()
        {
                return $this->hr_dep;
        }




        /**
         * Get the value of hr_arv
         */ 
        public function getHr_arv()
        {
                return $this->hr_arv;
        }

        /**
         * Get the value of Prix
         */ 
        public function getPrix()
        {
                return $this->Prix;
        }

        /**
         * Get the value of nhar
         */ 
        public function getNhar()
        {
                return $this->nhar;
        }

        /**
         * Get the value of tri9
         */ 
        public function getTri9()
        {
                return $this->tri9;
        }

        /**
         * Get the value of imagecompany
         */ 
        public function getImagecompany()
        {
                return $this->imagecompany;
        }

        /**
         * Set the value of imagecompany
         *
         * @return  self
         */ 
        public function setImagecompany($imagecompany)
        {
                $this->imagecompany = $imagecompany;

                return $this;
        }

        /**
         * Get the value of citynamedepart
         */ 
        public function getCitynamedepart()
        {
                return $this->citynamedepart;
        }

        /**
         * Set the value of citynamedepart
         *
         * @return  self
         */ 
        public function setCitynamedepart($citynamedepart)
        {
                $this->citynamedepart = $citynamedepart;

                return $this;
        }

        /**
         * Get the value of citynamearrive
         */ 
        public function getCitynamearrive()
        {
                return $this->citynamearrive;
        }

        /**
         * Set the value of citynamearrive
         *
         * @return  self
         */ 
        public function setCitynamearrive($citynamearrive)
        {
                $this->citynamearrive = $citynamearrive;

                return $this;
        }
    }
?>