<?php
include '../Views/includes/header.php';
include '../Views/includes/leftbar.php';
include '../Controller/offer1.php';
$connect = mysqli_connect("localhost", "root", "", "promotion");
$query = "SELECT type_offer, count(*) as number FROM offer GROUP BY type_offer";
$result = mysqli_query($connect, $query);
?>

</html>
</body>
<?php include('includes/header.php');?>

<div class="ts-main-content">


    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-9">


                    <title>Charts</title>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart()
                        {
                            var data = google.visualization.arrayToDataTable([
                                ['type_offer', 'Number'],
                                <?php
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "['".$row["type_offer"]."', ".$row["number"]."],";
                                }
                                ?>
                            ]);
                            var options = {
                                title: 'charts showing the percentage of the most used types',
                                //is3D:true,
                                pieHole: 0.4
                            };
                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                            chart.draw(data, options);
                        }
                    </script>
                    </head>
                    <body>

                    <br /><br />
                    <div style="width:900px;">

                        <br />
                        <div id="piechart" style="width: 1400px; height: 300px;"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</body>
</html>
