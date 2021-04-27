<?php
require_once '../config.php';
require_once '../Controller/commandeItemsC.php';
require_once '../Controller/commandeC.php';
        if(isset($_GET['id'])) //check for other variable sent in the link
        {
            $id=$_GET['id'];
            $idProd=$_GET['id_produit'];
            $qt=$_GET['qt_produit'];
             $sql="select p.id_produit, p.lib_produit, p.prix_produit, c.qt_produit, p.img_produit from 
             produit p inner join commande_items c on p.id_produit = c.id_produit where c.id_commande = {$id} and p.id_produit = {$idProd}";
            $db = config::getConnexion();
            $query=$db->prepare($sql);
            $query->execute();
            $list = $query->fetchAll();
            $row = $list[0];
            if(isset($_POST['update'])){
                
                $newqt = $_POST['qt'];

                $commandeC = new commandeC();
                $commandeC->modifierCommande($id,$idProd,$newqt);
                $commandeC->modifierMontant($id);
                echo "updated successfuly";
               header("location:afficherCommande.php?id=".$id);
            }
            }
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<table class="table">
<thead>
<th>id</th>
<th>lib</th>
<th>prix</th>
<th>qt</th>
<th>img</th>
<th> button </th>
</thead>
<tbody>

      <form action="" method="post">
          <tr>
                                 <td><?php echo $row['id_produit']; ?></td>
                                <td><?php echo $row['lib_produit']; ?></td>
                                <td><?php echo $row['prix_produit']; ?></td>
                                <td><input type="number" value="<?php echo $row['qt_produit']; ?>" name="qt"></td>
                        <td><img width="50" height="50" src="uploads/<?=$row['img_produit']?>"> </td>
                        <td> <input type="submit" value="update" name="update"></td>
          </tr>
         
      </form>
</tbody>

</table>
    		
</body>
</html>