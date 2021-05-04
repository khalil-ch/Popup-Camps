<?PHP
	include "../Controller/CampgroundC.php";

	$campgroundC=new CampgroundC();
	$listCamps=$campgroundC->afficherCampgrounds();
	$listReviews=$campgroundC->afficherReviewsAssocie();

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste Utilisateurs </title>
		<link rel="stylesheet" href="./style/style.css">
    </head>
    <body>
		<button><a href="ajouterCampground.php">Ajouter un Campground</a></button>
		<hr>
		<table border=1 align = 'center'>
			<tr>
				<th>Id</th>
				<th>Prix</th>
				<th>Emplacement</th>
				<th>Description</th>
				<th>Duree</th>
				<th>Proprietaire</th>
				<th>supprimer</th>
				<th>modifier</th>
			</tr>

			<?php
				foreach($listCamps as $Camp){
			?>
				<tr>
					<td><?php echo $Camp['idProduit']; ?></td>
					<td><?php echo $Camp['prix']; ?></td>
					<td><?php echo $Camp['emplacement']; ?></td>
					<td><?php echo $Camp['description']; ?></td>
					<td><?php echo $Camp['duree']; ?></td>
					<td><?php echo $Camp['proprietaire']; ?></td>
					<td>
						<form method="POST" action="supprimerCampground.php">
						<button type="submit">Supprimer</button>
						<input type="hidden" value=<?PHP echo $Camp['idProduit']; ?> name="id">
						</form>
					</td>
					<td>
						<a href="modifierCampgrounds.php?idProduit=<?PHP echo $Camp['idProduit']; ?>"> Modifier </a>
					</td>
				</tr>
			<?php
				}
			?>
		</table>
		<table border=1 align = 'center'>
			<tr>
				<th>Id</th>
				<th>Prix</th>
				<th>Emplacement</th>
				<th>Description</th>
				<th>supprimer</th>
				<th>modifier</th>
			</tr>

			<?php
				foreach($listReviews as $Rv){
			?>
				<tr>
					<td><?php echo $Rv['idReview']; ?></td>
					<td><?php echo $Rv['NomCampRv']; ?></td>
					<td><?php echo $Rv['note']; ?></td>
					<td><?php echo $Rv['user']; ?></td>
					<td><?php echo $Rv['comment']; ?></td>
					<td>
						<form method="POST" action="supprimerCampground.php">
						<button type="submit">Supprimer</button>
						<input type="hidden" value=<?PHP echo $Camp['idProduit']; ?> name="id">
						</form>
					</td>
					<td>
						<a href="modifierCampgrounds.php?idProduit=<?PHP echo $Camp['idProduit']; ?>"> Modifier </a>
					</td>
				</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
