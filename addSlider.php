<?php
	include "connection.php";

	$name = $_POST['name'];
	$img = $_POST['img'];
	$img_name = "$name.jpg";
    $img_path = "User/$img_name";
	
	$query = mysqli_query($connect,"INSERT INTO sliders (image) VALUES ('$img_path')");
	file_put_contents($img_path,base64_decode($img));
	
    //Handle Response
	if ($query) {
		$response->success = 1;
		$response->message = "INSERT Data Success";
		$response->url = $img_path;
		die(json_encode($response));
	} else{ 
		$response->success = 0;
		$response->message = "Failed to Update Data";
		$response->url="null";
		die(json_encode($response)); 
	}	

?>