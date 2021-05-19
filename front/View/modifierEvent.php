<<?php
	  require_once '../Controller/eventC.php';
	  require_once '../Model/event.php';
	$eventC = new eventC(); 
	$error = "";
	
    
                //$lib, $prix, $qt,$img,$cat

             if (isset($_POST['update']) && isset($_FILES['image_E'])) {
		// get variables from the form
            $nom_E = $_POST['nom_E'];
            $date_E = $_POST['date_E'];
            $description_E = $_POST['description_E'];


      $img_name = $_FILES['image_E']['name'];
      $img_size = $_FILES['image_E']['size'];
      $tmp_name = $_FILES['image_E']['tmp_name'];
      $error = $_FILES['image_E']['error'];

      if($error === 0){
        $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        
        $allowed_exs = array("jpg","jpeg","png");
            if(in_array($img_ex_lc,$allowed_exs)){

                	$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
			          	$img_upload_path = 'images/'.$new_img_name;
			          	move_uploaded_file($tmp_name, $img_upload_path);
               // header("Location:view.php");
                 
                		//write sql query
                   $idEvent=$_GET['idEvent'];
               
              $event = new event(
                $nom_E,
                $date_E, 
                $description_E,
                $image_E             
			);
               
            $eventC->modifierEvent($event, $idEvent);
            //header('refresh:5;url=afficherevents.php');
        }
        else
            $error = "Missing information";
	}
}

?>
<html>
	<head>
		<title>Modifier event</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/style.css">
    </head>
	<body>
		<button><a href="afficherEvents.php">Return to list</a></button>
        <hr>
        
        <div idEvent="error">
            <?php echo $error; ?>
        </div>
		
		<?php
			if (isset($_GET['idEvent'])){
				$event = $eventC->recupererEvent($_GET['idEvent']);
            }
                
				
		?>
			<h2>Update Event Form</h2>
		<form action="" method="POST" enctype="multipart/form-data" > 
		  <fieldset>
		    <legend>event information:</legend>
		    <label for="nom_E">Name:</label><br>
		    <input type="text" name="nom_E" idEvent="lnom_Eib" value="">

		    <br>
		   	<label for="date_E">Date:</label><br>
		    <input type="date" name="date_E" idEvent="date_E" value="">
		    <br>
		    <label for="description_E">Description:</label><br>
		    <input type="text" name="description_E" idEvent="description_E" value="">
            <br>
            <br>
            <input type="file" name="image_E" >
		    <br>
            <br>
    </select>
            
            <br>
            <br>
		    <input type="submit" value="update" name="update" idEvent="update" class="btn btn-primary" style="margin-top:20px;">
			   <a href="afficherEvents.php" class="btn btn-success" style="margin-top:20px;">Go back to view</a>
		  </fieldset>
		</form>
		<?php
		//}
		?>
	</body>
</html>