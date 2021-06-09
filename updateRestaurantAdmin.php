<?php
	include "connection.php";

	$id_restaurant = $_POST['id_restaurant'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$is_active = $_POST['is_active	'];


	
	$query = mysqli_query($connect,"UPDATE restaurants SET latitude	='$latitude', longitude	='$longitude', is_active='$is_active' WHERE id_restaurant='$id_restaurant'");
	
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