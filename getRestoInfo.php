<?php
    include "connection.php";

     $id_restaurant = $_POST['id_restaurant'];

    $query = "SELECT u.id_user, r.id_restaurant, r.name, r.image, r.phone, r.address, r.link, r.latitude, r.longitude, r.is_active FROM restaurants r INNER JOIN users u ON r.id_restaurant = u.id_restaurant WHERE r.id_restaurant = '$id_restaurant' ";
    $result = $connect->query($query);
    $data =[];


	if ($result->num_rows>0) {

        while($row = $result->fetch_assoc()) {
            $data = [
            'id_user' => $row["id_user"],
            'id_restaurant' => $row["id_restaurant"],
            'name' => $row["name"],
            'image' => $row["image"],
            'phone' => $row["phone"],
            'address' => $row["address"],
            'link' => $row["link"],
            'latitude' => $row["latitude"],
            'longitude' => $row["longitude"],
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