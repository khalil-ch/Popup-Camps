<?php
include "../Controller/offer1.php";
include_once '../Model/offer.php';
include "../views/includes/header.php";
include "../Views/includes/leftbar.php";
session_start();
$offer1 = new offer1();
$error = "";



if (
    isset($_POST["id_offer"]) &&
    isset($_POST["nom_offer"]) &&
    isset($_POST["type_offer"]) &&
    isset($_POST["date_offer"]) &&
    isset($_POST["duree_offer"])
) {
    if (
        !empty($_POST["id_offer"]) &&
        !empty($_POST["nom_offer"]) &&
        !empty($_POST["type_offer"]) &&
        !empty($_POST["date_offer"]) &&
        !empty($_POST["duree_offer"])
    ) {
        $offer = new offer(
            $_POST['id_offer'],
            $_POST['nom_offer'],
            $_POST['type_offer'],
            $_POST['date_offer'],
            $_POST['duree_offer']
        );

        $offer1->modifierOffer($offer, $_GET['id_offer']);

    }
    else
        $error = "Missing information";
}

?>

<html>
<head>
    <title>Edit Promotions</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style/style.css">

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
									<div class="panel-heading">Edit The Offers</div>
									<form method="post" class="form-horizontal" enctype="multipart/form-data" name="imgform">
                              <div class="form-group">


<button><a class="form-control" href="afficherOffer.php">*   Back to The Main List</a></button>
<hr>

<div id_offer="error">
    <?php echo $error; ?>
</div>

<?php
if (isset($_GET['id_offer'])){
    $offer = $offer1->recupererOffer($_GET['id_offer']);

    ?>
    <form action="" method="POST">
        <table align="center" border="1">
            <tr>
                <td rowspan='5' colspan='1'>** Offer List</td>
                <td>
                    <label class="col-sm-2 control-label" for="id_offer">ID:<span style="color:red">*</span>
                    </label>
                     <div class="col-sm-4">
                </td>
                <td><input type="number" name="id_offer" id_offer="id_offer" class="form-control" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label class="col-sm-2 control-label" for="nom_offer">Offer Name:<span style="color:red">*</span></label>
                <div class="col-sm-4">
                </td>
                <td>
                    <input type="text" name="nom_offer" id_offer="nom_offer" class="form-control" maxlength="30">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="col-sm-2 control-label" for="type_offer">Choose offer:<span style="color:red">*</span></label>
        <div class="col-sm-4">
                </td>
                <td>
                    <select name="type_offer" id="type_offer">
                        <option value="">--Please choose an option--</option>
                        <option value="Earth Day">Earth Day</option>
                        <option value="Mothers Day">Mothers Day</option>
                        <option value="LGBTQ++ Day">LGBTQ++ Day</option>
                        <option value="Lovers Day">Lovers Day</option>
                        <option value="Animal's Day">Animal's Day</option>
                        <option value="goldfish Day">goldfish Day</option>
                    </select>

                </td>
            </tr>
            <tr>
                <td>
                    <label  class="col-sm-2 control-label" for="date_offer">Offer Date:<span style="color:red">*</span>
                    </label>
                <div class="col-sm-4">
                </td>
                <td>
                    <input type="date" id_offer="date_offer"class="form-control" name="date_offer"
                           value="year-month-day"
                           min="2021-01-01" max="2027-12-31">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="col-sm-2 control-label" for="duree_offer">Duration:<span style="color:red">*</span></label>
                 <div class="col-sm-4">
                </td>
                <td>
                    <input type="number" name="duree_offer" id_offer="duree_offer"class="form-control" maxlength="30">
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