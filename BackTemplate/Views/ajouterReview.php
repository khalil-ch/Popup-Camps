<?php
    include_once '../Model/Review.php';
    include_once '../Controller/ReviewC.php';

    $error = "";

    // create user
    $review = null;

    // create an instance of the controller
    $reviewC = new ReviewC();
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
                $_GET['NomCampRv'],
                $_POST['user'],
                $_POST['comment'],
            );
            $reviewC->ajouterReview($review);
            header('Location:index.php');
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
    <title>Reviews Add</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
    <body>
        <button><a href="afficherReviews.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
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
    </body>
</html>