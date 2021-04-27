<?php
    require_once '../Controller/panierC.php';
    require_once '../Controller/produitC.php';
    $panierC = new panierC();
    $produit = new produitC();
    $rows=$panierC->afficherPanier(1);
      if (isset($_POST['delete'])){
  
         $panierC-> supprimerProduitPanier(1,$_POST['hidden_id']);
         header("location:shopingCart.php");
      }
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<body>

<h2 style="margin-left:50px;">Shopping Cart </h2>

<form action="" method="POST" class="form-group" style="margin-left:50px;">
  <fieldset>
    <legend>Information sure la panier :</legend>
    <table class="table">
    <thead>
      <th>ID Produit</th>
      <th>Libelle </th>
      <th>Quantite </th>
      <th>Montant Total</th>
      <th>Prix</th>
      <th>Image</th>
      <th>Fonctionalite </th>
    </thead>
    <tbody>
    
    

   <?php

 
			foreach($rows as $element){
               $row=$produit->recupererProduit($element['id_produit']);
				?>
               
				<tr>
            <td><?php echo $row['id_produit']; ?></td>
            <td><?php echo $row['lib_produit']; ?></td>
      
            <td><input type="number" name="qt" id="" value="<?php echo $element['qt_produit']; ?>"></td> 

            <td><input type="text" disabled name="montant" id="" value="<?php echo $element['montant_panier']; ?>"></td> 

            <td><?php echo $row['prix_produit']; ?></td>
            <td><img width="50" height="50" src="uploads/<?=$row['img_produit']?>"> </td>
            <td> <form action="" method="post">
                <a class="btn btn-primary" href="afficherProduit.php?id=<?php echo $row['id_produit']; ?>">View Product</a>
                   
                  <input type="submit" value="delete" name="delete" class="btn btn-danger">
                  <input type="hidden" value="<?=$row['id_produit'];?>" name="hidden_id">

              </form>
            </td>
				</tr>
					
				
				
      
        
			<?php 
      
			}

			?>
            
      </table>
        <a href="addCommande.php?commande=true" target="_blank" class="btn btn-primary">Commander</a>

    <input type="submit" name="submit" value="submit" id="submitCreateCategorie" class="btn btn-primary" >
      <a href="afficherProduits.php" class="btn btn-success">Go back to produits</a>
  </fieldset>
</form>
     <!-- <script src="test.js">
		
		</script>  -->
    </tbody>
    </table>
</body>
</html>