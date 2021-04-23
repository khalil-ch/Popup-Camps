<?php
	include('conn.php');
    $data = json_decode(file_get_contents("php://input"));

    $out = array('error' => false);

    $memid = $data->id;

   	$sql = "DELETE FROM users WHERE id = '$id'";
   	$query = $conn->query($sql);

   	if($query){
   		$out['message'] = 'user deleted Successfully';
   	}
   	else{
   		$out['error'] = true;
   		$out['message'] = 'Cannot delete user';
   	}

    echo json_encode($out);
?>