<?php
	include "connection.php";

	$id_restaurant = $_POST['id_restaurant'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$link = $_POST['link'];
	$phone= $_POST['phone'];

	
	$query = mysqli_query($connect,"UPDATE restaurants SET name='$name', address='$address', link='$link' , phone='$phone' WHERE id_restaurant='$id_restaurant'");
	
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