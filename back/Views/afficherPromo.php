<?PHP
include "../Controller/promo1.php";
include "../Views/includes/header.php";
include "../includes/leftbar.php";

$promo1=new promo1();
$list1=$promo1->afficherPromo();

?>
<html>
<head>

 <meta charset="UTF-8">
    <!-- Site favicon -->

    <!-- Google Font -->





    <link rel="stylesheet" href="vendors/styles/style.css">
    <script type="text/javascript">

    </script>

    <style>

        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #dd3d36;
            color:#4d84a4;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap{
            padding: 10px;
            margin: 0 0 20px 0;
            background: #4d84a4;
            color:#4d84a4;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: auto;
        }
        th {
            background-color: #4e9693;
            color: white;
            padding: 8px
        }
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 6px solid #4d84a4;
        }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Afficher Liste Des Promotion </title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
    </script>
</head>
<body>
<div class="ts-main-content">

<?php include('includes/leftbar.php');?>

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
<div class="hr-dashed"></div>
<div class="well row pt-2x pb-3x bk-light text-center">
    <form  method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
        <div class="form-group">


                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="page-title">List of All The Promotions</h2>
                                <!-- basic table  Start -->
                                <div class="pd-20 card-box mb-30">
                                    <div class="clearfix mb-20">
                                        <div class="pull-center">

                                            <div class="pull-center">
                                                <button><a class="btn btn-primary" href="connexionP.php">Add Promotions</a></button>
<hr>

<hr>
<table border=1 align = 'center'>
    <tr>
        <th class="table-plus datatable-nosort">ID Promotion</th>
        <th>Promotions Name</th>
        <th>Promotions Type</th>
        <th>Promotion Duration</th>
        <th class="datatable-nosort">Delete</th>
        <th>Modifier</th>
    </tr>

    <?php
    foreach($list1 as $promo){
        ?>
        <tr>
            <td><?php echo $promo['id_promo']; ?></td>
            <td><?php echo $promo['nom_promo']; ?></td>
            <td><?php echo $promo['type_promo']; ?></td>
            <td><?php echo $promo['duree_promo']; ?></td>

            <td>
                <form method="POST" action="supprimerPromo.php">
                     <button class="btn btn-primary" name="submit" type="submit">Supprimer</button>
                    <input type="hidden" value=<?PHP echo $promo['id_promo']; ?> name="id_promo">
                </form>
            </td>
            <td>
                <a href="modifierPromo.php?id_promo=<?PHP echo $promo['id_promo']; ?>"> Modifier </a>
            </td>
        </tr>
         <!-- Loading Scripts -->
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
        <?php
    }

    ?>