<?PHP
   
	include "../Controller/eventC.php";
    require_once '../config.php';
	$eventC=new eventC();

	if (isset($_GET["idEvent"])){
		$eventC->supprimerEvent($_GET["idEvent"]);
      //  echo "deleted";
		header('Location:afficherEvents.php');
	}

?>