<?php 	
	include "/xampp/htdocs/popupcampIntegrated/popupcamp/back/Controller/CampgroundC.php";
    include "/xampp/htdocs/popupcampIntegrated/popupcamp/back/Controller/ReviewC.php";
	session_start();
	if (!isset($_SESSION['alogin'])) {
		header("location:../../admin/index.php");
	}

	$campgroundC = new CampgroundC();
	$error = "";
    if (
        isset($_POST["prix"]) &&
        isset($_POST["nomCamp"]) &&
        isset($_POST["imageCamp"]) &&
        isset($_POST["emplacement"]) && 
        isset($_POST["description"]) && 
        isset($_POST["duree"]) && 
        isset($_POST["proprietaire"])
    ) {
        if (
            !empty($_POST["prix"]) && 
            !empty($_POST["nomCamp"]) && 
            !empty($_POST["imageCamp"]) && 
            !empty($_POST["emplacement"]) && 
            !empty($_POST["description"]) && 
            !empty($_POST["duree"]) && 
            !empty($_POST["proprietaire"])
        ) {
            $campground = new Campground(
                $_POST['nomCamp'], 
                $_POST['imageCamp'],
                $_POST['prix'], 
                $_POST['emplacement'],
                $_POST['description'],
                $_POST['duree'],
                $_POST['proprietaire']
            );
            $campgroundC->modifierCampgrounds($campground,$_GET['idProduit']);
            header('Location:index.php');
        }
        else
            $error = "Missing information";
    }

	?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
		rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<!-- switchery css -->
	<link rel="stylesheet" type="text/css" href="src/plugins/switchery/switchery.min.css">
	<!-- bootstrap-tagsinput css -->
	<link rel="stylesheet" type="text/css" href="src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
	<!-- bootstrap-touchspin css -->
	<link rel="stylesheet" type="text/css" href="src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="starability/starability-minified/starability-all.min.css" />

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body>
	<h1><?php echo $_GET['nomCamp'];?></h1>

	<?php 
	include_once 'includes/header.php';
	?>
	<?php 
	include_once 'includes/leftbar.php';
	?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<!-- Modifier form -->
			<div id="error">
				<?php echo $error; ?>
			</div>

			<?php
		//	if (isset($_GET['idReview'])){
			//	$review = $reviewC->selectReviewById($_GET['idReview']); //recupererCampgrounds($_GET['idProduit']);
				
		?>
					<form action="" method="POST" class="needs-validation" novalidate>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label" for="nomCamping">Nom Camping</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="Nom du Camping" name="nomCamp"
									id="validationCustom01" maxlength="30" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label" for="imageCamp">Image Camping:</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="Search Here" type="text" name="imageCamp"
									id="validationCustom02" maxlength="30" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label" for="prix">Prix:</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="number" name="prix" id="validationCustom03"
									maxlength="4" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label" for="emplacement">Emplacement:</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="emplacement" id="validationCustom05"
									maxlength="30" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label" for="description">Description:</label>
							<div class="col-sm-12 col-md-10">
								<textarea name="description" id="validationCustom06" cols="30" rows="10"
									required></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label" for="duree">Duree:</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="Choose amount of days" type="number"
									name="duree" id="validationCustom07" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label" for="proprietaire">Proprietaire:</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="Select Proprietaire" type="text"
									name="proprietaire" id="validationCustom08" required>
							</div>
						</div>
						<div class="form-group row">
							<input type="submit" name="envoyer" id="envoyer" onclick="verif()" class="btn btn-info"
								value="evoyer">
							<button class="btn btn-danger col-6" type="reset">Cancel</button>
						</div>
					</form>
			<script>
				// Example starter JavaScript for disabling form submissions if there are invalid fields
				(function () {
					'use strict';
					window.addEventListener('load', function () {
						// Fetch all the forms we want to apply custom Bootstrap validation styles to
						var forms = document.getElementsByClassName('needs-validation');
						// Loop over them and prevent submission
						var validation = Array.prototype.filter.call(forms, function (form) {
							form.addEventListener('submit', function (event) {
								if (form.checkValidity() === false) {
									event.preventDefault();
									event.stopPropagation();
								}
								form.classList.add('was-validated');
							}, false);
						});
					}, false);
				})();
			</script>
			<?php
		//}
		?>
			<!-- Bootstrap Select End -->
			<!-- Bootstrap Switchery Start -->
			<!-- Bootstrap Switchery End -->
			<!-- Bootstrap Tags Input Start -->

			<!-- Bootstrap Tags Input End -->
			<!-- Bootstrap TouchSpin Start -->

			<div class="footer-wrap pd-20 mb-20 card-box">
				DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit
					Hingarajiya</a>
			</div>
		</div>
	</div>

	<!-- form -->

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Form Basic</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-secondary dropdown-toggle" href="#" role="button"
									data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Default Basic Forms</h4>
							<p class="mb-30">All bootstrap element classies</p>
						</div>
						<div class="pull-right">
							<a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"
								data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
						</div>
					</div>




					<!-- js -->
					<script src="vendors/scripts/core.js"></script>
					<script src="vendors/scripts/script.min.js"></script>
					<script src="vendors/scripts/process.js"></script>
					<script src="vendors/scripts/layout-settings.js"></script>
					<!-- switchery js -->
					<script src="src/plugins/switchery/switchery.min.js"></script>
					<!-- bootstrap-tagsinput js -->
					<script src="src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
					<!-- bootstrap-touchspin js -->
					<script src="src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
					<script src="vendors/scripts/advanced-components.js"></script>
</body>

</html>