<?php
include_once '../Model/offer.php';
include_once '../Controller/offer1.php';
include "../Views/includes/header.php";
include "../Views/includes/leftbar.php";
$error = "";

// create user
$offer = null;

// create an instance of the controller
$offer1 = new offer1();
if (isset($_POST["id_offer"]) &&
    isset($_POST["nom_offer"]) &&
    isset($_POST["type_offer"]) &&
    isset($_POST["date_offer"]) &&
    isset($_POST["duree_offer"]) )
{
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
        $offer1->ajouterOffer($offer);
        header('Location:afficherOffer.php');

    }
    else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">



    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
    </script>

    <title> Ajouter Offre</title>
    <link rel="stylesheet" href="./vendors/style/style.css">
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
        }
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 6px solid #ddd;
        }

    </style>




</head>
<body>

<div class="ts-main-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="Add Offer bk-img">
                    <div class="form-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-20">
                                    <h1 class="text-center text-bold mt-2x">Add Offer</h1>
                                    <div class="hr-dashed"></div>
                                    <div class="well row pt-2x pb-3x bk-light text-center">



    <?php include('includes/leftbar.php');?>

<hr>

<div id_offer="error">
    <?php echo $error; ?>
</div>
  <form  method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">

      <div class="form-group">
    <table border="1" align="center">

        <tr>
            <td rowspan='5' colspan='1'>List Des Offres</td>
            <td>
                <label class="col-sm-1 control-label" for="id_offer">ID:<span style="color:red">*</span></label>
                <div class="col-sm-5">
            </td>
            <td><input type="number" name="id_offer" id_offer="id_offer" maxlength="20" class="form-control" required></td>
        </tr>
        <tr>
            <td>
                <label class="col-sm-1 control-label" for="nom_offer">Nom d'offre:<span style="color:red">*</span></label>
                <div class="col-sm-5">
            </td>
            <td>
                <input type="text" name="nom_offer" id_offer="nom_offer" maxlength="30" class="form-control" required>
            </td>
        </tr>
        <tr>
            <td>
                <label class="col-sm-1 control-label" for="type_offer">Choose offer:<span style="color:red">*</span></label>
                <div class="col-sm-5">
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
                <label class="col-sm-1 control-label" for="date_offer">Date d'offre:
                    <span style="color:red">*</span>
                </label>
                <div class="col-sm-5">
            </td>
            <td>
                <input type="date" id_offer="date_offer" name="date_offer"
                       value="year-month-day"
                       min="2021-01-01" max="2027-12-31" class="form-control" required>
        <tr>
            <td>
                <label class="col-sm-1 control-label" for="duree_offer">duree d'offer: <span style="color:red">*</span></label>
                <div class="col-sm-5">
            </td>
            <td>
                <input type="number" name="duree_offer" id_offer="duree_offer" maxlength="30" class="form-control" required>
            </td>
        </tr>

            <td>

                <button  class="btn btn-primary" type="submit">Envoyer</button>

            </td>
            <td>
                <button class="btn btn-primary" type="reset">Annuler</button>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
