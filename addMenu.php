<?php
	include "connection.php";
	
	$id_restaurant = $_POST['id_restaurant'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$img = $_POST['image'];
	$img_name = "$name.jpg";
	$img_path = "Menu/$img_name";
	
	$query = mysqli_query($connect,"INSERT INTO menus (id_restaurant,name,description,category,price,image) VALUES('$id_restaurant','$name','$description','$category','$price','$img_path')");
	file_put_contents($img_path,base64_decode($img));

	if ($query) {
		$response->success = 1;
		$response->message = "Save Data Success";
		die(json_encode($response));
	} else{ 
		$response->success = 0;
		$response->message = "Failed to Save Data";
		die(json_encode($response)); 
	}	

?>