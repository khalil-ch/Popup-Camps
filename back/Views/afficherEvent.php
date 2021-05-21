<?php
require_once '../Controller/eventC.php';
    session_start();
    $eventC = new eventC();
   $row = $eventC->recupererEvent($idEvent);
   
    $nom_E = $row['nom_E'];
    $date_E = $row['date_E']; 
    $description_E =$row['description_E'];
    $image_E = $row['image_E'];

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



    
    <title>Document</title>
</head>
<body>
  
    <?php
    include_once './header.php';
    

?>
<div class="section-inner">
                <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-md-4 col-sm-6 mb50 mr-5">
                                    <div class="images">
                        
                                        
                                            <img alt="Image Title" class="img-responsive" src="'assets/'<?=$img?>" title="Image Title">
                                        
                                                                    
                                        
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 mb50">
                                    <div class="summary entry-summary">

                                        <div>
                                        <?php echo '<h3>' .$nom_E. '</h3>' ?>
                                            <p class="price">                      
                                                <ins><span class="amount"><?php echo $description_E ?></span>
                                                </ins>
                                            </p>
                                        </div>

                                        <div class="lead">
                                            <p>On insensible possession oh particular attachment at excellence in. The books arose but miles happy she. It building contempt or interest children mistress of unlocked no. Offending she contained mrs led listening resembled. Delicate marianne absolute men dashwood landlord and offended. Suppose cottage between and way. Minuter him own clothes but observe country. Agreement far boy otherwise rapturous incommode favourite.</p>
                                        </div>

                                    

                                        <form class="cart mb" enctype="multipart/form-data" method="post">
                                            <div class="quantity buttons_added">
                                                <input class="input-text date_Ey text" min="1" name="date_E" step="1" title="date_E" type="number" value="1">
                                            </div>
                                                                               </form>
                                    </div>
                                </div>
                            </div>

                              
                                
</body>
</html>