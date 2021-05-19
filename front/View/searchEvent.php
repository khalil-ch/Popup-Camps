<?php
    require_once '../Controller/eventC.php';
    include_once './header.php';

    $eventC =  new eventC();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <link href="assets/css/style.css" rel="stylesheet">


      <!-- font awesome -->

      <script src="https://use.fontawesome.com/your-embed-code.js"></script>
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <!-- my custom input css -->
       <link rel="stylesheet" href="styleSearchInput.css">
	   </head>

	   <body>
	<section class="search-container">
		<h2></h2>
		<div class="form-container">
            <form action="" method = 'POST'>
                <div class="row">
                    <div class="col-25">                
					<div class="search-container">
                        <input type = "text" name = 'event'>
                    </div>
                </div>
                <br>
                <div class="search-container">
                    <input type = "submit" value = "search" name ="search">        
            </form>
		</div>
	</section>

	<?php
		if (isset($_POST['event']) && isset($_POST['search'])){
			$result = $eventC->getNomEvent($_POST['event']);
			if ($result !== false) {
	?>
		<section class="container">
			<a href = "Events.php" class="btn btn-primary shop-item-button">All events</a>
			<div class="shop-items">
				<hr>
				<div class="shop-item">
					<strong class="shop-item-title"> <?= $result['nom_E'] ?> </strong>
					<hr>
					<img src="../../back/Views/assets/<?= $result['image_E'] ?>" class="shop-item-image">
					<div>
						<div>
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