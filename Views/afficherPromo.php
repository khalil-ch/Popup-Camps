<?PHP
include "../Controller/promo1.php";

$promo1=new promo1();
$list1=$promo1->afficherPromo();

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Afficher Liste Des Promotion </title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
<button><a href="connexionP.php">Ajouter la Promotion</button>
<hr>
<table border=1 align = 'center'>
    <tr>
        <th>ID Promotion</th>
        <th>Nom Promotion</th>
        <th>Type Promotion</th>
        <th>Duree Promotion</th>
        <th>Supprimer </th>
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
                    <button type="submit">Supprimer</button>
                    <input type="hidden" value=<?PHP echo $promo['id_promo']; ?> name="id_promo">
                </form>
            </td>
            <td>
                <a href="modifierPromo.php?id_promo=<?PHP echo $promo['id_promo']; ?>"> Modifier </a>
            </td>
        </tr>
        <?php
    }
    ?>