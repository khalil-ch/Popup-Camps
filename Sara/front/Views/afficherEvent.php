<?php
require_once '../Controller/eventC.php';
    
    $idEvent=$_GET["idEvent"];
    $eventC = new eventC();
    $row = $eventC->recupererEvent($idEvent);
    $nom_E = $row['nom_E'];
	$image_E = $row['image_E'];
    $date_E = $row['date_E']; 
    $description_E =$row['description_E'];
 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
</head>
<body>


 
	<div class="container">
	<h2>Evénement</h2>
     <a href="afficherEvents.php" class="btn btn-info">tous les événements</a>
		
		<hr>
		<table class="table">
			<thead>
			<tr>
				<th>EVENEMENT ID</th>
				<th>Nom de l'événement</th>
				<th>Image</th>
				<th>Date</th>
				<th>Description</th>
            </tr>
            </thead>
        <tbody>
   
                       
                <td><?php echo $idEvent ?></td>      
                <td><?php echo $nom_E ?></td>  
				<td><img width="50" height="50" src="assets/<?=$image_E?>"> </td>
                <td><?php echo $date_E?></td>   
				<td><?php echo $description_E?></td>   					
            
        </tr>
                
               
				</tbody>    
    </table>
    
              
                 
    
</body>
</html>