

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<body>



      <form action="" method="POST" class="form-group" style="margin-left:50px;" enctype="multipart/form-data">
        <fieldset>
          <legend>Information sure le produit :</legend>
          <label for="lib">Libelle:</label><br>
          <input type="text" name="lib" id="lib" required>
          <br>
          <label for="prix">Prix:</label><br>
          <input type="number" min="1" name="prix" id="prix" required>
          <br>
          <label for="qt">Quantite:</label><br>
          <input type="number" min="1" name="qt" id="qt" required>
          <br>
          <br>
          <input type="file" name="img" required class="btn btn-secondary">
          <br>
          <label for="categorie">Categorie</label>
           <?php
           require_once '../Controller/categorieC.php';
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
          <input type="submit" name="submit" value="submit" id="submit" class="btn btn-primary">
            <a href="afficherProducts.php" class="btn btn-success">Go back to view</a>
        </fieldset>
      </form>
    
  </body>
</html>

<?php
    require_once '../Controller/produitC.php';
    require_once '../Model/produit.php';
    require_once '../Controller/categorieC.php';
 
 	if (isset($_POST['submit']) && isset($_FILES['img'])) {
	

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
                 
                  $produit = new produit($lib,$prix,$qt,$new_img_name,$idcat);
  
                   $produitC = new produitC();
                  $produitC->ajouterProduit($produit);                
            }
            else{
             echo  "you can't uploade a file with that extension";
              //header("Location:view.php?error=$em");
            }


       }
      else{
      echo "unkownk error has occured while uploading";
      }
    }
  ?>


