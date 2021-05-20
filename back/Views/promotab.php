<?PHP
include "../Controller/promo1.php";

$promo1=new promo1();
$list1=$promo1->afficherPromo();

?>






    <!doctype html>
    <html lang="en">

    <head>


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



        <header class="site-navbar site-navbar-target" role="banner">

            <div class="container">
                <div class="row align-items-center position-relative">

                    <div class="col-3 ">
                        <div class="site-logo">
                            <a href="index.html" class="font-weight-bold">
                                <img src="images1/logo.png" alt="Image" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-9  text-right">


                        <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>



                        <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav ml-auto ">
                                <li><a href="index.html" class="nav-link">Home</a></li>
                                <li><a href="about.php" class="nav-link">About The Offers</a></li>
                                <li class="active"><a href="trips.php" class="nav-link">About The Promotions</a></li>
                                <li><a href="blog.html" class="nav-link">Blog</a></li>
                                <li><a href="contact.html" class="nav-link">Contact</a></li>
                            </ul>
                        </nav>
                    </div>


                </div>
            </div>

        </header>






        <div class="ts-main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hr-dashed"></div>
                           <form  method="post" class="form-horizontal" enc
                                <div class="form-group">
                                    <div class="content-wrapper">
                                     <h2 class="page-title">List of All The Promotions</h2>

                                                    <div class="pd-20 card-box mb-30">
                                                        <div class="clearfix mb-20">
                                                            <div class="pull-center">

                                                                    <table>
                                                                        <tr>

                                                                            <th>Promotions Name</th>
                                                                            <th>Promotions Type</th>
                                                                            <th>Promotion Duration</th>

                                                                        </tr>

                                                                        <?php
                                                                        foreach($list1 as $promo){
                                                                        ?>
                                                                        <tr>

                                                                            <td><?php echo $promo['nom_promo']; ?></td>
                                                                            <td><?php echo $promo['type_promo']; ?></td>
                                                                            <td><?php echo $promo['duree_promo']; ?></td>



                                                                        </tr>

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
        <?php
    }

    ?>