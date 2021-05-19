<?php

include '../config.php';

?>
    <table>
        <thead>
        <tr>
                <th>#</th>
                <th>Identifiant</th>
				<th>Service type</th>
				<th>Phone number</th>
				<th>RIB</th>

        </tr>
        </thead>

        <?php
        $filename="suppliers list";
        $sql = "SELECT * from fournisseur";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
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
<td>'.$id_f= $result->id_f.'</td> 
<td>'.$type_service_f = $result->type_service_f.'</td> 
<td>'.$telephone_f = $result->telephone_f.'</td> 
<td>'.$RIB_f= $result->RIB_f.'</td> 
				
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