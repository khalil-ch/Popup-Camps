<?php
    include_once '../Controller/CampgroundC.php';

	session_start();
if (!isset($_SESSION['alogin'])) {
	header("location:../../admin/index.php");
}
	

    $error = "";

    // create user
    $campground = null;

    // create an instance of the controller
    $campgroundC = new CampgroundC();
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
            $campgroundC->ajouterCampground($campground);
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
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<script type="text/javascript" src="./formControl.js"></script>
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
	<?php 
	include_once 'includes/topside.php';
	?>

	<?php 
	include_once 'includes/leftbar.php';
	?>
	<div class="mobile-menu-overlay"></div>

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
					<div class="collapse collapse-box" id="basic-form1">
						<div class="code-box">
							<div class="clearfix">
								<a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"
									data-clipboard-target="#copy-pre"><i class="fa fa-clipboard"></i> Copy Code</a>
								<a href="#basic-form1" class="btn btn-primary btn-sm pull-right" rel="content-y"
									data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
							</div>
							<pre><code class="xml copy-pre" id="copy-pre">
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script>function verif() {
    var errors = "<ul>";
    var nomCamping = document.querySelector('#nomCamping').value;
    var prix = document.querySelector('#prix').value;
    var emplacement = document.querySelector('#emplacement').value;
    var description = document.querySelector('#description').value
    var duree = document.querySelector('#duree').value
    var proprietaire = document.querySelector('#proprietaire').value;


    if (nomCamping.charAt(0) < 'A' || nomCamping.charAt(0) > 'Z') {
        //document.getElementById('erreur').innerHTML = "Le nom doit commencer par une lettre Majuscule";
        //return false;
        errors += "<li>Le nom doit commencer par une lettre Majuscule </li>";
    }
    if (emplacement.charAt(0) < 'A' || emplacement.charAt(0) > 'Z') {
        errors += "<li>Le prenom doit commencer par une lettre Majuscule </li>";
    }
    if (proprietaire.charAt(0) < 'A' || proprietaire.charAt(0) > 'Z') {
        //document.getElementById('erreur').innerHTML = "Le nom doit commencer par une lettre Majuscule";
        //return false;
        errors += "<li>Le nom doit commencer par une lettre Majuscule </li>";
    }

    if (prix >10 || prix.length != 2) {
        errors += "<li>Note invalide </li>";
    }

    if (description.length > '50') {
        errors += "<li>Description trop longue</li>";
    }
    if (duree < 1) {
        errors += "<li> Veuillew choisir nombre de jours</li>";
    };

    if (errors !== "<ul>") {
        document.querySelector('#erreur').style.color = 'red';
        errors += "</ul>"
        document.getElementById('erreur').innerHTML = errors;
        return false;
    } else {
        var msg = "Ajout avec succees ";

        alert(msg);
    }
    console.log("inside js file");
    alert("hellp");


}</script>

</body>
</html>