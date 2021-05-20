<?php
	require_once "../../config.php";
	require_once '../Model/produit.php';

	class produitC {
		
		public function ajouterProduit($produit){
		/*	$sql="INSERT INTO `produit` (`lib_produit`,`prix_produit`,`qt_produit`,`img_produit`,`id_categorie`) 
			VALUES (:lib,:prix,:qt_produit, :img, :id_categorie)";*/
        
			$db = config::getConnexion();
				$query = $db->prepare("insert into `produit` (`lib_produit`,`prix_produit`,`qt_produit`,`img_produit`,`id_categorie`)  
			VALUES(:lib,:prix,:qt,:img,:cat)" );
			try{
				
			//$req=$db->prepare($quy)er;
				
			$lib = $produit->getLib();
			$prix = $produit->getPrix();
			$qt = $produit->getQt();
			$img = $produit->getImage();
			$cat = $produit->getCategorie();
				$query->bindParam(':lib',$lib);
				$query->bindParam(':prix',$prix);
				$query->bindParam(':qt',$qt);
				$query->bindParam(':img',$img);
				$query->bindParam(':cat',$cat);
				$query->execute();
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		public function afficherProduit(){
			
			$sql="SELECT * FROM produit";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		public function supprimerProduit($id){
			$sql="DELETE FROM produit WHERE id_produit= :id";
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
		public function modifierProduit($produit, $id){
			try {
				
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE `produit` SET 
						`lib_produit` = ?, 
						`prix_produit` = ?,
						`qt_produit` = ?,
						`img_produit` = ?
			
					WHERE `id_produit` = ?'
				);
				
				$query->execute(array($produit->getLib() ,$produit->getPrix(), $produit->getQt(), $produit->getImage(), $id));
			
		
				echo $query->rowCount() . " Products UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		public function recupererProduit($id){
			$sql="SELECT * from produit where id_produit=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$prod=$query->fetch();
				return $prod;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function updateStock($idProd,$qt){
			$db = config::getConnexion();
			$req = "select qt_produit from produit where id_produit = $idProd";
			$exec= $db->query($req);
			$newqt = $exec->fetch()['qt_produit'] ;
			$newqt -= $qt;

			$sql="update produit set qt_produit = $newqt where id_produit = $idProd";
			
			try{
				$exec = $db->query($sql);
				if($exec)
				{
					return "updated";
				}
				else{
					return "error updating";
				}
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}

		}
		function rechercheProduit($lib){
			$db = config::getConnexion();
			$sql="SELECT * FROM produit where lib_produit like '%$lib%'";
			
			try{
				$liste = $db->prepare($sql);
				$liste->execute();
				$listes = $liste->fetchAll();
				return $listes;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		
		}
				public function recupererProduitsSelonCategorie($cat){
			$sql="SELECT * from produit where id_categorie=$cat";
			$db = config::getConnexion();
			try{
			$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
	}

?>