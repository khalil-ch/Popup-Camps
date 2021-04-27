	<?php
include "../config.php";
require_once '../Model/event.php';    
class eventC {
         public function ajouterEvent($event){
            $sql="INSERT INTO event (nom_E, image_E, description_E) 
			VALUES (:nom_E, :image_E, :description_E)";
			$db = config::getConnexion();
            try{
				$query = $db->prepare($sql);
                } catch (PDOException $e){
                    echo 'Erreur : '. $e->getMessage();
                    die();}
				$query->execute([
					'nom_E' => $event->getNomEvent(),
					'image_E' => $event->getImageEvent(),
					'description_E' => $event->getDescriptionEvent(),
				]);			
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

        public function geteventById($idEvent) {
            $sql="SELECT * FROM event WHERE idEvent = :idEvent";
			$db = config::getConnexion();
            try {				
                $query = $db->prepare($sql);}
                catch (PDOException $e){
                    echo 'Erreur : '. $e->getMessage();
                    die();}
                $query->execute([
                    'idEvent' => $idEvent

                ]);
                return $query->fetch();
            } 

         public function geteventByNom($nom_E) {
            $sql="SELECT * FROM event WHERE nom_E = :nom_E";
            $db = config::getConnexion();
            try {				
                $query = $db->prepare($sql);}
                 catch (PDOException $e){
                    echo 'Erreur : '. $e->getMessage();
                    die();}
                $query->execute([
                    'nom_E' => $nom_E
    
                ]);
                 return $query->fetch();
                } 

        public function modifierEvent($event, $idEvent) {
            $sql="UPDATE event SET nom_E = :nom_E,  image_E = :image_E, description_E = :description_E WHERE idEvent = :idEvent";
			$db = config::getConnexion();
            try {$query = $db->prepare($sql);}
            catch (PDOException $e) {
            $e->getMessage();}
                $query->execute([
                    'nom_E' => $event->getnom_E(),
                    'image_E' => $event->getimage(),
                    'description_E' => $event->getdescription_E(),      
                    'idEvent' => $idEvent
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
        }

        public function supprimerEvent($idEvent) {
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
        public function rechercherEvent($nom_E) {            
            $sql = "SELECT * from event where nom_E=:nom_E"; 
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'nom_E' => $event->geteventByNom(),
                ]); 
                $result = $query->fetchAll(); 
                return $result;
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
        
    }