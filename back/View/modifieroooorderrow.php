<?php

require_once '../Model/orderRow.php';
require_once '../Controller/orderRowC.php';


// if the form's submit button is clicked, we need to process the form
/*	if (isset($_POST['submit']) && isset($_POST['qt']) && isset($_GET['id'])) {
		// get variables from the form
            $qt = $_POST['qt'];
                		//write sql query
                   $orderRow = new orderRow($qt,$_GET['id']);
                   $orderRowC = new orderRowC();
                   $categorieC->modifierOrderRow($orderRow);
        
                      echo "New Category created successfully.";
                     // header("location:viewCategorie.php");
                  

                  
            }
        */

    ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<body>

<h2 style="margin-left:50px;">Create Order Row</h2>

<form action="" method="POST" class="form-group" style="margin-left:50px;">
  <fieldset>
    <legend>Modifier Order Row:</legend>
        <label for="cat">Quantite order row:</label><br>
    <input type="number" name="qt" id="">
  
    <br>
    <br>
    <input type="submit" name="submit" value="submit" id="submitCreateCategorie" class="btn btn-primary" >
      <a href="afficherOrderRow.php" class="btn btn-success">Go back to view</a>
  </fieldset>
</form>
     <!-- <script src="test.js">
		
		</script>  -->
</body>
</html>




    




