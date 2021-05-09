<?php

include "../config.php";

?>
    <table border="1">
        <thead>
        <tr>
            <th>#</th>
            <th>Promotion Name</th>
            <th>Promotion Type</th>
            <th>Promotion Duration</th>

        </tr>
        </thead>

        <?php
        $filename="Promotion list";
        $sql = "SELECT * from promo";
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
<td>'.$id_promo= $result->id_offer.'</td> 
<td>'.$nom_promo= $result->nom_offer.'</td> 
<td>'.$type_promo= $result->type_offer.'</td> 
<td>'.$duree_promo= $result-duree_offer.'</td> 
				
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
