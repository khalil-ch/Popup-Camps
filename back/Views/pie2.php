<?php
include '../Views/includes/header.php';
include '../Views/includes/leftbar.php';
include '../Controller/offer1.php';

$connect = mysqli_connect('localhost', 'root', '', 'mydb');
 $query = "SELECT duree_offer, count(*) as number FROM offer GROUP BY duree_offer";
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
                          ['duree_offer', 'Number'],
                          <?php
                          while($row = mysqli_fetch_array($result))
                          {
                               echo "['".$row["duree_offer"]."', ".$row["number"]."],";
                          }
                          ?>
                     ]);
                var options = {
                      title: 'A ghraph showing  approximatly the duration of the offers to give you a general idea on our progresss' +
                          '',
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