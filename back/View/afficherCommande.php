<?php
require_once '../Controller/commandeC.php';
require_once '../Controller/commandeItemsC.php';
        $commandeC = new commandeC();
        $commandeItemsC = new commandeItemsC();
            $id_commande = $_GET['id'];
              $listCommande = $commandeC->afficherCommande($_GET['id']);
            $listItems = $commandeItemsC->afficherCommandeItems($_GET['id']);
            $listCommande = $listCommande[0];
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
      <h2 style="text-align:center">Commande info:</h2>
    <table class="table">
        <thead>
            <th>ID Commande</th>
            <th>Date Commande</th>
            <th>Montant Commande</th>
        </thead>
        <tr>
        
            <td><?php echo $listCommande['id_commande']; ?></td>
            <td> <?php echo $listCommande['date_commande'];?> </td>
            <td> <?php echo $listCommande['montant_commande'];?> </td>

        </tr>
    </table>

        <hr>
    <h2 style="text-align:center">Produit info:</h2>
    <table class="table">
        <thead>
            <th>ID Produit</th>
            <th>Lib Produit</th>
            <th>Prix Produit</th>
            <th>Quantite Produit</th>
            <th>Image Produit</th>
        </thead>
        <tbody>
      	<?php
			foreach($listItems as $row){
				?>
				<tr>
					<td><?php echo $row['id_produit']; ?></td>
					<td><?php echo $row['lib_produit']; ?></td>
					<td><?php echo $row['prix_produit']; ?></td>
					<td><?php echo $row['qt_produit']; ?></td>
					<td><img width="50" height="50" src="uploads/<?=$row['img_produit']?>"> </td>

                    <td><a class="btn btn-info" href="updateCommandeItem.php?id=<?php echo $id_commande ?>&id_produit=<?php echo $row['id_produit']; ?>&qt_produit=<?php echo $row['qt_produit'] ?>">Edit</a></td>
					<td><a class="btn btn-danger" href="supprimerCommandeItem.php?idCommande=<?php echo $id_commande ?>&idProduit=<?php echo $row['id_produit']; ?>">Delete Commande</a>
					
					</td>
					<td>
							<a class="btn btn-primary" href="afficherProduit.php?id=<?php echo $row['id_produit']; ?>">View Product</a>
					</td>
                    
					</tr>	

			<?php 
			}
            
			?>
            </tbody>
    </table>
  
</body>
</html>