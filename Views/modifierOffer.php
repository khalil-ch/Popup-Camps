<?php
include "../Controller/offer1.php";
include_once '../Model/offer.php';

session_start();
$offer1 = new offer1();
$error = "";



if  (  isset($_POST["id_offer"]) &&   !empty($_POST["id_offer"]) &&
    isset($_POST["name_offer"]) && !empty($_POST["name_offer"]) &&
    isset($_POST["type_offer"]) && !empty($_POST["type_offer"]) &&
    isset($_POST["date_offer"]) && !empty($_POST["date_offer"]) &&
    isset($_POST["duree_offer"]) && !empty($_POST["duree_offer"]) ){
// On nettoie les données envoyées
$id_offer = strip_tags($_POST['id_offer']);
$nom_offer = strip_tags($_POST['nom_offer']);
$type_offer = strip_tags($_POST['type_offer']);
$date_offer = strip_tags($_POST['date_offer']);
$duree_offer = strip_tags($_POST['duree_offer']);

$sql = 'UPDATE offer SET nom_offer=:nom_offer, type_offer=:type_offer, date_offer=:date_offer , duree_offer=:duree_offer WHERE id_offer=:id_offer;';

$query = $db->prepare($sql);

$query->bindValue(':id_offer', $id_offer, PDO::PARAM_INT);
$query->bindValue(':nom_offer', $nom_offer, PDO::PARAM_STR);
$query->bindValue(':type_offer', $type_offer, PDO::PARAM_STR);
$query->bindValue(':date_offeer', $date_offer, PDO::PARAM_STR);
$query->bindValue(':duree_offer', $duree_offer, PDO::PARAM_INT);

$query->execute();

    $offer1->modifierOffer($offer, $_GET['id_offer']);
    header('refresh:5;url=afficherOffer.php');
$_SESSION['message'] = "Produit modifié";}
else  ( $error = "Missing information" );

?>

<html>
<head>
    <title>Modifier offer</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
<button><a href="afficherOffer.php">Retour à la liste</a></button>
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
                <td rowspan='5' colspan='1'>Fiche offer</td>
                <td>
                    <label for="id_offer">id_offer:
                    </label>
                </td>
                <td><input type="number" name="id_offer" id_offer="id_offer" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="nom_offer">Nom d'offre:</label>
                </td>
                <td>
                    <input type="text" name="nom_offer" id_offer="nom_offer" maxlength="30">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="type_offer">Choose offer:</label>
                </td>
                <td>
                    <select name="type_offer" id="type_offer">
                        <option value="">--Please choose an option--</option>
                        <option value="Earth Day">Earth Day</option>
                        <option value="Mothers Day">Mothers Day</option>
                        <option value="LGBTQIA+ Day">LGBTQ++ Day</option>
                        <option value="Lovers Day">Lovers Day</option>
                        <option value="Animal's Day">Animal's Day</option>
                        <option value="goldfish Day">goldfish Day</option>
                    </select>

                </td>
            </tr>
            <tr>
                <td>
                    <label for="date_offer">Date d'offre:
                    </label>
                </td>
                <td>
                    <input type="date" id_offer="date_offer" name="date_offer"
                           value="year-month-day"
                           min="2021-01-01" max="2027-12-31">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="duree_offer">duree d'offer:</label>
                </td>
                <td>
                    <input type="number" name="duree_offer" id_offer="duree_offer" maxlength="30">
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