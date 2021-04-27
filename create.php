<?php 
include "config.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
      $lib = $_POST['lib'];
			$prix = $_POST['prix'];
			$qt = $_POST['qt'];
  
		//write sql query

		$sql = "INSERT INTO `produit` (`lib`,`prix`,`qt`) VALUES ('$lib' , '$prix' , '$qt')";
  
		// execute the query

		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "New Product created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();

	}



?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<body>

<h2 style="margin-left:50px;">Adding Product Form</h2>

<form action="" method="POST" class="form-group" style="margin-left:50px;">
  <fieldset>
    <legend>Information sure le produit:</legend>
    <label for="lib">Libelle:</label><br>
    <input type="text" name="lib" id="lib" >
    <br>
    <label for="prix">Prix:</label><br>
    <input type="text" name="prix" id="prix">
    <br>
    <label for="qt">Quantite:</label><br>
    <input type="text" name="qt" id="qt">
    <br>
    <br>
    <input type="file" name="img" class="btn btn-secondary">
    <br>
    <input type="submit" name="submit" value="submit" id="submitCreate" class="btn btn-primary" >
      <a href="view.php" class="btn btn-success">Go back to view</a>
  </fieldset>
</form>
    <script src="test.js">
		
		</script>
</body>
</html>