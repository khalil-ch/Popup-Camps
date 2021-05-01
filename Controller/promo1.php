<?php

include "../config.php";
require_once '../Model/promo.php';

class promo1
{
    function ajouterPromo($promo){
        $sql="INSERT INTO promo (id_promo,nom_promo,type_promo,duree_promo) VALUES (:id_promo,:nom_promo,:type_promo,:duree_promo)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);


        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
            die();
        }
        $query->execute([
            'id_promo' => $promo->__getIdP(),
            'nom_promo' => $promo->__getNomP(),
            'type_promo' => $promo->__getTypeP() ,
            'duree_promo' => $promo->__getDureeP()
        ]);


    }
    function afficherPromo(){

        $sql="SELECT * FROM promo";
        $db = config::getConnexion();
        try{
            $liste1 = $db->query($sql);
            return $liste1;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimerPromo($id_promo){
        $sql="DELETE FROM promo WHERE id_promo= :id_promo";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id_promo',$id_promo);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifierPromo($promo,$id_promo){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE promo SET 
						id_promo = :id_promo, 
						nom_promo = :nom_promo,
						type_promo = :type_promo,
						duree_promo = :duree_promo
					WHERE id_promo = :id_promo'
            );
            $query->execute([
                'id_promo' => $id_promo,
                'nom_promo' => $promo->__getNomP($nom_promo),
                'type_promo' => $promo->__getTypeP($type_promo) ,
                'duree_promo' => $promo->__getDureeP($duree_promo)
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
            echo "error";
        }
    }
    function recupererPromo($id_promo){
        $sql="SELECT * from promo where id_promo=$id_promo";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $promo=$query->fetch();
            return $promo;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function recupererOffer1($id_offer
    ){
        $sql="SELECT * from listoffer where id=$id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $offer = $query->fetch(PDO::FETCH_OBJ);
            return $offer;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}



?>