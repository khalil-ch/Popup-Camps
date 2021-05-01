<?php
include "../Controller/promo1.php";
include_once '../Model/promo.php';

session_start();
$promo1 = new promo1();
$error = "";



if  (  isset($_POST["id_promo"]) &&   !empty($_POST["id_promo"]) &&
    isset($_POST["name_promo"]) && !empty($_POST["name_promo"]) &&
    isset($_POST["type_promo"]) && !empty($_POST["type_promo"]) &&
    isset($_POST["duree_promo"]) && !empty($_POST["duree_promo"]) ){
// On nettoie les données envoyées
    $id_promo = strip_tags($_POST['id_promo']);
    $nom_promo = strip_tags($_POST['nom_promo']);
    $type_promo = strip_tags($_POST['type_promo']);
    $duree_promo = strip_tags($_POST['duree_promo']);

    $sql = 'UPDATE promo SET nom_promo=:nom_promo, type_promo=:type_promo , duree_promo=:duree_promo WHERE id_promo=:id_promo;';

    $query = $db->prepare($sql);

    $query->bindValue(':id_promo', $id_promo, PDO::PARAM_INT);
    $query->bindValue(':nom_promo', $nom_promo, PDO::PARAM_STR);
    $query->bindValue(':type_promo', $type_promo, PDO::PARAM_STR);
    $query->bindValue(':duree_promo', $duree_promo, PDO::PARAM_INT);

    $query->execute();

    $offer1->modifierPromo($promo, $_GET['id_promo']);
    header('refresh:5;url=afficherPromo.php');
    $_SESSION['message'] = "Produit modifié";}
else  ( $error = "Missing information" );

?>
    <html>
    <head>
        <title>Modifier Produit</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/style.css">
    </head>
<body>
    <button><a href="afficherPromo.php">Retour à la liste</a></button>
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
                <td rowspan='5' colspan='1'>Fiche offer</td>
                <td>
                    <label for="id_promo">id_offer:
                    </label>
                </td>
                <td><input type="number" name="id_promo" id_offer="id_promo" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="nom_promo">Nom de Promo:</label>
                </td>
                <td>
                    <input type="text" name="nom_promo" id_promo="nom_promo" maxlength="30">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="type_promo">Choose Promo:</label>
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
                    <label for="duree_promo">duree de promotion:</label>
                </td>
                <td>
                    <input type="number" name="duree_promo" id_promo="duree_promo" maxlength="30">
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Envoyer">
                </td>
                <td>
                    <input type="reset" value="Annuler" >
                </td>
            </tr>
        </table>
    </form>
    </body>
    </html>
    <?php
}
?>