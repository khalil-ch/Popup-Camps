<?php
    class event {
        private ?string $idEvent = null;
        private string $nom_E;
        private string $image_E;
        private string $description_E;

        public function __construct($nom_E, $description_E, $image_E){
            $this->nom_E = $nom_E;
            $this->description_E = $description_E;
            $this->image_E = $image_E;
        }

        public function getIdEvent () {
            return $this->idEvent;
        }

        public function getNomEvent (){
            return $this->nom_E ;
        }

        public function getImageEvent (){
            return $this->image_E ;
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

        public function setDescriptionEvent ($description_E){
            $this->description_E = $description_E;
        }
    }
