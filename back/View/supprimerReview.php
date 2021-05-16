<?PHP
	include "../Controller/ReviewC.php";
	include "./style/style.css";

	$reviewC=new ReviewC();
	
	if (isset($_POST["id"])){
		$reviewC->supprimerReview($_POST["id"]);
		header('Location:../view/index.php');
	}

?>