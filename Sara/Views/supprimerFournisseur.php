<?PHP
	include "../Controller/fournisseurC.php";
	include "./style/style.css";

	$fournisseurC=new fournisseurC();
	
	if (isset($_POST["id_f"])){
		$fournisseurC->supprimerFournisseur($_POST["id_f"]);
		header('Location:afficherFournisseur.php');
	}

?>