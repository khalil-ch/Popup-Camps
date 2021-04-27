<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/ico/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/ico/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/ico/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" href="assets/img/ico/apple-touch-icon-57x57.png">

    

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/plugins.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/pe-icons.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
    include_once './header.php';
	require_once "../Controller/produitC.php";

	$produitC =new produitC();
	$rows=$produitC->afficherProduit();
	
?>

 
    <section>
            <div class="section-inner"> 
                <div class="container p-50">
                   <?php
                $i=0;
                echo '<div class="row">';
			foreach($rows as $row){
            
                     $string  =  '<div class="col-md-4">
                       <div class="hover-item mb30">
                        <img src="../../back/view/uploads/'.$row["img_produit"]. '"class="img-responsive smoothie" alt="">
                          <div class="overlay-item-caption smoothie"></div>
							<div class="hover-item-caption smoothie">
                              <div class="vertical-center smoothie">
                            <a href="afficherProduit.php?id='.$row["id_produit"].' "class="smoothie btn btn-primary">View</a>    
                              </div>
                               </div>
                            </div>
                            <div class="item-excerpt">
                                <h4 class="pull-right">'.$row["prix_produit"].' </h4>
                                <h4><a href="afficherProduit.php?id='.$row["id_produit"].'">'.$row["lib_produit"] .' </a></h4>
                                <p>Taste oh spoke about no solid of hills up shade. Occasion so bachelor humoured striking by attended doubtful be it.</p>
                           </div>
                      </div>';
                      $i++;
                        
                        if(($i-1) %3 ==0 && $i>0){
                        echo '</div> <div class="row">'.$string;
                        }
                        else{
                        echo $string ;
                        }
                        }

        
                 ?>
                     
               
                
                        
                        
                  
                </div>
            </div>
        </section>
</body>
</html>