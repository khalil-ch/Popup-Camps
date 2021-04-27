<?php
    class commande {
        private $id_commande = null;
        private  $date_commande;
        private  $montant_commande;
        private  $id_user;

        public function __construct($date_commande, $montant_commande, $id_user){
            //$this->idAlbum = $id;
            $this->date_commande = $date_commande;
            $this->montant_commande= $montant_commande;
            $this->id_user = $id_user;
        
        }

        public function getDateCommande () {
            return $this->date_commande;
        }
        public function getMontantCommande(){
            return $this->montant_commande;
        }
        public function getIdUser (){
            return $this->id_user;
        }

      

        public function setIdUser($id){
            $this->id_user = $id;
        }

        public function setMontantCommande ($montant){
            $this->montant_commande = $montant;
        }

        
    }