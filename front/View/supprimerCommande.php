<?PHP
   
	include "../Controller/commandeC.php";
    require_once '../../config.php';
	$commandeC=new commandeC();
	
	if (isset($_GET["id"])){
		$commandeC->supprimerCommande($_GET["id"]);
      //  echo "deleted";
		header('Location:afficherToutCommande.php');
	}

?>