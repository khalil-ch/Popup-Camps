<?php
include_once '../Model/promo.php';
include_once '../Controller/promo1.php';

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ajouter Promotion </title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
<button><a href="afficherPromo.php">Retour à la liste</a></button>
<hr>

<div id_promo="error">
    <?php echo $error; ?>
</div>

<form action="" method="POST">
    <table border="1" align="center">

        <tr>
            <td rowspan='4' colspan='1'>List Des Promotions</td>
            <td>
                <label for="id_promo">ID De Promotion:</label>
            </td>
            <td><input type="number" name="id_promo" id_promo="id_promo" maxlength="20"></td>
        </tr>
        <tr>
            <td>
                <label for="nom_promo">Nom de Promotion:</label>
            </td>
            <td>
                <input type="text" name="nom_promo" id_offer="nom_promo" maxlength="30">
            </td>
        </tr>
        <tr>
            <td>
                <label for="type_promo">Type de promotion:</label>
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

