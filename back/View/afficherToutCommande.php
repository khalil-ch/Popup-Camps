<?php
require_once '../Controller/commandeC.php';
require_once '../Controller/commandeItemsC.php';
        $commandeC = new commandeC();
              $listCommande = $commandeC->afficherToutCommande(1); // 1 = session id
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title></title>
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <h2 stlye="text-align:center">Gestion Des Commandes</h2>
                	   <a href="excel.php" class="btn btn-primary" stlye="margin:10px">Click here to download this data</a>
    <table class="table">
         
        <thead>
            <th>ID Commande</th>
            <th>Date Commande</th>
            <th>Montant Commande</th>
    
            <th>Supprimer Cette Commande</th>
        </thead>
        <?php
            foreach($listCommande as $commande)
            {

          
        ?>
         <tbody>
        <tr>
           
            <td><?php echo $commande['id_commande']; ?></td>
            <td> <?php echo $commande['date_commande'];?> </td>
            <td> <?php echo $commande['montant_commande'];?> </td>
                <td><a class="btn btn-info" target="_blank" href="afficherCommande.php?id=<?=$commande['id_commande'];?>">Afficher cette commande</a></td>
                <td><a class="btn btn-danger" href="supprimerCommande.php?id=<?=$commande['id_commande'];?>">Supprimer Commande </a> </td>
        </tr>
        <?php

          }
          ?>
         </tbody>
    </table>

        <hr>

    
  
</body>
</html>
