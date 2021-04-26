<?PHP
	include "../Controller/fournisseurC.php";

	$fournisseur=new fournisseurC();
	$listeF=$fournisseur->afficherFournisseur();

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste fournisseurs </title>
		<link rel="stylesheet" href="./style/style.css">
    </head>
    <body>
		<button><a href="connexion.php">Ajouter un fournisseur</a></button>
		<hr>
		<table border=1 align = 'center'>
			<tr>
				<th>Identifiant</th>
				<th>Type Service</th>
				<th>Telephone</th>
				<th>RIB</th>
				<th>supprimer</th>
				<th>modifier</th>
			</tr>

			<?php
				foreach($listeF as $fournisseur){
			?>
				<tr>
					<td><?php echo $fournisseur['id_f']; ?></td>
					<td><?php echo $fournisseur['type_service_f']; ?></td>
					<td><?php echo $fournisseur['telephone_f']; ?></td>
					<td><?php echo $fournisseur['RIB_f']; ?></td>
					<td>
						<form method="POST" action="supprimerFournisseur.php">
						<button type="submit">Supprimer</button>
						<input type="hidden" value=<?PHP echo $fournisseur['id_f']; ?> name="id_f">
						</form>
					</td>
					<td>
						<a href="modifierFournisseur.php?id_f=<?PHP echo $fournisseur['id_f']; ?>"> Modifier </a>
					</td>
				</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>