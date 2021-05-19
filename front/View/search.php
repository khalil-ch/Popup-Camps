<?php
    require_once '../Controller/eventC.php';
    include_once './header.php';

    $eventC =  new eventC();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
	<section class="container">
		<h2></h2>
		<div class="shop-item-title">
            <form action="" method = 'POST'>
                <div class="row">
                    <div class="col-25">                
                        <label>Search event name: </label>
                    </div>
                    <div class="col-75">
                        <input type = "text" name = 'event'>
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type = "submit" value = "Search" name ="search">
                </div>
            </form>
		</div>
	</section>

	<?php
		if (isset($_POST['event']) && isset($_POST['search'])){
			$result = $eventC->getNomEvent($_POST['event']);
			if ($result !== false) {
	?>
		<section class="container">
			<h2>EVENTS</h2>
			<a href = "afficherEvents.php" class="btn btn-primary shop-item-button">All events</a>
			<div class="shop-items">
				
				<div class="shop-item">
					<strong class="shop-item-title"> <?= $result['nom_E'] ?> </strong>
					<img src="assets/<?= $result['image_E'] ?>" class="shop-item-image">
					<div class="shop-item-details">
						<span class="shop-item-price"><?= $result['description_E'] ?> </span>
					</div>
				</div>
				
			</div>
		</section>
	<?php
		}
		else {
			echo "<div> No results found!!! </div>";
		}
	}
	?>
	<script src="../assets/js/script.js"></script>

</body>

</html>