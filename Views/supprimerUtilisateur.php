<?PHP
	include "../Controller/CampgroundC.php";
	include "./style/style.css";

	$campgroundC=new CampgroundC();
	
	if (isset($_POST["id"])){
		$campgroundC->supprimerCampgrounds($_POST["id"]);
		header('Location:afficherCampgrounds.php');
	}

?>