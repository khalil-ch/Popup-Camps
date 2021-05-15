<?php
	   if(isset($_POST['submit'])){
    if(!empty($_POST['categorie'])) {
        $selected = $_POST['categorie'];
      $productsWithThisCategorie= $cat->recupererProduitsSelonCategorie($selected);
	
    } 
    }


?>
!DOCTYPE html>
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
    <title>Document</title>
</head>
<body>
  
    <?php
    include_once './header.php';
	require_once "../Controller/produitC.php";
	 require_once '../Controller/categorieC.php';
	$produitC =new produitC();
	$rows=$produitC->afficherProduit();
		
       $cat = new categorieC();
       $rowsCat = $cat->afficherCategorie();
	 
	   
	
	 
?>

      <div class="search-container" >
          <form action="searchProduct.php" method="GET">
          <input type="search" name="search" id="search" placeholder="search">
           <input type="submit" value="search" class="searchBtn">
            
        </form>
      </div>
    <section>
	
	<form method="post" action="TriProducts.php" style="position:absolute; top:135px; left:150px;">
		
		
				 <select name="categorie" id="" class="">
            <?php
            
                foreach($rowsCat as $rowCat)
                  {
                  $nom = $rowCat['nom_categorie'];
                  $value = $rowCat['id_categorie'];
                
                echo "<option value='$value'> $nom </option>";
                } 
            ?>
                </select>
				<input type="submit" name="submit" value="Search for this Category" class="searchBtn" style="margin-left:15px;"/>
		</form>
		
		 <div class="section-inner"> 
                <div class="container p-50">
                   <?php
                $i=0;
                echo '<div class="row">';
		foreach($productsWithThisCategorie as $product){
            
                     $string  =  '<div class="col-md-4">
                       <div class="hover-item mb30">
                        <img src="../../back/view/uploads/'.$product["img_produit"]. '"class="img-responsive smoothie" alt="">
                          <div class="overlay-item-caption smoothie"></div>
							<div class="hover-item-caption smoothie">
                              <div class="vertical-center smoothie">
                            <a href="singleproduct.php?id='.$product["id_produit"].' "class="smoothie btn btn-primary">View</a>    
                              </div>
                               </div>
                            </div>
                            <div class="item-excerpt">
                                <h4 class="pull-right">'.$product["prix_produit"].' </h4>
                                <h4><a href="singleproduct.php?id='.$product["id_produit"].'">'.$product["lib_produit"] .' </a></h4>
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
	