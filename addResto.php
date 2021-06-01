<?php
	include "connection.php";

	$id_user = $_POST['id_user'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$link= $_POST['link'];
	
	$query = mysqli_query($connect,"INSERT INTO restaurants (name,address,link) VALUES('$name','$address','$link')");

	if ($query===TRUE) {
		$id_restaurant = mysql_insert_id();
		$query_update = mysqli_query($connect,"UPDATE users SET id_restaurant='$id_restaurant' WHERE id_user='$id_user'")or die(mysqli_error());
	}

	//Handle Response
	if ($query_update) {
		$response->success = 1;
		$response->message = "Save Data Success";
		die(json_encode($response));
	} else{ 
		$response->success = 0;
		$response->message = "Failed to Save Data";
		die(json_encode($response)); 
	}	

?>