<?php

class offer
{
    private  $id_offer = null;
    private  $nom_offer = null;
    private  $type_offer = null;
    private  $date_offer = null;
    private  $duree_offer = null;

    public function __construct( $id_offer, $nom_offer,$type_offer, $date_offer,$duree_offer){

        $this->id_offer=$id_offer;
        $this->nom_offer=$nom_offer;
        $this->type_offer=$type_offer;
        $this->date_offer=$date_offer;
        $this->duree_offer=$duree_offer;
    }
    public function __getId() {
            return $this->id_offer ;
        }


    public function __getNom()
    {

            return $this->nom_offer;

    }
    public  function __getType() {

        return $this->type_offer;
    }
    public  function __getDate()
    {

            return $this->date_offer ;

    }
    public   function __getDuree(){

        return $this->duree_offer;
    }

    public    function setId( $id_offer) {
        $this->id_offer=$id_offer;
    }

    public   function setNom( $nom_offer){
        $this->nom_offer=$nom_offer;
    }
    public   function setType( $type_offer) {
        $this->type_offer=$type_offer;
    }
    public   function setDate($date_offer) {
        $this->date_offer=$date_offer;
    }
    public  function setDuree( $duree_offer) {
        $this->duree_offer=$duree_offer;
    }



}

?>