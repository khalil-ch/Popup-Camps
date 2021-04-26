<?php
    include_once '../Model/fournisseur.php';
    include_once '../Controller/fournisseurC.php';

    $error = "";

    // create user
    $fournisseur = null;

    // create an instance of the controller
    $fournisseurC = new fournisseurC();
    if (
        isset($_POST["id_f"]) && 
        isset($_POST["type_service_f"]) &&
        isset($_POST["telephone_f"]) && 
        isset($_POST["RIB_f"]) 
    ) {
        if (
            !empty($_POST["id_f"]) && 
            !empty($_POST["type_service_f"]) && 
            !empty($_POST["telephone_f"]) && 
            !empty($_POST["RIB_f"]) 
        ) {
            $fournisseur = new fournisseur(
                $_POST['id_f'],
                $_POST['type_service_f'], 
                $_POST['telephone_f'],
                $_POST['RIB_f'],
            );
            $fournisseurC->ajouterfournisseur($fournisseur);
            header('Location:afficherFournisseur.php');
        }
        else
            $error = "Missing information";
    }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fournisseur liste</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
    <body>
        <button><a href="afficherFournisseur.php">Retour à la liste</a></button>
        <hr>
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">

                <tr>
                    <td rowspan='6' colspan='1'>Fiche fournisseur</td>
                    <td>
                        <label for="id_f">Identifiant:
                        </label>
                    </td>
                    <td><input type="text" name="id_f" id_f="id_f" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="type_service_f">Type de service:
                        </label>
                    </td>
                    <td><input type="text" name="type_service_f" id_f="type_service_f" maxlength="50"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="telephone_f">Telephone:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="telephone_f" id_f="telephone_f" maxlength="8">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="RIB_f">RIB:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="RIB_f" id_f="RIB_f" maxlength="23">
                    </td>               
                <tr>

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