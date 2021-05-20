<?php 
/*require_once '../Model/orderRow.php';
require_once '../Controller/orderRowC.php';

$orderRowC = new orderRowC();
$list = $orderRowC->afficherOrderRow();
//var_dump($list);
*/
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
		<th>ID Order Row</th>
		<th>Quantite Order Row</th>
		<th>ID Produit</th>
	</tr>
	</thead>
	<tbody>		
	<br>
	<a href="addOrderRow.php" class="btn btn-primary">Click Here Create A Order Row</a>
	<br>
	<br>
		<?php
			if (count($list) > 0) {
				//output data of each row
				foreach ($list as $row ) {
		?>
					<tr>
					<td><?php echo $row['id_order_row']; ?></td>
					<td><?php echo $row['qt_order_row']; ?></td>
					<td><?php echo $row['id_produit']; ?></td>
					
					<td><a class="btn btn-info" href="modifierOrderRow.php?id=<?php echo $row['id_order_row']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="supprimerOrderRow.php?id=<?php echo $row['id_order_row']; ?>">Delete</a>
					
					</td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>s