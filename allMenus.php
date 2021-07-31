<?php
    include "connection.php";
    $id= $_POST['id_restaurant'];
	
    $query = "SELECT * FROM menus WHERE id_restaurant='$id'";
    $result = $connect->query($query);
    $data =[];
    $i=0;

	if ($result->num_rows>0) {

        while($row = $result->fetch_assoc()) {
            $data[$i] = [
            'id_menu' => $row["id_menu"],
            'id_restaurant' => $row["id_restaurant"],
            'name' => $row["name"],
            'description' => $row["description"],
            'category' => $row["category"],
            'image' => $row["image"],
            'price' => $row["price"],
            'point_earned' => $row["point_earned"],
            'is_active' => $row["is_active"]
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