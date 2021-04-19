<?php
	include "../config.php";
	require_once '../Model/Campground.php';

	class CampgroundC {
		
		function ajouterCampground($Campground){
			$sql="INSERT INTO Campground (idProduit, prix, emplacement, description, duree, proprietaire) 
			VALUES (:id,:prix,:emplacement, :description, :duree, :proprietaire)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'id' => $Campground->getId(),
					'prix' => $Campground->getPrix(),
					'emplacement' => $Campground->getEmplacement(),
					'description' => $Campground->getDescription(),
					'duree' => $Campground->getDuree(),
					'proprietaire' => $Campground->getProprietaire()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherCampgrounds(){
			
			$sql="SELECT * FROM Campground";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerCampgrounds($id){
			$sql="DELETE FROM Campground WHERE idProduit= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierCampgrounds($Campground, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE Campground SET 
						idProduit = :idProduit, 
						prix = :prix,
						emplacement = :emplacement,
						description = :description,
						duree = :duree,
						proprietaire = :proprietaire
					WHERE idProduit = :idProduit'
				);
				$query->execute([
					'idProduit' => $id,
					'prix' => $Campground->getPrix(),
					'emplacement' => $Campground->getEmplacement(),
					'description' => $Campground->getDescription(),
					'duree' => $Campground->getDuree(),
					'proprietaire' => $Campground->getProprietaire()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererCampgrounds($id){
			$sql="SELECT * from Campground where idProduit=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Campground=$query->fetch();
				return $Campground;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererCampground1($id){
			$sql="SELECT * from Utilisateur where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$Campground = $query->fetch(PDO::FETCH_OBJ);
				return $Campground;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
	}

?>