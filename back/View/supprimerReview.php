<?PHP
	include "/xampp/htdocs/popupcampIntegrated/popupcamp/back/Controller/ReviewC.php";
	//include "./style/style.css";

	$reviewC=new ReviewC();
	
	if (isset($_GET["id"])){
		$reviewC->supprimerReview($_GET["id"]);
		header('Location:index.php');
	}

?>