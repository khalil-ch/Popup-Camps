<?php

require_once '../Model/categorie.php';
require_once '../Controller/categorieC.php';


// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit']) && isset($_POST['cat'])) {
		// get variables from the form
            $cat = $_POST['cat'];
                		//write sql query
                   $categorie = new categorie($cat);
                   $categorieC = new categorieC();
                   $categorieC->ajouterCategorie($categorie);
        
                     // echo "New Category created successfully.";
             
                  

                  
            }
        

    ?>

<!-- <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<body> -->

<h2 style="margin-left:50px;">Create Category</h2>

<form action="" method="POST" class="form-group" style="margin-left:50px;">
  <fieldset>
    <legend>Information sure la categorie:</legend>
    <label for="cat">nom categorie:</label><br>
    <input type="text" name="cat" id="categorie" required>
  
    <br>
    <br>
    <input type="submit" name="submit" value="submit" id="submitCreateCategorie" class="btn btn-primary" >
          <a href="affichercategorie.php" class="btn btn-success">Go back to view</a>
  </fieldset>
</form>
     <!-- <script src="test.js">
		
		</script>  -->
  <!-- </body>
  </html> -->




    




