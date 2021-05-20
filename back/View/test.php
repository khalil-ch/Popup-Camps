<?php
 	include_once "/xampp/htdocs/popupcampIntegrated/popupcamp/back/Controller/ReviewC.php";
     include_once "../Controller/CampgroundC.php";
     function log_as_json2($vars)
    {
    if(is_resource($vars)) {
        return;
    }
    else {
        if($vars)
        {
            $json =  @json_encode($vars);
            print "<script>console.log($json);</script>";
        }
    }
    }
     $campgroundC=new CampgroundC();
     $reviewC=new ReviewC();

?>
<?php 
$campsArray = array();
$listOfCamps=$campgroundC->afficherCampgrounds();
$i=0;
foreach ($listOfCamps as $oneCamp) {
    //echo $oneCamp['NomCamp'];
    $compteur=$reviewC->compterReview($oneCamp['NomCamp']);
    $campsArray[$i++]=array("label"=> $oneCamp['NomCamp'], "y"=> $compteur['COUNT(NomCampRV)']);
    //log_as_json2($compteur);
    //echo $compteur['COUNT(NomCampRV)'];
}
$i=0;
?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                title: {
                    text: "%Reviews per Campground"
                },
                subtitles: [{
                    text: "most popular Campgrounds"
                }],
                data: [{
                    type: "pie",
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabelFontSize: 16,
                    indexLabel: "{label} - #percent%",
                    yValueFormatString: "฿#,##0",
                    dataPoints: <?php echo json_encode($campsArray, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>

<body>
    </button>

    <!-- Modal -->
    <div class="modal-body">
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>