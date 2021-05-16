<?PHP
	include "../Controller/ReviewC.php";

	$reviewC=new ReviewC();
	$listReviews=$reviewC->afficherReview();

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste Utilisateurs </title>
		<link rel="stylesheet" href="./style/style.css">
    </head>
    <body>
		<button><a href="ajouterReview.php">Ajouter un Commentaire</a></button>
		<hr>
		<table border=1 align = 'center'>
			<tr>
				<th>Id Review</th>
				<th>Note</th>
				<th>User</th>
				<th>Comment</th>
			</tr>

			<?php
				foreach($listReviews as $review){
			?>
				<tr>
					<td><?php echo $review['idReview']; ?></td>
					<td><?php echo $review['note']; ?></td>
					<td><?php echo $review['user']; ?></td>
					<td><?php echo $review['comment']; ?></td>
					<td>
						<form method="POST" action="supprimerReview.php">
						<button type="submit">Supprimer</button>
						<input type="hidden" value=<?PHP echo $review['idReview']; ?> name="id">
						</form>
					</td>
					<td>
						<a href="modifierReview.php?idReview=<?PHP echo $review['idReview']; ?>"> Modifier </a>
					</td>
				</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>