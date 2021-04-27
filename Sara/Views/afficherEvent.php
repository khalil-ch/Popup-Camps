<?php
    include '../Controller/eventC.php';
    require_once '../config.php';

    $eventC =  new eventC();

	$events = $eventC->afficherEvent();

	if (isset($_GET['idEvent'])) {
		$eventC->supprimerEvent($_GET['idEvent']);
		header('Location:afficherEvent.php');
	}
  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.css"> 

</head>
<body>
	<a href = "searchEvent.php" class="table table-striped shop-item-button">Search</a>
		<section class="container">
			<h2>Events</h2>
			<a href = "addEvent.php" class="table table-striped shop-item-button" href = "#">Ajouter</a>
			<div class="shop-items">
				<?php
					foreach ($events as $event) {
				?>
				<div class="shop-item">
					<strong class="shop-item-title"> <?= $event['nom_E'] ?> </strong>
					<img src="../assets/images/<?= $event['image_E'] ?>" width = "200" height = "200" >
					<div class="shop-item-details">
						<span class="shop-item-price"><?= $event['description_E'] ?></span>
						<a type="button" class="table table-striped shop-item-button" href = "afficherEvent.php?idEvent=<?= $event['idEvent'] ?>">delete</a>
					</div>
				</div>
				<?php 
					}
				?>
			</div>
		</section>
	<script src="../assets/js/script.js"></script>
</body>

</html>