<?php
	  require_once '../Controller/produitC.php';
	  require_once '../Model/produit.php';
    require_once "../Controller/categorieC.php";

	$produitC = new produitC(); 
	$error = "";
	
    
                //$lib, $prix, $qt,$img,$cat

             if (isset($_POST['update']) && isset($_FILES['img'])) {
		// get variables from the form
             $lib = $_POST['lib'];
              $prix = $_POST['prix'];
              $qt = $_POST['qt'];


      $img_name = $_FILES['img']['name'];
      $img_size = $_FILES['img']['size'];
      $tmp_name = $_FILES['img']['tmp_name'];
      $error = $_FILES['img']['error'];

      if($error === 0){
        $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        
        $allowed_exs = array("jpg","jpeg","png");
            if(in_array($img_ex_lc,$allowed_exs)){

                	$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
			          	$img_upload_path = 'uploads/'.$new_img_name;
			          	move_uploaded_file($tmp_name, $img_upload_path);
               // header("Location:view.php");
                  $idcat = $_POST['categorie'];
                		//write sql query
                   $id=$_GET['id'];
               
              $produit = new produit(
                $lib,
                $prix, 
                $qt,
                $new_img_name,
                $idcat
             
			);
               
            $produitC->modifierProduit($produit, $id);
            //header('refresh:5;url=afficherProduits.php');
        }
        else
            $error = "Missing information";
	}
}

?>
<html>
	<head>
		<title>Modifier Produit</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="./style/style.css">
    </head>
	<body>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		
		<?php
			if (isset($_GET['id'])){
				$produit = $produitC->recupererProduit($_GET['id']);
            }
                
				
		?>
	<div class="container" style="margin:auto;margin-top:20px">
  		<a href="afficherProduits.php" class="btn btn-success">Retour à la liste</a>
    		<h2>Update Product Form</h2>
		<form action="" method="POST" enctype="multipart/form-data" > 
		  <fieldset>
		    <legend>Produit information:</legend>
		    <label for="lib">Libelle:</label><br>
		    <input type="text" name="lib" id="lib" value="">

		    <br>
		   	<label for="prix">Prix:</label><br>
		    <input type="text" name="prix" id="prix" value="">
		    <br>
		    <label for="qt">Quantite:</label><br>
		    <input type="text" name="qt" id="qt" value="">
            <br>
            <br>
            <input type="file" name="img" >
		    <br>
            <br>
            <?php
              $cat = new categorieC();
              $rows = $cat->afficherCategorie();
             ?>
        <select name="categorie" id="" class="">
     <?php
            
      foreach($rows as $row)
        {
        $nom = $row['nom_categorie'];
        $value = $row['id_categorie'];
       
       echo "<option value='$value'> $nom </option>";
      } 
      ?>
    </select>
            
            <br>
            <br>
		    <input class="btn btn-primary" type="submit" value="Update" name="update" id="test" class="btn btn-primary" style="margin-top:20px;">
			   <a href="produit.php" class="btn btn-info" class="btn btn-success" style="margin-top:20px;">Go back to view</a>
		  </fieldset>
		</form>
		<?php
		//}
		?>
  </div>
         <script src="controleSaisieAddProduit.js"></script> 
	</body>
</html>