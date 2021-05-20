	<?php
require_once "../config.php";
require_once '../Model/event.php';

class eventC {
       
    public function ajouterEvent($event){
    /*	$sql="INSERT INTO `event` (`nom_E`,`image_E`,`date_E`,`description_E`) 
        VALUES (:nom_E,:image_E,:date_E, :description_E)";*/
    
        $db = config::getConnexion();
        $query = $db->prepare("INSERT INTO event (nom_E,image_E,date_E,description_E)  
        VALUES(:nom_E,:image_E,:date_E,:description_E)" );
        try{
            
        //$req=$db->prepare($quy)er;
            
        $nom_E = $event->getNomEvent();
        $image_E = $event->getImageEvent();
        $date_E = $event->getDateEvent();
        $description_E = $event->getDescriptionEvent();
            $query->bindParam(':nom_E',$nom_E);
            $query->bindParam(':image_E',$image_E);
            $query->bindParam(':date_E',$date_E);
            $query->bindParam(':description_E',$description_E);
            $query->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }
    
    public function afficherEvent(){
        
        $sql="SELECT * FROM event";
        $db = config::getConnexion();
        try{
            $listeE = $db->query($sql);
            return $listeE;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    public function getNomEvent($nom_E) {
        $sql="SELECT * FROM event WHERE nom_E = :nom_E";
        $db = config::getConnexion();
        try {
            $query=$db->prepare($sql);
            $query->execute([
                'nom_E' => $nom_E
            ]);
            
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function supprimerEvent($idEvent){
        $sql="DELETE FROM event WHERE idEvent= :idEvent";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':idEvent',$idEvent);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function modifierEvent($event, $idEvent){
        try {
            
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE `event` SET 
                    `nom_E` = ?,
                    `image_E` = ?,
                    `date_E` = ?,
                    `description_E` = ?
                    
                WHERE `idEvent` = ?'
            );
            
            $query->execute(array($event->getNomEvent() ,$event->getDateEvent(), $event->getDescriptionEvent(), $event->getImageEvent(), $idEvent));
        
    
            echo $query->rowCount() . " events UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function recupererEvent($idEvent){
        $sql="SELECT * from event where idEvent=$idEvent";
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
    public function searchEvent($nom_E) {            
        $sql = "SELECT * from event where nom_E =nom_E"; 
        $db = config::getConnexion();
        try {
            $liste = $db->prepare($sql);
            $liste->execute();
            $listes = $liste->fetchAll();
            return $listes;
        }
        catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
}

    

?>