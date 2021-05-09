<?php
include_once '../Model/promo.php';
include_once '../Controller/promo1.php';
include "../Views/includes/header.php";
include "../Views/includes/leftbar.php";
$error = "";

// create user
$promo = null;

// create an instance of the controller
$promo1 = new promo1();
if (isset($_POST["id_promo"]) &&
    isset($_POST["nom_promo"]) &&
    isset($_POST["type_promo"]) &&
    isset($_POST["duree_promo"]) )
{
    if (
        !empty($_POST["id_promo"]) &&
        !empty($_POST["nom_promo"]) &&
        !empty($_POST["type_promo"]) &&
        !empty($_POST["duree_promo"])
    ) {
        $promo= new promo(
            $_POST['id_promo'],
            $_POST['nom_promo'],
            $_POST['type_promo'],
            $_POST['duree_promo']
        );
        $promo1->ajouterPromo($promo);
        header('Location:afficherPromo.php');

    }
    else
        $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
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

    <meta charset="UTF-8">

    <title> Ajouter Promotion </title>

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
                <div class="Add promo bk-img">
                    <div class="form-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-20">
                                    <h1 class="text-center text-bold mt-2x">Add Promotions</h1>
                                    <div class="hr-dashed"></div>
                                    <div class="well row pt-2x pb-3x bk-light text-center">


                                        <?php include('includes/leftbar.php');?>
 <hr>

<div id_promo="error">
    <?php echo $error; ?>
</div>
 <form  method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
              <div class="form-group">
      <table border="1" align="center">



        <tr>
            <td rowspan='4' colspan='1'>List Des Promotions</td>
            <td>
                <label  class="col-sm-1 control-label" for="id_promo">ID Promotion:<span style="color:red">*</span></label>
                <div class="col-sm-5">
            </td>
            <td><input type="number" name="id_promo" id_promo="id_promo" maxlength="20" class="form-control" required></td>
        </tr>
        <tr>
            <td>
                <label class="col-sm-1 control-label" for="nom_promo">Nom de Promotion:<span style="color:red">*</label>
                <div class="col-sm-5">
            </td>
            <td>
                <input type="text" name="nom_promo" id_offer="nom_promo" maxlength="30" class="form-control" required>
            </td>
        </tr>
        <tr>
            <td>
                <label class="col-sm-1 control-label" for="type_promo">Type de promotion:<span style="color:red">*</label>
                <div class="col-sm-5">
            </td>
            <td>
                <select name="type_promo" id="type_promo" class="form-control" required>
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
                <label class="col-sm-1 control-label" for="duree_promo">duree de promotion:<span style="color:red">*</label>
                <div class="col-sm-5">
            </td>
            <td>
                <input type="number" name="duree_promo" id_promo="duree_promo" maxlength="30" class="form-control" required>
            </td>
        </tr>

        <td>
            <button type="submit">Envoyer</button>
        </td>
        <td>
            <button type="reset">Annuler</button>
        </td>
        </tr>
    </table>
</form>
</body>
</html>

