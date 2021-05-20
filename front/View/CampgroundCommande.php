<?php 
  include_once "/xampp/htdocs/popupcampIntegrated/popupcamp/back/Controller/CampgroundC.php";
  require_once "/xampp/htdocs/popupcampIntegrated/popupcamp/back/Controller/ReviewC.php";
  include "../Controller/commandeC.php";


  session_start();
  if(!isset($_SESSION['id'])){
    header("location:../../login.php");
  }
  else{

  }
  $commandeCC = new commandeC;
  $camps=new CampgroundC;
  $listCamps=$camps->afficherCampgrounds();
$i=1;
if (
  isset($_POST["dateCommande"]) &&
  isset($_POST["jourCommande"])
) {
  if (
    !empty($_POST["dateCommande"]) && 
    !empty($_POST["jourCommande"])
  ) {
    $total=$_POST['jourCommande']*$_GET['prix'];
    $commandeCC->ajouterCommandeCampground($_SESSION['id'],$_POST['dateCommande'],$total);
    //header('Location:index.php');
  }
  else{
    $error = "Missing information";
  }
    
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Trips &mdash; Website Template by Colorlib</title>
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
    <link rel="stylesheet" type="text/css"
        href="../../back/View/starability/starability-minified/starability-all.min.css" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <div class="site-wrap" id="home-section">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>



        <!-- Image -->
        <?php
    include "./header.php";
					?>
        <div class="site-section">
            <div class="container" style="background: pink;padding :2%;border-radius:10px;">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <form method="POST" class="row g-3 needs-validation" novalidate>
                            <div class="col-md-4 position-relative">
                                <label for="validationTooltip01" class="form-label">Date Depart</label>
                                <input type="date" class="form-control" id="validationTooltip01" name="dateCommande" value="Mark" required>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 position-relative">
                                <label for="validationTooltip02" class="form-label">Nombre de jours</label>
                                <input type="number" class="form-control" name="jourCommande" id="validationTooltip02" value="Otto" required>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form>

                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>

        <div class="site-section">

            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-7">
                        <div class="heading-39101 mb-5">
                            <span class="backdrop text-center">Journey</span>
                            <span class="subtitle-39191">Journey</span>
                            <h3>Explore Other Campgrounds</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
						foreach($listCamps as $Camp){
					?>
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                        <div class="listing-item">
                            <div class="listing-image">
                                <?php $path = $Camp['imageCamp'];?>
                                <img src="<?php echo $path;?>" alt="" class="img-fluid">
                            </div>
                            <div class="listing-item-content">
                                <a class="px-3 mb-3 category bg-primary"
                                    href="Campground.php?nomCampRv=<?PHP echo $Camp['NomCamp']; ?>">$<?php echo $Camp['prix']; ?></a>
                                <h2 class="mb-1"><a href="trip-single.html"><?php echo $Camp['NomCamp']; ?></a></h2>
                            </div>
                        </div>
                    </div>
                    <?php
						}
					?>

                </div>
            </div>
        </div>


        <footer class="site-footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <h2 class="footer-heading mb-3">Instagram</h2>
                        <div class="row">
                            <div class="col-4 gal_col">
                                <a href="#"><img src="images/insta_1.jpg" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-4 gal_col">
                                <a href="#"><img src="images/insta_2.jpg" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-4 gal_col">
                                <a href="#"><img src="images/insta_3.jpg" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-4 gal_col">
                                <a href="#"><img src="images/insta_4.jpg" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-4 gal_col">
                                <a href="#"><img src="images/insta_5.jpg" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-4 gal_col">
                                <a href="#"><img src="images/insta_6.jpg" alt="Image" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 ml-auto">
                        <div class="row">
                            <div class="col-lg-6 ml-auto">
                                <h2 class="footer-heading mb-4">Quick Links</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">Terms of Service</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="footer-heading mb-4">Newsletter</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt odio iure
                                    animi ullam quam,
                                    deleniti rem!</p>
                                <form action="#" class="d-flex" class="subscribe">
                                    <input type="text" class="form-control mr-3" placeholder="Email">
                                    <input type="submit" value="Send" class="btn btn-primary">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <div class="border-top pt-5">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i
                                    class="icon-heart text-danger" aria-hidden="true"></i> by <a
                                    href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

    </div>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
    </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

</body>

</html>