<?php
include "../Controller/promo1.php";
include_once '../Model/promo.php';
include "../views/includes/header.php";
include "../Views/includes/leftbar.php";
$promo1 = new promo1();
$error = "";



if (
    isset($_POST["id_promo"]) &&
    isset($_POST["nom_promo"]) &&
    isset($_POST["type_promo"]) &&
    isset($_POST["duree_promo"])
) {
    if (
        !empty($_POST["id_promo"]) &&
        !empty($_POST["nom_promo"]) &&
        !empty($_POST["type_promo"]) &&
        !empty($_POST["duree_promo"])
    ) {

        $promo = new promo(
            $_POST['id_promo'],
            $_POST['nom_promo'],
            $_POST['type_promo'],
            $_POST['duree_promo']
        );

        $promo1->modifierPromo($promo, $_GET['id_promo']);

    }
    else
        $error = "Missing information";
}
?>
    <html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/style.css">
        <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Edit Promotion</title>

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

	<script type= "text/javascript" src="../vendor/countries.js"></script>
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
		</style>
</head>



<body>

    
	<div class="ts-main-content">


	<div class="content-wrapper">
		<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Edit The Promotions</div>
									<form method="post" class="form-horizontal" enctype="multipart/form-data" name="imgform">
                              <div class="form-group">
    <button><a class="form-control" href="afficherPromo.php">Back To The Main List</a></button>
    <hr>

    <div id_offer="error">
        <?php echo $error; ?>
    </div>

<?php
if (isset($_GET['id_promo'])){
    $promo = $promo1->recupererPromo($_GET['id_promo']);

    ?>
    <form action="" method="POST">
        <table align="center" border="1">
            <tr>
                <td rowspan='5' colspan='1' >** Promotion details</td>
                <td>
                    <label class="col-sm-2 control-label" for="id_promo">ID:<span style="color:red">*</span>
                    </label>
                    <div class="col-sm-4">
                </td>
                <td><input type="number" name="id_promo" id_offer="id_promo" class="form-control"  maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label class="col-sm-2 control-label" for="nom_promo">Promotion Name:<span style="color:red">*</span></label>
                 <div class="col-sm-4">
                </td>
                <td>
                    <input type="text" name="nom_promo" id_promo="nom_promo" class="form-control"maxlength="30">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="col-sm-2 control-label"  for="type_promo">Promotions Type:<span style="color:red">*</span></label>
                   <div class="col-sm-4">
                </td>
                <td>
                    <select name="type_promo" id="type_promo">
                        <option value="">--les options--</option>
                        <option value="10%">10%</option>
                        <option value="20%">20%</option>
                        <option value="30%">30%</option>
                        <option value="40%">40%</option>
                        <option value="50%">50%</option>
                        <option value="60%">60%</option>
                    </select>

                </td>
            </tr>
            <tr>
                <td>
                    <label class="col-sm-2 control-label" for="duree_promo">duree de promotion:<span style="color:red">*</span></label>
                <div class="col-sm-4">
                </td>
                <td>
                    <input type="number" name="duree_promo" id_promo="duree_promo" class="form-control" maxlength="30">
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input class="form-control" type="submit" value="Envoyer">
                </td>
                <td>
                    <input class="form-control" type="reset" value="Annuler" >
                </td>
            </tr>
        </table>
    </form>
    </body>
    </html>
    <?php
}
?>