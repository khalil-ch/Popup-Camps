<?php
require_once '../Controller/commandeC.php';
require_once '../Controller/commandeItemsC.php';
        $commandeC = new commandeC();
        $commandeItemsC = new commandeItemsC();
            $id_commande = $_GET['id'];
              $listCommande = $commandeC->afficherCommande($_GET['id']);
            $listItems = $commandeItemsC->afficherCommandeItems($_GET['id']);
            $listCommande = $listCommande[0];
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



       <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.html" class="font-weight-bold">
                  <img src="images/logo.png" alt="Image" class="img-fluid">
                </a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                   <li><a href="index.html" class="nav-link">Home</a></li>
			        	  <li><a href="produits.php" class="nav-link">Products</a></li>
                  <li><a href="about.html" class="nav-link">About</a></li>
                  <li><a href="trips.html" class="nav-link">Trips</a></li>
                  <li><a href="blog.html" class="nav-link">Blog</a></li>
                  <li><a href="../../profile.php" class="nav-link">Personal space</a></li>
                  <li><a href="shopingcart.php" class="nav-link">Cart</a></li>
                  <li><a href="afficherToutCommande.php" class="nav-link">Commandes</a></li>
                  
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>
<body>
      <h2 style="text-align:center">Commande info:</h2>
    <table class="table">
        <thead>
            <th>ID Commande</th>
            <th>Date Commande</th>
            <th>Montant Commande</th>
        </thead>
        <tr>
        
            <td><?php echo $listCommande['id_commande']; ?></td>
            <td> <?php echo $listCommande['date_commande'];?> </td>
            <td> <?php echo $listCommande['montant_commande'];?> </td>

        </tr>
    </table>

        <hr>
    <h2 style="text-align:center">Produit info:</h2>
    <table class="table">
        <thead>
            <th>ID Produit</th>
            <th>Lib Produit</th>
            <th>Prix Produit</th>
            <th>Quantite Produit</th>
            <th>Image Produit</th>
            <th>Fonctionalite </th>
        </thead>
        <tbody>
      	<?php
			foreach($listItems as $row){
				?>
				<tr>
					<td><?php echo $row['id_produit']; ?></td>
					<td><?php echo $row['lib_produit']; ?></td>
					<td><?php echo $row['prix_produit']; ?></td>
					<td><?php echo $row['qt_produit']; ?></td>
					<td><img width="50" height="50" src="../../back/view/uploads/<?=$row['img_produit']?>"> </td>

                    <td><a class="btn btn-info" href="updateCommandeItem.php?id=<?php echo $id_commande ?>&id_produit=<?php echo $row['id_produit']; ?>&qt_produit=<?php echo $row['qt_produit'] ?>">Edit</a>
					<a class="btn btn-danger" href="supprimerCommandeItem.php?idCommande=<?php echo $id_commande ?>&idProduit=<?php echo $row['id_produit']; ?>">Delete Commande</a>
					
					
					
							<a class="btn btn-primary" href="singleproduct.php?id=<?php echo $row['id_produit']; ?>">View Product</a>
					</td>
                    
					</tr>	

			<?php 
			}
            
			?>
            </tbody>
    </table>
  
</body>
</html>