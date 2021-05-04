<?PHP
	include "../Controller/fournisseurC.php";

	$fournisseur=new fournisseurC();
	$listeF=$fournisseur->afficherFournisseur();

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
				<h2 class="page-title">Manage suppliers</h2>					 	
				<!-- basic table  Start -->				
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-center">
							<h4 class="text-blue h4">list suppliers </h4>
						<div class="pull-center">					
						<a class="button button2" href="connexion.php">add supplier</a>
						
		 <table >
			<tr>
				<th>Identifiant</th>
				<th>Service type</th>
				<th>Phone number</th>
				<th>RIB</th>
			</tr>
		
			<?php
				foreach($listeF as $fournisseur){
			?>
				<tr>
					<td><?php echo $fournisseur['id_f']; ?></td>
					<td><?php echo $fournisseur['type_service_f']; ?></td>
					<td><?php echo $fournisseur['telephone_f']; ?></td>
					<td><?php echo $fournisseur['RIB_f']; ?></td>
					<td>
						<form method="POST" action="supprimerFournisseur.php">
						<button class="button button2">delete</button>
						<input type="hidden" value=<?PHP echo $fournisseur['id_f']; ?> name="id_f">
						</form>
					</td>
					<td>
						<a href="modifierFournisseur.php?id_f=<?PHP echo $fournisseur['id_f']; ?>"> Modifier </a>
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
	<script src="controle.js"></script>
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