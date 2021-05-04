<?php
	require_once "../../config.php";


	class commandeC {
		
		function ajouterCommande($id_user){
        
			$create="INSERT INTO `commande` (`montant_commande`,`id_user`) 
			VALUES (:montant,:id_user)";
             $id_sql= "select MAX(id_commande) from commande where id_user =:id_user";
             /*$somme=select sum(qt*prix) from(select q.qt_produit as qt , p.prix_produit as prix from commande_items q inner Join
              produit p on q.id_produit=p.id_produit where id_commande = 1)as items;
             ";*/ //viiiiew
           
             $update= "UPDATE commande SET 
						montant_commande = :montant_commande
					WHERE id_commande = :id_commande";
            
			$db = config::getConnexion();
			try{
				$query = $db->prepare($create);
			
				$query->execute([
                    'montant' => 0,
					'id_user' => $id_user
				]);	
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}		
                //req2
            $db=config::getConnexion();
            $query2=$db->prepare($id_sql);
            try{
              
                $query2->execute([ 
                    'id_user'=> $id_user
                ]);

                $id_commande = $query2->fetch();

            }
            catch(Exception $e){
                    echo 'Erreur: '.$e->getMessage();
            }
            return $id_commande;
            //req 3
            /*	try{
				$query3 = $db->prepare($update);
			
				$query3->execute([
                    'montant_commande' => $montant,
					'id_commande' => $id_commande
				]);	
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	*/	
            
            

		}
		
		function afficherCommande($id){
			
			$sql="SELECT * FROM commande where id_commande={$id}";
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

		function supprimerCommande($id){
			$sql="DELETE FROM commande WHERE id_commande= $id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierCommande($id_commande,$id_produit,$qt){
			try {
				$req = "UPDATE commande_items SET 
						qt_produit = :qt
					WHERE id_commande = :id and id_produit = :id_prod";
				$db = config::getConnexion();
				$query = $db->prepare($req);
                
				$query->execute([
                    'qt' => $qt,
					'id' => $id_commande,
					'id_prod' => $id_produit
	
				]);
				echo $query->rowCount() . " commande items Row UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
    	function afficherToutCommande($id_user){
			
			$sql="SELECT * FROM commande where id_user = $id_user";
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
	function modifierMontant($id_commande){
		
		 $db = config::getConnexion();
				   $query = "select sum(qt*prix) from(select q.qt_produit as qt , p.prix_produit as prix from commande_items q inner Join
              produit p on q.id_produit=p.id_produit where id_commande = :id_commande)as items";
            $req = $db->prepare($query);
            $req->execute(
                [
                    ':id_commande' => $id_commande
                ]
                );

                $montant = $req->fetch();
				
                $montant = $montant['sum(qt*prix)'];

					var_dump($montant);

                $update = "UPDATE commande SET montant_commande = :montant where id_commande = :id_commande";
                $req2 = $db->prepare($update);
                $req2->execute(
                [
                    ':montant' => $montant ,
                    ':id_commande' => $id_commande
                ]
                );
	}
}

?>