<?php 
require_once '../Model/categorie.php';
require_once '../Controller/categorieC.php';

$categorieC = new categorieC();
$list = $categorieC->afficherCategorie();


?>

<!DOCTYPE html>
<html>
<head>
	<title>View Page</title>
	 <!-- to make it looking good im using bootstrap -->
	 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Categorie</h2>
<table class="table">
	<thead>
		<tr>
		<th>ID Categorie</th>
		<th>Nom Categorie</th>
		<th>Fonctionalite</th>
	</tr>
	</thead>
	<tbody>		
	<br>
	<a href="ajoutercategorie.php" class="btn btn-primary" style="margin-right:20px">Click Here To Create A Categorie</a>
	
	<br>
	<br>
		<?php
			if (count($list) > 0) {
				//output data of each row
				foreach ($list as $row ) {
		?>
					<tr>
					<td><?php echo $row['id_categorie']; ?></td>
					<td><?php echo $row['nom_categorie']; ?></td>
					
					<td><a target="_blank" class="btn btn-info" href="editcategorie.php?id=<?php echo $row['id_categorie']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="supprimerCategorie.php?id=<?php echo $row['id_categorie']; ?>">Delete</a>
					
					</td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>



