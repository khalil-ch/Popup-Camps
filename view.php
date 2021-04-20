<?php 
include "config.php";

//write the query to get data from users table

$sql = "SELECT * FROM produit";

//execute the query

$result = $conn->query($sql);


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
		<h2>Produits</h2>
<table class="table">
	<thead>
		<tr>
		<th>ID</th>
		<th>libelle</th>
		<th>Prix</th>
		<th>Quantite</th>
		<th>Fonctionalite</th>
		
	</tr>
	</thead>
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
		?>

					<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['lib']; ?></td>
					<td><?php echo $row['qt']; ?></td>
					<td><?php echo $row['prix']; ?></td>
					<td><a href="create.php" class="btn btn-primary">Create</a>&nbsp;<a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
					
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