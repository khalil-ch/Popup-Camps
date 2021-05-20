<?php

require_once '../config.php';

?>
    <table border="1">
        <thead>
        <tr>
            <th>#</th>
            <th>ID Offer</th>
            <th>Nom Offer</th>
            <th>Type Offer</th>
            <th>Date Offer</th>
            <th>Duree Promo</th>

        </tr>
        </thead>

        <?php
        $filename="liste Offer";
        $sql = "SELECT * from offer";
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
<td>'.$result->id_offer.'</td> 
<td>'.$result->nom_offer.'</td> 
<td>' .$result->type_offer.'</td>
<td>' .$result->date_offer.'</td> 
<td>'. $result->duree_offer.'</td> 					
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