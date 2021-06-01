<?php
    include "connection.php";
	
    $query = "SELECT * FROM users";
    $result = $connect->query($query);
    $data =[];
    $i=0;

	if ($result->num_rows>0) {

        while($row = $result->fetch_assoc()) {
            $data[$i] = [
            'id_user' => $row["id_user"],
            'id_restaurant' => $row["id_restaurant"],
            'name' => $row["name"],
            'username' => $row["username"],
            'phone' => $row["phone"],
            'password' => "null",
            'image' => $row["image"],
            'role' => $row["role"]
            ];
            $i = $i + 1;
        }
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