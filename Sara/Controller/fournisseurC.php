<?php
	include "../config.php";
	require_once '../Model/fournisseur.php';

	class fournisseurC {
		
		function ajouterFournisseur($fournisseur){
			$sql="INSERT INTO fournisseur (id_f, type_service_f, telephone_f, RIB_f) 
			VALUES (:id_f, :type_service_f, :telephone_f, :RIB_f)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
                } catch (PDOException $e){
                    echo 'Erreur : '. $e->getMessage();
                    die();}
				$query->execute([
					'id_f' => $fournisseur->getId_f(),
					'type_service_f' => $fournisseur->getType_F(),
					'telephone_f' => $fournisseur->getTel_F(),
					'RIB_f' => $fournisseur->getRIB_f(),
					
				]);			
			}			
		
		function afficherFournisseur(){
			
			$sql="SELECT * FROM fournisseur";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerFournisseur($id_f){
			$sql="DELETE FROM fournisseur WHERE id_f= :id_f";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_f',$id_f);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierFournisseur($fournisseur, $id_f){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE fournisseur SET 
						id_f = :id_f, 
						type_service_f = :type_service_f,
						telephone_f = :telephone_f,
						RIB_f = :RIB_f,
					WHERE id_f = :id_f'
				);
				$query->execute([
					'id_f' => $id_f,
					'type_service_f' => $fournisseur->getType_F(),
					'telephone_f' => $fournisseur->getTel_F(),
					'RIB_f' => $fournisseur->getRIB_F(),
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererFournisseur($id_f){
			$sql="SELECT * from fournisseur where id_f=$id_f";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$fournisseur = $query->fetch(PDO::FETCH_OBJ);
				return $fournisseur;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
	}

?>