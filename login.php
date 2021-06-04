<?php
    include "connection.php";

    $email = $_POST['username'];
    $password = $_POST['password'];
    
    $query = mysqli_query($connect,"SELECT * FROM users where username ='$email' and password='$password'");
    $data =[];

	if ($query->num_rows>0) {
        $row = $query->fetch_assoc();
        $data = [
            'id_user' => $row["id_user"],
            'id_restaurant' => $row["id_restaurant"],
            'username' => $row["username"],
            'role' => $row["role"],
            'name' => $row["name"],
            'address' => $row["address"],
            'phone' => $row["phone"],
            'image' => $row["image"],
            'password' => $row["password"]
        ];
        $response->success = 1;
        $response->message = "Get Data Success";
        $response->data = $data;
	    die(json_encode($response));
	}else{ 
		$response->success = 0;
		$response->message = "Data Empty";
		die(json_encode($response)); 
	}	

?>