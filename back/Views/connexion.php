<?php
    include_once '../Model/fournisseur.php';
    include_once '../Controller/fournisseurC.php';

    $error = "";

    // create user
    $fournisseur = null;

    // create an instance of the controller
    $fournisseurC = new fournisseurC();
    session_start();
    error_reporting(0);
    if(strlen($_SESSION['alogin'])==0)
      {	
    header('location:index.php');
    }
    else{
    if (
        isset($_POST["id_f"]) && 
        isset($_POST["type_service_f"]) &&
        isset($_POST["telephone_f"]) && 
        isset($_POST["RIB_f"]) 
    ) {
        if (
            !empty($_POST["id_f"]) && 
            !empty($_POST["type_service_f"]) && 
            !empty($_POST["telephone_f"]) && 
            !empty($_POST["RIB_f"]) 
        ) {
            $fournisseur = new fournisseur(
                $_POST['id_f'],
                $_POST['type_service_f'], 
                $_POST['telephone_f'],
                $_POST['RIB_f'],
            );
            $fournisseurC->ajouterfournisseur($fournisseur);
            header('Location:afficherFournisseur.php');
        }
        else
            $error = "Missing information";
    }
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
button{
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
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-center">
							<h4 class="text-blue h4">Add supplier </h4>
					<a href="afficherFournisseur.php">back to list</a>
	
        <hr>
        <div id_f="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table>

                <tr>
                    <td rowspan='4' colspan='1'>SUPPLIER FORM</td>
                    <td>
                        <label for="id_f">ID:
                        </label>
                    </td>
                    <td><input type="text" name="id_f" id_f="id_f" maxlength="10"></td>
                </tr>
                <tr>
                    <td>
                        <label for="type_service_f">Service type:
                        </label>
                    </td>
                    <td><input type="text" name="type_service_f" id_f="type_service_f" maxlength="20"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="telephone_f">Phone number:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="telephone_f" id_f="telephone_f"  placeholder="12-345-678" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="RIB_f">RIB:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="RIB_f" id_f="RIB_f" length="14">
                    </td>               
                <tr>

                <tr>
                    <td></td>
					<td>
                    <td>
                    <input type="submit" value="submit" onclick="verif();">
                    </td>
                    <td>
                    <input type="reset" value="reset">
                    </td>
                </tr>
            </table>
        </form> 

				<!-- basic table  End -->
			
		</div>
	</div>
	<!-- js -->
    <script src="controleF.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>