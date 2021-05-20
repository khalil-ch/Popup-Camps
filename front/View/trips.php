<?PHP
include "../Controller/promo1.php";
include_once './header.php';

$promo1=new promo1();
$list1=$promo1->afficherPromo();

?>






    <!doctype html>
    <html lang="en">

    <head>
        <title>About the Promotions &mdash; Website Template by Colorlib</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="fonts/icomoon/style.css">

        <link rel="stylesheet" href="css1/bootstrap.min.css">
        <link rel="stylesheet" href="css1/bootstrap-datepicker.css">
        <link rel="stylesheet" href="css1/jquery.fancybox.min.css">
        <link rel="stylesheet" href="css1/owl.carousel.min.css">
        <link rel="stylesheet" href="css1/owl.theme.default.min.css">
        <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" href="css1/aos.css">

        <!-- MAIN CSS -->
        <link rel="stylesheet" href="css1/style.css">
        <meta charset="UTF-8">
        <!-- Site favicon -->

        <!-- Google Font -->

        <script type="text/javascript">

        </script>

        <style>

            .errorWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #dd3d36;
                color:#4d84a4;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
            .succWrap{
                padding: 10px;
                margin: 0 0 20px 0;
                background: #4d84a4;
                color:#4d84a4;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
            table {
                border-collapse: collapse;
                width: 100%;
                table-layout: auto;
            }
            th {
                background-color: #cccccc;
                color: white;
                padding: 8px
            }
            td {
                padding: 8px;
                text-align: left;
                border-bottom: 6px solid #efba6c;
            }

        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Afficher Liste Des Promotion </title>
        <link rel="stylesheet" href="css1/style.css">
        <script type="text/javascript">
        </script>

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



        <div class="ftco-blocks-cover-1">
            <div class="site-section-cover overlay" style="background-image: url('images1/hero_1.jpg')">
                <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-md-5" >
                            <h1 class="mb-3 text-white">Our Promotions</h1>
                            <p>POP-UP Camp is famous by the generous about the amount of Promotion they provide especially when They are celebrating an event </p>

                        </div>
                    </div>
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
                            <h3>Your Journey Starts Here</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="listing-item">
                            <div class="listing-image">
                                <img src="images1/img_1.jpg" alt="Image" class="img-fluid">
                            </div>
                            <div class="listing-item-content">
                                <a class="px-3 mb-3 category bg-primary" href="#">$200.00</a>
                                <h2 class="mb-1"><a href="trip-single.html">CAMP Bag</a></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4" >
                        <div class="listing-item">
                            <div class="listing-image">
                                <img src="images1/img_2.jpg" alt="Image" class="img-fluid">
                            </div>
                            <div class="listing-item-content">
                                <a class="px-3 mb-3 category bg-primary" href="#">$390.00</a>
                                <h2 class="mb-1"><a href="trip-single.html">Camp with A view</a></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4" >
                        <div class="listing-item">
                            <div class="listing-image">
                                <img src="images1/img_3.jpg" alt="Image" class="img-fluid">
                            </div>
                            <div class="listing-item-content">
                                <a class="px-3 mb-3 category bg-primary" href="#">$180.00</a>
                                <h2 class="mb-1"><a href="trip-single.html">Hiking Shoes</a></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4" >
                        <div class="listing-item">
                            <div class="listing-image">
                                <img src="images1/img_4.jpg" alt="Image" class="img-fluid">
                            </div>
                            <div class="listing-item-content">
                                <a class="px-3 mb-3 category bg-primary" href="#">$600.00</a>
                                <h2 class="mb-1"><a href="trip-single.html">Travel Bus</a></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4" >
                        <div class="listing-item">
                            <div class="listing-image">
                                <img src="images1/img_5.jpg" alt="Image" class="img-fluid">
                            </div>
                            <div class="listing-item-content">
                                <a class="px-3 mb-3 category bg-primary" href="#">$330.00</a>
                                <h2 class="mb-1"><a href="trip-single.html">Boat</a></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4" >
                        <div class="listing-item">
                            <div class="listing-image">
                                <img src="images1/img_6.jpg" alt="Image" class="img-fluid">
                            </div>
                            <div class="listing-item-content">
                                <a class="px-3 mb-3 category bg-primary" href="#">$450.00</a>
                                <h2 class="mb-1"><a href="trip-single.html"> Hats</a></h2>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
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


    <html>
    <div class="site-section bg-image overlay" style="background-image: url('images1/hero_1.jpg')">
      <div class="container">


            <h2 class="font-weight-bold text-white">Check Our Promotion List</h2>
            <p class="text-white"> Don't Miss Out on our exlusive promotions made just for you!</p>
            <p class="mb-0"><a href="promotab.php" class="btn btn-primary text-white py-3 px-4">Explore</a></p>
          </div>
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
                <a href="#"><img src="images1/insta_1.jpg" alt="Image" class="img-fluid"></a>
              </div>
              <div class="col-4 gal_col">
                <a href="#"><img src="images1/insta_2.jpg" alt="Image" class="img-fluid"></a>
              </div>
              <div class="col-4 gal_col">
                <a href="#"><img src="images1/insta_3.jpg" alt="Image" class="img-fluid"></a>
              </div>
              <div class="col-4 gal_col">
                <a href="#"><img src="images1/insta_4.jpg" alt="Image" class="img-fluid"></a>
              </div>
              <div class="col-4 gal_col">
                <a href="#"><img src="images1/insta_5.jpg" alt="Image" class="img-fluid"></a>
              </div>
              <div class="col-4 gal_col">
                <a href="#"><img src="images1/insta_6.jpg" alt="Image" class="img-fluid"></a>
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
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt odio iure animi ullam quam, deleniti rem!</p>
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
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>


    </div>
</html>
