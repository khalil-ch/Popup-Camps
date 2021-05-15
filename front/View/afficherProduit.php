<?php
require_once '../Controller/produitC.php';
require_once '../Controller/panierC.php';
    
    $produit_id=$_GET['id'];
    $produitC = new produitC();
   $row = $produitC->recupererProduit($produit_id);
   
    $lib = $row['lib_produit'];
    $qt = $row['qt_produit']; 
    $prix =$row['prix_produit'];
    $img = $row['img_produit'];
    $categorie = $row['id_categorie'];
   if(isset($_POST['submit']) &&  isset($_POST['qt']) ){
 
    
       $panierC = new panierC(); //$id_user,$prix,$idProd,$qt
       $panierC->ajouterPanier(1,$prix,$produit_id,$_POST['qt']);
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

 
	<div class="container">
	<h2>Produits</h2>
     <a href="produits.php" class="btn btn-info">View all Products</a>
		
		<hr>
		<table class="table">
			<thead>
			<tr>
				<th>PRODUIT ID</th>
				<th>Libelle</th>
				<th>Prix</th>
				<th>Image</th>
				<th>Quantite(en stock)</th>
				<th>Fonctionalite</th>
            </tr>
            </thead>
        <tbody>
   
                       
                 <td><?php echo $produit_id ?></td>
            
       
                  <td><?php  echo $lib ?></td>  
                 
                  <td><?php echo $prix?></td>
                    <td><img width="50" height="50" src="../../back/view/uploads/<?=$img?>"> </td>

                 <td>  <form action="" method="post">
                    <input type="number" name="qt" value="<?= $qt ?>">
                </td>
                    <td><input type="submit" class="btn btn-primary" value="add to cart" name="submit">
                    <a href="shopingCart.php" class="btn btn-info" target="_blank">Go to shopping cart</a>
                 </form></td>
        </tr>
                
               
				</tbody>    
    </table>
    
              
                 
    
</body>
</html>