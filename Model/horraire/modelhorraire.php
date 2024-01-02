
<?php 


 
    class horraire{
        private $idVoy;
        private $hr_dep;
        private $hr_arv;
        private $ville_depart;
        private $ville_arriv;
        private $prix;
        private $date_voy;
        public function __construct($idVoy,$hr_dep,$hr_arv,$ville_depart,$ville_arriv,$prix,$date_voy){
                $this->idVoy = $idVoy;
                $this->hr_dep = $hr_dep;
                $this->hr_arv = $hr_arv;
                $this->ville_depart = $ville_depart;
                $this->ville_arriv = $ville_arriv;
                $this->prix = $prix;
                $this->date_voy = $date_voy;
        }
        public function getIdVoy(){
                return $this->idVoy;
        }
        public function gethr_dep(){
                return $this->hr_dep;
        }
        public function gethr_arv(){
                return $this->hr_arv;
        }
        public function getVille_depart(){
                return $this->ville_depart;
        }
        public function getVille_arriv(){
                return $this->ville_arriv;
        }
        public function getPrix(){
                return $this->prix;
        }
        public function getDate_voy(){
                return $this->date_voy;
        }    
    }
?>