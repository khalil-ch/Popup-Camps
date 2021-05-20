<?php

class promo
{
    public   $id_promo  = null ;
    public   $nom_promo  = null;
    public   $type_promo  = null;
    public    $duree_promo = null;

    public   function __construct( int $id_promo, string $nom_promo,string $type_promo,int $duree_promo){

        $this->id_promo=$id_promo;
        $this->nom_promo=$nom_promo;
        $this->type_promo=$type_promo;
        $this->duree_promo=$duree_promo;
    }
    public function __getIdP() {
            return $this->id_promo;
    }

    public function __getNomP()
    {
            return $this->nom_promo ;
    }
    public  function __getTypeP(){
            return $this->type_promo;}


    public   function __getDureeP(){
            return $this->duree_promo;}

    public    function setIdP( ) {
        $this->id_promo;
    }

    public   function setNomP( ){
        $this->nom_promo;
    }
    public   function setTypeP( ) {
        $this->type_promo;
    }

    public  function setDureeP( ) {
        $this->duree_promo;
    }


}
?>