<?php
	include('conn.php');
    $data = json_decode(file_get_contents("php://input"));

    $out = array('error' => false);

    $id = $data->id;
    $name = $data->name;
    $email = $data->email;
    $password = $data->password;
    $usertype = $data->usertype;

   	$sql = "UPDATE users SET name= '$name', email = '$email', password = '$password,'usertype = '$usertype' WHERE id = '$id'";
   	$query = $conn->query($sql);

   	if($query){
   		$out['message'] = 'user updated Successfully';
   	}
   	else{
   		$out['error'] = true;
   		$out['message'] = 'Cannot update user';
   	}

    echo json_encode($out);
?>