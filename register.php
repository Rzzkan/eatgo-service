<?php
	include "connection.php";

	$name = $_POST['name'];
	$username = $_POST['username'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$role = $_POST['role'];
	
	$query = mysqli_query($connect,"INSERT INTO users (id_restauarant,name,username,phone,password,role,address) VALUES('0','$name','$username','$phone','$password','$role','$address')");

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