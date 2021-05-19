<?php
    class event {
        private  $idEvent= null;
        private  $nom_E;
        private  $image_E;
        private  $date_E;
        private  $description_E;

        public function __construct($nom_E, $image_E,$date_E, $description_E){
            $this->nom_E = $nom_E;
            $this->image_E = $image_E;
            $this->date_E = $date_E;
            $this->description_E= $description_E;
        }

        public function getIdEvent () {
            return $this->idEvent;
        }

        public function getNomEvent(){
            return $this->nom_E;
        }

        public function getImageEvent (){
                return $this->image_E ;
        }

        public function getDateEvent (){
            return $this->date_E ;
        }

        public function getDescriptionEvent (){
            return $this->description_E ;
        }

        public function setNomEvent ($nom_E){
            $this->nom_E = $nom_E;
        }

        public function setImageEvent ($image_E){
            $this->image_E = $image_E;
        }

        public function setDateEvent($date_E){
            $this->date_E = $date_E;
        }

        public function setDescriptionEvent ($description_E){
            $this->description_E = $description_E;
        }
       
    }