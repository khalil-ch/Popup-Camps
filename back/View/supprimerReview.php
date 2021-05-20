<?PHP
	include "/xampp/htdocs/popupcampIntegrated/popupcamp/back/Controller/ReviewC.php";
	//include "./style/style.css";

	$reviewC=new ReviewC();
	
	if (isset($_POST["id"])){
		$reviewC->supprimerReview($_POST["id"]);
		header('Location:/index.php');
	}

?>