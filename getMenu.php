<?php
    include "connection.php";

     $id_menu = $_POST['id_menu'];
    
	
    $query = "SELECT * FROM menus WHERE id_menu = '$id_menu' ";
    $result = $connect->query($query);
    $data =[];


	if ($result->num_rows>0) {

        while($row = $result->fetch_assoc()) {
            $data = [
           'id_menu' => $row["id_menu"],
            'id_restaurant' => $row["id_restaurant"],
            'name' => $row["name"],
            'description' => $row["description"],
            'category' => $row["category"],
            'image' => $row["image"],
            'price' => $row["price"],
            'is_active' => $row["is_active"]
            ];
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