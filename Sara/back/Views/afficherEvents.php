<?PHP
	require_once "../Controller/eventC.php";

	$eventC =new eventC();
	$rows=$eventC->afficherEvent();
	
?>

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Manage suppliers</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>

.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
table {
  border-collapse: collapse;
  width: 100%;
  table-layout: auto;
}
th {
background-color: #4c75af;
color: white;
padding: 8px
height: 70px;
} 
td {
  padding: 8px;
  text-align: left;
  border-bottom: 4px solid #ddd;
}
tr:hover {background-color:#f5f5f5;}
.button {
  background-color: #4c75af; /* blue */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}
.button2:hover {
  box-shadow: 0  12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

h2 {
  color: black;
  text-align: center;
}
h4 {
  text-align: center;
}
a:active {
  color: blue;
}

		</style>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
				<h2 class="page-title">Manage events</h2>	
				<a href = "searchEvent.php" class="btn btn-primary shop-item-button">Search</a>				 	
				<!-- basic table  Start -->				
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-center">
							<h4 class="text-blue h4">list events </h4>
						
		<hr>
		<table class="table">
			<thead>
			<tr>
				<th>ID</th>
				<th>Nom</th>
				<th>Image</th>
				<th>Date</th>
				<th>Description</th>
				<th>plus d'info</th>
			</tr>
			</thead>
		<tbody>
		
		<a href="addEvent.php" class="btn btn-primary" style="margin-right:20px">add event</a>		
		<br>
		<br>
	
			

		<?php
			foreach($rows as $row){
				?>
				<tr>
					<td><?php echo $row['idEvent']; ?></td>
					<td><?php echo $row['nom_E']; ?></td>
                    <td><img width="50" height="50" src="assets/<?=$row['image_E']?>"> </td>
					<td><?php echo $row['date_E']; ?></td>
					<td><?php echo $row['description_E']; ?></td>					
					
					<td><a class="btn btn-info" href="modifierEvent.php?idEvent=<?php echo $row['idEvent']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="supprimerEvent.php?idEvent=<?php echo $row['idEvent']; ?>">Delete</a>
					
					</td>
					<td>
							<a class="btn btn-primary" href="afficherEvent.php?idEvent=<?php echo $row['idEvent']; ?>">see event</a>
					</td>
					</tr>	
				<!-- basic table  End -->

	<!-- js -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
		</script>
</body>
</html>
<?php } ?>