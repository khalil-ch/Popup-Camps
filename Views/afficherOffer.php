<?PHP
include "../Controller/offer1.php";
include "../Views/includes/header.php";
include "../Views/includes/leftbar.php";
$offer1=new offer1();
$list=$offer1->afficherOffer();

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

<hr>

<div class="hr-dashed"></div>
<div class="well row pt-2x pb-3x bk-light text-center">
    <form  method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
        <div class="form-group">


                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="page-title">List of All The Offers</h2>
                                <!-- basic table  Start -->
                                <div class="pd-20 card-box mb-30">
                                    <div class="clearfix mb-20">
                                        <div class="pull-center">

                                            <div class="pull-center">
                                                <button><a class="btn btn-primary" href="connexion.php">Add Offer</a></button>
<table >

    <tr>
        <th class="table-plus datatable-nosort">Offer ID</th>
        <th>Offer Name</th>
        <th>Offer Type</th>
        <th>Offer Date</th>
        <th>Offer Duration</th>
        <th class="datatable-nosort">Delete </th>
        <th>Edit</th>
    </tr>

    <?php
    foreach($list as $offer){
        ?>
        <tr>
            <td><?php echo $offer['id_offer']; ?></td>
            <td><?php echo $offer['nom_offer']; ?></td>
            <td><?php echo $offer['type_offer']; ?></td>
            <td><?php echo $offer['date_offer']; ?></td>
            <td><?php echo $offer['duree_offer']; ?></td>

            <td>
                <form method="POST" action="supprimerOffer.php">
                    <button class="btn btn-primary" name="submit" type="submit">Supprimer</button>
                    <input type="hidden" value=<?PHP echo $offer['id_offer']; ?> name="id_offer">
                </form>
            </td>
            <td>

                <a href="modifierOffer.php?id_offer=<?PHP echo $offer['id_offer']; ?>"> Modifier </a>
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