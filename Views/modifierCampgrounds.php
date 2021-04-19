<?php
	include "../Controller/CampgroundC.php";
	include_once '../Model/Campground.php';

	$campgroundC = new CampgroundC();
	$error = "";
	
    if (
        isset($_POST["id"]) && 
        isset($_POST["prix"]) &&
        isset($_POST["emplacement"]) && 
        isset($_POST["description"]) && 
        isset($_POST["duree"]) && 
        isset($_POST["proprietaire"])
    ) {
        if (
            !empty($_POST["id"]) && 
            !empty($_POST["prix"]) && 
            !empty($_POST["emplacement"]) && 
            !empty($_POST["description"]) && 
            !empty($_POST["duree"]) && 
            !empty($_POST["proprietaire"])
        ) {
            $campground = new Campground(
                $_POST['id'],
                $_POST['prix'], 
                $_POST['emplacement'],
                $_POST['description'],
                $_POST['duree'],
                $_POST['proprietaire']
			);
			
            $campgroundC->modifierCampgrounds($campground, $_GET['idProduit']);
            header('refresh:5;url=afficherCampgrounds.php');
        }
        else
            $error = "Missing information";
	}

?>
<html>
	<head>
		<title>Modifier Campground</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/style.css">
    </head>
	<body>
		<button><a href="afficherCampgrounds.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		
		<?php
			if (isset($_GET['idProduit'])){
				$campground = $campgroundC->recupererCampgrounds($_GET['idProduit']);
				
		?>
		<form action="" method="POST">
            <table align="center" border="1">
            <tr>
                    <td rowspan='6' colspan='1'>Fiche Camping</td>
                    <td>
                        <label for="id">id:
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" maxlength="20"></td>
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