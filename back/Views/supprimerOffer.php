<?php
include "../Controller/offer1.php";
include "./style/style.css";

$offer1=new offer1();

if (isset($_POST["id_offer"])){
    $offer1->supprimerOffer($_POST["id_offer"]);
    header('Location:afficherOffer.php');
}

?>