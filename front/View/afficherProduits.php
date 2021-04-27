<?PHP
	require_once "../Controller/produitC.php";

	$produitC =new produitC();
	$rows=$produitC->afficherProduit();
	
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<title> Les Produits </title>
		<link rel="stylesheet" href="./style/style.css">
    </head>
    <body>
	<div class="container">

	
	
			

		<?php
			
			foreach($rows as $row){
				?>
				<?php
					echo '<div class="row mb50">';
                      echo  '<div class="col-md-4">';
                        echo '<div class="hover-item mb30">';
                        echo '<img src="uploads/<?=$row["img_produit"]?>" class="img-responsive smoothie" alt="">';
                          echo '<div class="overlay-item-caption smoothie"></div>';
							echo ' <div class="hover-item-caption smoothie">';
                              echo  '<div class="vertical-center smoothie">';
                            echo '<a href="afficherProduit.php?id=<?php echo $row["id_produit"]; ?>" class="smoothie btn btn-primary">View</a>'   ;    
                              echo '</div>';
                               echo '</div>';
                            echo '</div>';
                            echo '<div class="item-excerpt">';
                                echo '<h4 class="pull-right"><?php echo $row["prix_produit"]; ?></h4>';
                                echo '<h4><a href="afficherProduit.php?id=<?php echo $row["id_produit"]; ?>" ><?php echo $row["lib_produit"]; ?></a></h4>';
                                echo '<p>Taste oh spoke about no solid of hills up shade. Occasion so bachelor humoured striking by attended doubtful be it.</p>';
                           echo '</div>';
                       echo '</div>';
				?>

			<?php 
			}
			?>
		</tbody>
	
					
					
	
		</table>
	</div>
	</body>
</html>
