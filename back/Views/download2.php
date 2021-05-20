<?php

require_once '../config.php';

?>
    <table border="1">
        <thead>
        <tr>
            <th>#</th>
            <th>ID promo</th>
            <th>Nom Promo</th>
            <th>Type Promo</th>
            <th>Duree Promo</th>

        </tr>
        </thead>

        <?php
        $filename="liste Promo";
        $sql = "SELECT * from promo";
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
<td>'.$result->id_promo.'</td> 
<td>'.$result->nom_promo.'</td> 
<td>' .$result->type_promo.'</td> 
<td>'. $result->duree_promo.'</td> 					
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