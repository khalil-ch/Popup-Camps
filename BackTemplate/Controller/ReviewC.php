<?php

	require_once '/opt/lampp/htdocs/PopupCamps/BackTemplate/Model/Review.php';
	include_once "/opt/lampp/htdocs/PopupCamps/config.php";

	class ReviewC {
		
		function ajouterReview($Review){
			$sql="INSERT INTO Reviews (note, NomCampRv,user, comment) 
			VALUES (:note, :NomCampRv,:user,:comment)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'note' => $Review->getNote(),
					'NomCampRv' => $Review->getNomCampRv(),
					'user' => $Review->getUser(),
					'comment' => $Review->getComment()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherReview(){
			
			$sql="SELECT * FROM Reviews";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerReview($id){
			$sql="DELETE FROM Reviews WHERE idReview= :idReview";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idReview',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierReview($Review, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE Reviews SET 
						note = :note,
						NomCampRv = :NomCampRv,
						user = :user,
						comment = :comment
					WHERE idReview = :idReview'
				);
				$query->execute([
					'idReview' => $id,
					'NomCampRv' => $Review->getNomCampRv(),
					'note' => $Review->getNote(),
					'user' => $Review->getUser(),
					'comment' => $Review->getComment()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererReview($id){
			$sql="SELECT * from Reviews where idReview=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Review=$query->fetch();
				return $Review;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function compterReview($name){
			try{
				$db = config::getConnexion();
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "PopupCamps";
				$con = mysqli_connect($servername,$username,$password,$dbname);
				$sql = "SELECT COUNT(NomCampRV) FROM Reviews WHERE NomCampRv = '$name'";
				$result = mysqli_query($con,$sql);
				$values = mysqli_fetch_assoc($result);
				//$num_rows=$values['NomCampRV'];
				return $values;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
	
		}
		function avgReviews(){
			$sql="SELECT AVG(note), NomCampRv, COUNT(note) FROM Reviews GROUP BY NomCampRv ORDER BY AVG(note) DESC";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		function sortByPop(){
			$sql="SELECT COUNT(note), NomCampRv FROM Reviews GROUP BY NomCampRv";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
			// try{
			// 	$db = config::getConnexion();
			// 	$servername = "localhost";
			// 	$username = "root";
			// 	$password = "";
			// 	$dbname = "PopupCamps";
			// 	$con = mysqli_connect($servername,$username,$password,$dbname);
			// 	$sql = "SELECT COUNT(note), NomCampRv FROM Reviews GROUP BY NomCampRv";
			// 	$result = mysqli_query($con,$sql);
			// 	$values = mysqli_fetch_assoc($result);
			// 	//$num_rows=$values['NomCampRV'];
			// 	return $values;
			// }
			// catch (Exception $e){
			// 	die('Erreur: '.$e->getMessage());
			// }	
	
		}
		function moyReviews($name){
			try{
				$db = config::getConnexion();
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "PopupCamps";
				$con = mysqli_connect($servername,$username,$password,$dbname);
				$sql = "SELECT AVG(note) FROM Reviews WHERE NomCampRv = '$name'";
				$result = mysqli_query($con,$sql);
				$values = mysqli_fetch_assoc($result);
				return $values;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function selectReview($name){
			try{
				$db = config::getConnexion();
				$query = $db->prepare(
					'SELECT * FROM Reviews WHERE NomCampRv= :NomCampRv'
				);
				$query->execute([
					'NomCampRv' => $name
				]);
				$liste = $db->query("SELECT * FROM Reviews WHERE NomCampRv= '$name'");
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}	
	}
?>