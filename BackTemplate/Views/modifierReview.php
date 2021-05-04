<?php
	include "../Controller/ReviewC.php";
	include_once '../Model/Review.php';

	$reviewC = new ReviewC();
	$error = "";
	
    if (
        isset($_POST["note"]) &&
        isset($_POST["user"]) && 
        isset($_POST["comment"])
    ) {
        if (
            !empty($_POST["note"]) && 
            !empty($_POST["user"]) && 
            !empty($_POST["comment"])
        ) {
            $review = new Review(
                0,
                $_POST['note'],
                $_POST['user'],
                $_POST['comment'],
            );
            $reviewC->modifierReview($review, $_GET['idReview']);
            header('refresh:5;url=afficherReviews.php');
        }
        else
            $error = "Missing information";
    }

?>
<html>
	<head>
		<title>Modifier Review</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/style.css">
    </head>
	<body>
		<button><a href="afficherReviews.php">Retour à la liste</a></button>
        <hr>
        <div id="error">
            <?php echo $error; ?>
        </div>
		<?php
			if (isset($_GET['idReview'])){
				$review = $reviewC->recupererReview($_GET['idReview']);
		?>
		<form action="" method="POST">
            <table align="center" border="1">
            <tr>
                    <td rowspan='6' colspan='1'>Ajouter Avis</td>
                </tr>
                <tr>
                    <td>
                        <label for="note">note:
                        </label>
                    </td>
                    <td><input type="number" name="note" id="note" maxlength="2"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="user">User:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="user" id="user" maxlength="30">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="comment">Comment:
                        </label>
                    </td>
                    <td>
                        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
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
		<?php
		}
		?>
	</body>
</html>