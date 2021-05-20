<?php
   class commandeItems {
        private $id_commande_item = null;
        private  $id_commande;
        private  $id_produit;
        private  $qt;

        public function __construct($id_commande,$id_produit,$quantite){
            //$this->idAlbum = $id;
            $this->id_commande= $id_commande;
            $this->id_produit = $id_produit;
            $this->qt = $quantite;
        }

        public function getIdCommande () {
            return $this->id_commande;
        }
        public function getQt(){
            return $this->qt;
        }
        public function getIdProduit (){
            return $this->id_produit;
        }

        public function setProduit ($prod){
           $this->id_produit = $prod;
        }
        public function setQt ($qt){
           $this->qt = $qt;
        }
    
    }
    ?>