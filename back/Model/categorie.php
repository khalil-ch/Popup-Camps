<?php
    class categorie {
        private $id_categorie = null;
        private  $nom_categorie;

        public function __construct($nom_categorie){
            //$this->idAlbum = $id;
            $this->nom_categorie = $nom_categorie;
        }

        public function getIdCategorie () {
            return $this->id_categorie;
        }
        public function getNomCategorie(){
            return $this->nom_categorie;
        }
        public function setNomCategorie ($nom){
            $this->nom_categorie = $nom;
        }
    }