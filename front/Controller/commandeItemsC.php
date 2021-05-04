<?php
	require_once "../../config.php";


	class commandeItemsC {
		
		function ajouterCommandeItem($id_commande,$idProd,$qt){
			$db = config::getConnexion();
			 $req="select qt_produit from produit where id_produit = $idProd";
			$prep = $db->prepare($req);
			$prep->execute();
			$stock = $prep->fetch();
			$stock= $stock['qt_produit'];
			var_dump($stock);
			var_dump($qt);
			if($stock<$qt)
			{
				//echo "la quantite est plus que le stock";
				return 0;
			}
			else{
			$sql="INSERT INTO `commande_items` (`id_commande`,`id_produit`,`qt_produit`) 
			VALUES (:id,:id_prod,:qt)";
           
            
		
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
                    'id' => $id_commande,
					'id_prod' => $idProd,
					'qt' => $qt
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
			return 1;
			}	
				
		}
	

		function supprimerCommandeItem($id,$idProd){
			$sql="DELETE FROM commande_items WHERE id_commande= $id and id_produit = $idProd";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function modiferQtCommandeItem($id,$qt,$idProd){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE commande_items SET 
						qt = :qt
					WHERE id_commande = :id and id_produit = :id_prod'
				);
                
				$query->execute([
                    'qt' => $qt,
					'id' => $id,
					'id_prod' => $idProd
	
				]);
				echo $query->rowCount() . " panier Row UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		/*function supprimerTout($id){
			$sql="SELECT * from panier where id_user=$id";
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

		
	}*/
    	function afficherCommandeItems($id){
			
			$sql="select p.id_produit, p.lib_produit, p.prix_produit, c.qt_produit, p.img_produit from produit p inner join commande_items c on p.id_produit = c.id_produit where c.id_commande = {$id}";
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

		
}

?>