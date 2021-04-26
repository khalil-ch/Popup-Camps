<?php
	include "../Controller/fournisseurC.php";
	include_once '../Model/fournisseur.php';

	$fournisseurC = new fournisseurC();
	$error = "";
	
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
                $_POST['RIB_f']
			);
			
            $fournisseurC->modifierFournisseur($fournisseur, $_GET['id_f']);
            header('refresh:5;url=afficherFournisseur.php');
        }
        else
            $error = "Missing information";
	}

?>
<html>
	<head>
		<title>Modifier fournisseur</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/style.css">
    </head>
	<body>
		<button><a href="afficherFournisseur.php">Retour à la liste</a></button>
        <hr>
        
        <div id_f="error">
            <?php echo $error; ?>
        </div>
		
		<?php
			if (isset($_GET['id_f'])){
				$fournisseur = $fournisseurC->recupererFournisseur($_GET['id_f']);
				
		?>
		<form action="" method="POST">
            <table align="center" border="1">
            <tr>
                    <td rowspan='6' colspan='1'>Fiche Fournisseur</td>
                    <td>
                        <label for="id_f">Identifiant:
                        </label>
                    </td>
                    <td><input type="text" name="id_f" id_f="id_f" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="type_service_f">Type Service:
                        </label>
                    </td>
                    <td><input type="text" name="type_service_f" id_f="type_service_f" maxlength="4"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="telephone_f">telephone:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="telephone_f" id_f="telephone_f" maxlength="30">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="RIB_f">RIB:
                        </label>
                    </td>
                    <td>
                    <input type="text" name="RIB_f" id_f="RIB_f" maxlength="30">
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
		<?php
		}
		?>
	</body>
</html>