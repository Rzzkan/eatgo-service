<?php
	include "connection.php";

	$id_restaurant = $_POST['id_restaurant'];
	$img = $_POST['img'];
	$img_name = "$id_restaurant.jpg";
    $img_path = "Restaurant/$img_name";
	
	$query = mysqli_query($connect,"UPDATE restaurants SET image='$img_path' WHERE id_restaurant='$id_restaurant'");
	file_put_contents($img_path,base64_decode($img));
	
    //Handle Response
	if ($query) {
		$response->success = 1;
		$response->message = "Update Data Success";
		$response->url = $img_path;
		die(json_encode($response));
	} else{ 
		$response->success = 0;
		$response->message = "Failed to Update Data";
		$response->url="null";
		die(json_encode($response)); 
	}	

?>