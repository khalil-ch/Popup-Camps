<?php
include "../config.php";
require_once '../Model/offer.php';


class offer1
{

    function ajouterOffer($offer){
        $sql="INSERT INTO offer (id_offer,nom_offer,type_offer,date_offer,duree_offer) VALUES (:id_offer,:nom_offer,:type_offer, :date_offer, :duree_offer)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
            die();
        }

        $query->execute([
            'id_offer' => $offer->__getId(),
            'nom_offer' => $offer->__getNom(),
            'type_offer' => $offer->__getType() ,
            'date_offer' => $offer->__getDate(),
            'duree_offer' => $offer->__getDuree()
    ]);

    }
    function afficherOffer(){

        $sql="SELECT * FROM offer";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimerOffer($id_offer){
        $sql="DELETE FROM offer WHERE id_offer= :id_offer";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id_offer',$id_offer);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifierOffer($offer,$id_offer){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE offer SET 
						id_offer = :id_offer, 
						nom_offer = :nom_offer,
						type_offer = :type_offer,
						date_offer = :date_offer,
						duree_offer = :duree_offer
					WHERE id_offer = :id_offer'
            );
            $query->execute([
                'id_offer' => $id_offer,
                'nom_offer' => $offer->__getNom(),
                'type_offer' => $offer->__getType() ,
                'date_offer' => $offer->__getDate(),
                'duree_offer' => $offer->__getDuree()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
            echo "error";
        }
    }
    function recupererOffer($id_offer){
        $sql="SELECT * from offer where id_offer=$id_offer";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $offer=$query->fetch();
            return $offer;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}
?>