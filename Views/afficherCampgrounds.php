<?PHP
	include "../Controller/CampgroundC.php";

	$CampgroundC=new CampgroundC();
	$listCamps=$CampgroundC->afficherCampgrounds();

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste Utilisateurs </title>
		<link rel="stylesheet" href="./style/style.css">
    </head>
    <body>
		<button><a href="connexion.php">Ajouter un Utilisateur</a></button>
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
						<form method="POST" action="supprimerUtilisateur.php">
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
