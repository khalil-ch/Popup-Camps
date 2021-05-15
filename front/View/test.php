  <?php
    include_once './header.php';
	require_once "../Controller/produitC.php";
	 require_once '../Controller/categorieC.php';


       $cat = new categorieC();
       $rowse = $cat->afficherCategorie();
	


  
		
			foreach($rowse as $row)
                  {
				echo '<li>';
				echo '<a href="#">';
                echo $row["nom_categorie"];
				echo '</a>';
				echo '</li>';
                  //$value = $rowCat['id_categorie'];
                
             
                } 
			
		
		
		?>
		
		 
		 
	
		