<?PHP
   
	include "../Controller/produitC.php";
    require_once '../../config.php';
	$produitC=new produitC();
	
	if (isset($_GET["id"])){
		$produitC->supprimerProduit($_GET["id"]);
      //  echo "deleted";
		header('Location:afficherproducts.php');
	}

?>