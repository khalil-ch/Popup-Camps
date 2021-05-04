<?PHP
	require_once "../Controller/produitC.php";

	$produitC =new produitC();
	$rows=$produitC->afficherProduit();
	
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<title> Les Produits </title>
		<link rel="stylesheet" href="./style/style.css">
    </head>
    <body>
	<div class="container">
	<h2 style="text-align:center">Ajouter Produits</h2>
		
		<table class="table">
			<thead>
			<tr>
				<th>ID</th>
				<th>Libelle</th>
				<th>Stock</th>
				<th>Prix</th>
				<th>Image</th>
				<th>ID Categorie</th>
				<th>Fonctionalite</th>
		
			</tr>
			</thead>
		<tbody>
		
		<a target="_blank" href="ajouterProduit.php" class="btn btn-primary" style="margin-right:20px" target="_blank">Ajouter un produit</a>
		<a target="_blank" href="editcategorie.php" class="btn btn-primary">Ajouter une Categorie</a>
		
		<br>
		<br>
	
			

		<?php
			foreach($rows as $row){
				?>
				<tr>
					<td><?php echo $row['id_produit']; ?></td>
					<td><?php echo $row['lib_produit']; ?></td>
					<td><?php echo $row['qt_produit']; ?></td>
					<td><?php echo $row['prix_produit']; ?></td>
					<td><img width="50" height="50" src="uploads/<?=$row['img_produit']?>"> </td>
						<td><?php echo $row['id_categorie']; ?></td>
					
					
					<td><a  target="_blank" class="btn btn-info" href="editProduct.php?id=<?php echo $row['id_produit']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="supprimerProduit.php?id=<?php echo $row['id_produit']; ?>">Delete</a>
					
					</td>
					
					</tr>	

			<?php 
			}
			?>
		</tbody>
	
					
					
	
		</table>
	</div>
	</body>
</html>


