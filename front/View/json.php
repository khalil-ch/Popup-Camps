<?php 
   
   if(isset($_POST)){
       $str_json = file_get_contents('php://input');
       echo $str_json;
   }

?>