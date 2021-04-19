<?php
	include "../config.php";
	require_once '../Model/Review.php';

	class ReviewC {
		
		function ajouterReview($Review){
			$sql="INSERT INTO Review (note, user, comment) 
			VALUES (:note,:user,:comment)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
                    'idReview' => $Review->getId(),
					'note' => $Review->getId(),
					'user' => $Review->getPrix(),
					'comment' => $Review->getEmplacement()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherReview(){
			
			$sql="SELECT * FROM Review";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerReview($id){
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
		function modifierReview($Campground, $id){
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
		function recupererReview($id){
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
		
	}

?>