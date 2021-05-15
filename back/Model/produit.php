<?php
    class produit {
        private $id_produit = null;
        private  $lib_produit;
        private  $prix_produit;
        private  $qt_produit;
        private  $img_produit;
        private $categorie_produit;

        public function __construct($lib, $prix, $qt,$img,$cat){
            //$this->idAlbum = $id;
            $this->lib_produit = $lib;
            $this->prix_produit= $prix;
            $this->qt_produit = $qt;
            $this->img_produit = $img;
            $this->categorie_produit = $cat;
        }

        public function getIdProduit () {
            return $this->id_produit;
        }
        public function getLib(){
            return $this->lib_produit;
        }
        public function getPrix (){
            return $this->prix_produit ;
        }

        public function getImage (){
            return $this->img_produit ;
        }

        public function getQt (){
            return $this->qt_produit ;
        }

        public function setLib ($lib){
            $this->lib_produit = $lib;
        }

        public function setImage ($image){
            $this->img_produit = $image;
        }

        public function setPrix ($prix){
            $this->prix_produit = $prix;
        }
        public function setQt($qt){
            $this->qt_produit = $qt;
        }
        
         public function setCategorie ($cat){
            $this->categorie_produit = $cat;
        }
        public function getCategorie(){
             return $this->categorie_produit;
        }
        
    }