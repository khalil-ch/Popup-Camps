<?php
	require_once "../../config.php";


	class panierC {
		
		function ajouterPanier($id_user,$prix,$idProd,$qt){
			$db = config::getConnexion();
			$sqlCheck ="select * from panier where id_produit = $idProd and id_user = $id_user";
			$prep=$db->prepare($sqlCheck);
			$prep->execute();
			$count = $prep->rowCount();
			
			if($count > 0) {
			
				$row = $prep->fetch();
				//var_dump($row);
				$newqt = $row['qt_produit'] + $qt;
				$newprice = $prix * $newqt;
				$updateReq = "UPDATE panier set qt_produit = $newqt , montant_panier=$newprice where id_user = $id_user and id_produit = $idProd";
				$prepareupdate = $db->prepare($updateReq);
				$prepareupdate->execute();
			}
			else{

			



			$sql="INSERT INTO `panier` (`id_user`,`qt_produit`,`id_produit`,`montant_panier`) 
			VALUES (:id,:qt,:id_prod,:montant)";
           
            
			
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
                    'id' => $id_user,
					'qt' => $qt,
					'id_prod' => $idProd,
					'montant' => $prix*$qt
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
			}		
		}
		
		
		function afficherPanier($id){
			
			$sql="SELECT * FROM panier where id_user={$id}";
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

		function supprimerProduitPanier($id,$idProd){
			$sql="DELETE FROM panier WHERE id_user= $id and id_produit = $idProd";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierQtPanier($produit_id, $id,$qt){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE panier SET 
						qt = :qt
					WHERE id_user = :id and id_produit = :id_prod'
				);
                
				$query->execute([
                    'qt' => $qt,
					'id' => $id,
					'id_produit' => $produit_id
	
				]);
				echo $query->rowCount() . " panier Row UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function supprimerTout($id){
			$sql="delete from panier where id_user=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
                echo 'deleted all';
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		
	}

?>