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
						`img_produit` = ?,
						`id_categorie` = ?
			
					WHERE `id_produit` = ?'
				);
				
				$query->execute(array($produit->getLib() ,$produit->getPrix(), $produit->getQt(), $produit->getImage(),$produit->getCategorie(),$id));
			
		
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