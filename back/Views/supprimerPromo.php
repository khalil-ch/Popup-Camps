<?php
include "../Controller/promo1.php";
include "./style/style.css";

$promo1=new promo1();

if (isset($_POST["id_promo"])){
    $promo1->supprimerPromo($_POST["id_promo"]);
    header('Location:afficherPromo.php');
}

?>