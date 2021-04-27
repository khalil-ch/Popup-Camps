<?php
    require_once '../Controller/produitC.php';
    require_once '../Model/produit.php';
    require_once '../Controller/categorieC.php';
 // 
 	if (isset($_POST['submit']) && isset($_FILES['img'])) {
		// get variables from the form
   // var_dump($_POST['img']);
    //var_dump($_POST['submit']);

     echo "aaaaaa";
      $lib = $_POST['lib'];
			$prix = $_POST['prix'];
			$qt = $_POST['qt'];
     /* $img = $_FILES['img'];
      echo $lib;
      echo "<br>";
      echo $qt; 
      echo "<br>";
      echo $prix;
      echo "<br>";*/


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
                    $produit = new produit($lib,$prix,$qt,$new_img_name,$idcat);
                   $produitC = new produitC($produit);
                  
                //$sql = "INSERT INTO `produit` (`lib_produit`,`prix_produit`,`qt_produit`,`img_produit`,`id_categorie`) VALUES ('$lib' , '$prix' , '$qt','$new_img_name','$idcat')";
              
                // execute the query

                //$result = $conn->query($sql);

/*                if ($result == TRUE) {
                      echo "New Product created successfully.";
                   //   header("location:afficherProduits.php");
                    }else{
                      echo "Error:";
                    }*/

                  
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
