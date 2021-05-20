<?PHP
   
	include "../Controller/categorieC.php";
    require_once '../../config.php';
	$categorieC=new categorieC();
	
	if (isset($_GET["id"])){
		$categorieC->supprimerCategorie($_GET["id"]);
      //  echo "deleted";
		header('Location:afficherCategorie.php');
	}

?>