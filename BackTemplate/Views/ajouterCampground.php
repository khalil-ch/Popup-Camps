<?php
    include_once '../Model/Campground.php';
    include_once '../Controller/CampgroundC.php';

    $error = "";

    // create user
    $campground = null;

    // create an instance of the controller
    $campgroundC = new CampgroundC();
    if (
        isset($_POST["prix"]) &&
        isset($_POST["nomCamp"]) &&
        isset($_POST["imageCamp"]) &&
        isset($_POST["emplacement"]) && 
        isset($_POST["description"]) && 
        isset($_POST["duree"]) && 
        isset($_POST["proprietaire"])
    ) {
        if (
            !empty($_POST["prix"]) && 
            !empty($_POST["nomCamp"]) && 
            !empty($_POST["imageCamp"]) && 
            !empty($_POST["emplacement"]) && 
            !empty($_POST["description"]) && 
            !empty($_POST["duree"]) && 
            !empty($_POST["proprietaire"])
        ) {
            $campground = new Campground(
                $_POST['nomCamp'], 
                $_POST['imageCamp'],
                $_POST['prix'], 
                $_POST['emplacement'],
                $_POST['description'],
                $_POST['duree'],
                $_POST['proprietaire']
            );
            $campgroundC->ajouterCampground($campground);
            header('Location:../Views/afficherCampgrounds.php');
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
    <title>Campgrounds Add</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
    <body>
        <button><a href="/Back template/view/index.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">

                <tr>
                    <td rowspan='6' colspan='1'>Fiche Camping</td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">Prix:
                        </label>
                    </td>
                    <td><input type="number" name="prix" id="prix" maxlength="4"></td>
                </tr>
                <tr>
                    <td>
                        <label for="emplacement">Nom Camping:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="nomCamp" id="nomCamp" maxlength="30">
                    </td>
                </tr>     
                <tr>
                    <td>
                        <label for="imageCamp">Image Camping:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="imageCamp" id="imageCamp" maxlength="30">
                    </td>
                </tr>     
                <tr>
                    <td>
                        <label for="emplacement">Emplacement:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="emplacement" id="emplacement" maxlength="30">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description">Description:
                        </label>
                    </td>
                    <td>
                        <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="duree">Duree:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="duree" id="duree">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="proprietaire">Proprietaire:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="proprietaire" id="proprietaire">
                    </td>
                </tr>
                
                <tr>
                    <td></td>
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