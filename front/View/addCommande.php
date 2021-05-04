<?php
require_once '../Controller/commandeC.php';
require_once '../Controller/commandeItemsC.php';
require_once '../Controller/panierC.php';
require_once '../Controller/produitC.php';
require_once '../../config.php';

    
        if (isset($_GET['commande']) && isset($_POST['commander']) ){
            $commandeC = new commandeC();
            $commandeItemsC = new commandeItemsC();
            $panierC = new panierC();
           
           $id_commande = $commandeC->ajouterCommande(1); // $_SESSION['id']
            $id_commande = $id_commande['MAX(id_commande)'];
           // var_dump($id_commande);
            $liste = $panierC->afficherPanier(1); // $_SESSION['id']

            $i=0 ;
            $qt_array = $_POST['qt'];
            foreach ($liste as $item)
            {

        
           
              $var =  $commandeItemsC->ajouterCommandeItem($id_commande,$item['id_produit'],$qt_array[$i]);
              echo $item['id_produit'].":". $qt_array[$i];
              
              if($var==0){
                
                $commandeC->supprimerCommande($id_commande);
                die("quantite > stock");
              }
              $i++;

            }
          /*  $query = "select sum(qt*prix) from(select q.qt_produit as qt , p.prix_produit as prix from commande_items q inner Join
              produit p on q.id_produit=p.id_produit where id_commande = :id_commande)as items";
            $db = config::getConnexion();
            $req = $db->prepare($query);
            $req->execute(
                [
                    ':id_commande' => $id_commande
                ]
                );

                $montant = $req->fetch();
                $montant = $montant['sum(qt*prix)']; */
              
                $commandeC->modifierMontant($id_commande);
              
                 $produitC= new produitC();
                 $j=0;
                foreach($liste as $item)
                {
                    
                    $produitC->updateStock($item['id_produit'],$qt_array[$j]);
                    $j++;
                }
                $panierC->supprimerTout(1); //session
               //header("location:afficherCommande.php?id=".$id_commande);
               echo "commande added successfuly";
                
           
                
        }

            
?>
