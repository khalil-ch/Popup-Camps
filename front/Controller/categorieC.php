<?php
	require_once "../../config.php";
	require_once '../Model/produit.php';

	class categorieC {
		
		function ajouterCategorie($categorie){
			$sql="INSERT INTO `categorie` (`nom_categorie`) 
			VALUES (:nom)";
            
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'nom' => $categorie->getNomCategorie()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherCategorie(){
			
			$sql="SELECT * FROM categorie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				$liste =$liste->fetchAll();
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerCategorie($id){
			$sql="DELETE FROM categorie WHERE id_categorie= :id";
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
		function modifierCategorie($categorie, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE categorie SET 
						nom_categorie = :nom
					WHERE id_categorie = :id'
				);
                
				$query->execute([
					'nom' => $categorie->getNomCategorie(),
					'id' => $id
	
				]);
				echo $query->rowCount() . " Category UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererCategorie($id){
			$sql="SELECT * from categorie where id_categorie=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$singleCategory=$query->fetch();
				return $singleCategory;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		
	}

?>