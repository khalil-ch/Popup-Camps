<?php 

require_once '../../config.php';

?>
<table border="1">
									<thead>
										<tr>
                                            <th>#</th>
											<th>ID Commande</th>
											<th>Date commande</th>
											<th>Montant Commaned</th>
											<th>ID User</th>
					
										</tr>
									</thead>

<?php 
$filename="liste commande";
$sql = "SELECT * from commande";
$db=config::getConnexion();
$query = $db -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$result->id_commande.'</td> 
<td>'.$result->date_commande.'</td> 
<td>'.$result->montant_commande.'</td> 
<td>'.$result->id_user.'</td> 					
</tr>  
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>
<?php
 
 ?>