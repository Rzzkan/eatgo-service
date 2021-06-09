<?php
	include "connection.php";

	$id_user = $_POST['id_user'];
	$id_restaurant = $_POST['id_restaurant'];
	$rating = $_POST['rating'];
	$review= $_POST['review'];
	
	$query = mysqli_query($connect,"INSERT INTO ratings (id_user,id_restaurant,rating,review) VALUES('$id_user','$id_restaurant','$rating','$review')");

	//Handle Response
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