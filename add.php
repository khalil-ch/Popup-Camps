<?php
    include('conn.php');
    $data = json_decode(file_get_contents("php://input"));

    $out = array('error' => false, 'id' => false, 'name' => false, 'email' => false, 'password' => false, 'usertype' => false);

    $id = $data->id;
    $name = $data->name;
    $email = $data->email;
    $password = $data->password;
    $usertype = $data->usertype;
    if(empty($id)){
        $out['id'] = true;
        $out['message'] = 'id is required'; 
    } 
    elseif(empty($name)){
        $out['name'] = true;
        $out['message'] = 'name is required'; 
    }
    elseif(empty($email)){
        $out['email'] = true;
        $out['message'] = 'email is required'; 
        elseif(empty($password)){
        $out['password'] = true;
        $out['message'] = 'password is required'; 
        elseif(empty($usertype)){
        $out['usertype] = true;
        $out['message'] = 'usertype is required'; 
    }
    else{
        $sql = "INSERT INTO users (id, name, email,password,usertype) VALUES ('$id', '$name', '$email', 'password', 'usertype')";
        $query = $conn->query($sql);

        if($query){
            $out['message'] = 'user Added Successfully';
        }
        else{
            $out['error'] = true;
            $out['message'] = 'Cannot Add user';
        }
    }
        
    echo json_encode($out);
?>