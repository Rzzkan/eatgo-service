<?php
	include "connection.php";


	$id_menu = $_POST['id_menu'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$img = $_POST['image'];
	$img_name = "$name.jpg";
	$img_path = "Menu/$img_name";
	
	
	$query = mysqli_query($connect,"UPDATE menus SET name='$name', description='$description', category='$category', price='$price', image='$img_path' WHERE id_menu='$id_menu'");
		file_put_contents($img_path,base64_decode($img));
	
    //Handle Response
	if ($query) {
		$response->success = 1;
		$response->message = "Update Data Success";
		die(json_encode($response));
	} else{ 
		$response->success = 0;
		$response->message = "Failed to Update Data";
		die(json_encode($response)); 
	}	

?>