<?php
  	include_once "/opt/lampp/htdocs/PopupCamps/BackTemplate/Controller/ReviewC.php";
	  include_once "../Controller/CampgroundC.php";
	  $campgroundC=new CampgroundC();
	  $reviewC=new ReviewC();
	  $campsArray = array();
	  $listCamps=$campgroundC->afficherCampgrounds();
	  $listReviews =$reviewC->afficherReview();
	  $compteur=$reviewC->compterReview("Wood House");

	  $i=0;
foreach ($listCamps as $oneCamp) {
    //echo $oneCamp['NomCamp'];
    $compteur=$reviewC->compterReview($oneCamp['NomCamp']);
    $campsArray[$i++]=array("label"=> $oneCamp['NomCamp'], "y"=> $compteur['COUNT(NomCampRV)']);
    //log_as_json2($compteur);
    //echo $compteur['COUNT(NomCampRV)'];
}
	
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Top 10 Google Play Categories - till 2017"
	},
	axisY: {
		title: "Number of Apps"
	},
	data: [{
		type: "column",
		dataPoints: <?php echo json_encode($campsArray, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>          