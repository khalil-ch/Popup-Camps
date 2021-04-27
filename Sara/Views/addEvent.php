<?php
    require_once '../Controller/eventC.php';
    require_once '../Model/event.php';

    $eventC =  new eventC();

    if (isset($_POST['nom_E']) && isset($_POST['description_E']) && isset($_POST['image_E'])) {
        $event = new event($_POST['nom_E'], (string)$_POST['description_E'], $_POST['image_E']);
        
        $eventC->ajouterEvent($event);

        header('Location:afficherEvent.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.css">
    <style>

    </style>
</head>

<body>
	<?php include_once 'header.php'; ?>
    <a href = "searchevent.php" class="btn btn-primary shop-item-button">Search</a>
	<section class="container">
		<h2>New event</h2>
        <a href = "showevents.php" class="btn btn-primary shop-item-button">All events</a>
		<div class="form-container">
            <form action="" method = "POST">
                <div class="row">
                    <div class="col-25">                
                        <label>nom événement </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "nom_E">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Image</label>
                    </div>
                    <div class="col-75">
                        <input type = "file" name = "image_E" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Description</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "description_E">
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type="submit" value="Submit" name = "submit">
                </div>
            </form>
		</div>
	</section>
	<script src="../assets/js/script.js"></script>
</body>

</html>