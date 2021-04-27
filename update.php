<?php 
include "config.php";

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {

			$lib = $_POST['lib'];
			$prix = $_POST['prix'];
			$qt = $_POST['qt'];
			$user_id = $_POST['id'];
		// write the update query
		$sql = "UPDATE `produit` SET `lib`='$lib',`prix`='$prix',`qt`='$qt' WHERE `id`='$user_id'";

		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "Product updated successfully.";
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `produit` WHERE `id`='$user_id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$lib = $row['lib'];
			$prix = $row['prix'];
			$qt = $row['qt'];
			$id = $row['id'];
		}

	?>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	</head>
		<h2>Update Product Form</h2>
		<form action="" method="post">
		  <fieldset>
		    <legend>Produit information:</legend>
		    <label for="lib">Libelle:</label><br>
		    <input type="text" name="lib" id="lib" value="<?php echo $lib; ?>">
		    <input type="hidden" name="id" value="<?php echo $id; ?>">
		    <br>
		   	<label for="prix">Prix:</label><br>
		    <input type="text" name="prix" id="prix" value="<?php echo $prix; ?>">
		    <br>
		    <label for="qt">Quantite:</label><br>
		    <input type="text" name="qt" id="qt" value="<?php echo $qt; ?>">
		    <br>
		    <input type="submit" value="Update" name="update" id="update" class="btn btn-primary" style="margin-top:20px;">
			   <a href="view.php" class="btn btn-success" style="margin-top:20px;">Go back to view</a>
		  </fieldset>
		</form>
		<script src="test2.js">
		
		</script>
		</body>
		</html>




	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: view.php');
	}

}
?>