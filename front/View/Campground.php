<?php 
  include_once "/xampp/htdocs/popupcampIntegrated/popupcamp/back/Controller/CampgroundC.php";
  require_once "/xampp/htdocs/popupcampIntegrated/popupcamp/back/Controller/ReviewC.php";
  $campgroundC = new CampgroundC;
  $results = $campgroundC->selectCamp($_GET['nomCampRv']);
  $reviewC = new ReviewC;
  $resultsReview = $reviewC->selectReview($_GET['nomCampRv']);
  $listCamps=$campgroundC->afficherCampgrounds();
if (
    isset($_POST["rating"]) &&
    isset($_POST["user"]) && 
    isset($_POST["comment"]) &&
    isset($_SESSION["id"])
) {
    if (
        !empty($_POST["rating"]) && 
        !empty($_POST["user"]) && 
        !empty($_POST["comment"]) &&
        !empty($_SESSION["id"])
    ) {
        $review = new Review(
            0,
                $_GET['nomCampRv'],
                $_POST['rating'], 
                $_POST['user'],
                $_POST['comment'],
                //42
				        $_SESSION['id']
        );
        $reviewC->ajouterReview($review);
        header('Location:index.php');
    }
    else
        $error = "Missing information";
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
						foreach($results as $camp){
					?>
    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" style="background-image: url('<?php echo $camp['imageCamp'];?>')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-5" data-aos="fade-up">
              <h1 class="mb-3 text-white"><?php echo $camp['NomCamp'];?></h1>
              <p>by <?php echo $camp['proprietaire'];?></p>

              <div class="listing-item-content">
                <a class="px-3 mb-3 category bg-primary" href="#">$330.00</a>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="heading-39101 mb-5">
              <span class="backdrop">Description</span>
              <span class="subtitle-39191">Discover Our Camping</span>
              <h3>Description</h3>
            </div>
            <p><?php echo $camp['description'];?></p>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi quae expedita fugiat quo incidunt, possimus temporibus aperiam eum, quaerat sapiente.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos debitis enim a pariatur molestiae.</p> -->
          </div>
          <div class="col-md-6" data-aos="fade-right">
            <img src="images/traveler.jpg" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
    <?php
						}
					?>
    <div class="heading-39101 mb-5">
      <span class="backdrop text-center">Reviews</span>
    </div>
    <div class="site-section">
      <?php
						foreach($resultsReview as $resultR){
					?>
      <div class="card">
        <div class="card-header">
          Featured
        </div>
        <div class="card-body">
          <h5 class="card-title">By : <?php echo $resultR['user']; ?></h5>
          <p class="starability-result" data-rating="<?php echo $resultR['note']; ?>">
            Rated: <?php echo $resultR['note']; ?> stars
          </p>
          <p class="card-text"><?php echo $resultR['comment']; ?></p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <?php
          						}
					?>
      <div class="site-section">
        <div class="container" style="background: pink;padding :2%">
          <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
              <form action="" method="POST">
                <div class="form-group row">
                  <label class="col-sm-12 col-md-2 col-form-label" for="rating">note:</label>
                  <div class="col-sm-12 col-md-10">
                    <!-- <input class="form-control" placeholder="note" type="number" name="note" id="note" maxlength="2"> -->
                    <fieldset class="starability-heartbeat">
                      <legend>Star rating:</legend>
                      <input type="radio" id="no-rate" class="input-no-rate" name="rating" value="0" checked
                        aria-label="No rating." />

                      <input type="radio" id="rate1" name="rating" value="1" />
                      <label for="rate1">1 star.</label>

                      <input type="radio" id="rate2" name="rating" value="2" />
                      <label for="rate2">2 stars.</label>

                      <input type="radio" id="rate3" name="rating" value="3" />
                      <label for="rate3">3 stars.</label>

                      <input type="radio" id="rate4" name="rating" value="4" />
                      <label for="rate4">4 stars.</label>

                      <input type="radio" id="rate5" name="rating" value="5" />
                      <label for="rate5">5 stars.</label>

                      <span class="starability-focus-ring"></span>
                    </fieldset>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-12 col-md-2 col-form-label" for="user">User:</label>
                  <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="Search Here" type="text" name="user" id="user"
                      maxlength="30">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-12 col-md-2 col-form-label" for="comment">Comment:</label>
                  <div class="col-sm-12 col-md-10">
                    <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <button class="btn btn-primary col-6" type="submit">Submit</button>
                  <button class="btn btn-danger col-6" type="reset">Cancel</button>
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
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt odio iure animi ullam quam,
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
                  </script> All rights reserved | This template is made with <i class="icon-heart text-danger"
                    aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
              </div>
            </div>

          </div>
        </div>
      </footer>

    </div>

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