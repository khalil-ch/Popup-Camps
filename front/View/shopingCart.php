<?php
    
    require_once '../Controller/panierC.php';
    require_once '../Controller/produitC.php';
 
    $panierC = new panierC();
    $produit = new produitC();
    $rows=$panierC->afficherPanier(1);
      if (isset($_GET['del_id'])){
  
         $panierC-> supprimerProduitPanier(1,$_GET['del_id']);
         header("location:shopingCart.php");
      }

      
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php 
include_once 'header.php';
?>
<h2 style="text-align:center; margin-top:50px; color:#efba6c">Shopping Cart </h2>

<form action="addCommande.php?commande=true" method="POST" class="form-group" style="margin-left:50px; margin: top 50px;">
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
      
            <td><input type="number"  min="1"  name="qt[]" id="" class="quantity" data-id="<?=$row['id_produit'] ?>" value="<?php echo $element['qt_produit']; ?>"></td> 

            <td><input type="text" disabled name="montant" id="" value="<?php echo $element['montant_panier']; ?>"></td> 

            <td><?php echo $row['prix_produit']; ?></td>
            <td><img width="50" height="50" src="../../back/view/uploads/<?=$row['img_produit']?>"> </td>
            <td> 
                <a class="btn btn-primary" href="singleproduct.php?id=<?php echo $row['id_produit']; ?>">View Product</a>
                <a class="btn btn-primary" href="shopingCart.php?del_id=<?php echo $row['id_produit']; ?>">Delete</a>
                   
               
         
            </td>
				</tr>
					
				
				
      
        
			<?php 
      
			}

			?>
     
 
      </table>
   
      <!-- addCommande.php?commande=true -->
        <div>
          <input type="submit" name="commander"  class="btn btn-primary" id="commander" value="commander" style="position:fixed; top:190px; right:400px">

  
      <a href="produits.php" class="btn btn-success" style="position:fixed; top:200px; right:100px">Go back to produits</a>
        </div>
  </fieldset>
</form>
   
    </tbody>
    </table>
</body>
</html>