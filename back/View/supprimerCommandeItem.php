<?php
require_once '../Controller/commandeItemsC.php';


$commandeItem= new commandeItemsC();
$commandeItem->supprimerCommandeItem($_GET['idCommande'],$_GET['idProduit']);
header("Location:afficherCommande.php?id=".$_GET['idCommande']);
echo "deleted sucessfuly";
?>