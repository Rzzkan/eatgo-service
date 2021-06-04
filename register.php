<?php
	include "connection.php";

	$name = $_POST['name'];
	$username = $_POST['username'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$role = $_POST['role'];


	if ($role=="resto") {
		$query_resto = mysqli_query($connect,"INSERT INTO restaurants (name,address,link,phone) VALUES('','','','')");
		$id_restaurant = mysqli_insert_id($connect);
		$query = mysqli_query($connect,"INSERT INTO users (name,username,phone,password,role,address,id_restaurant) VALUES('$name','$username','$phone','$password','$role','$address','$id_restaurant')");
	}else{
		$query = mysqli_query($connect,"INSERT INTO users (name,username,phone,password,role,address) VALUES('$name','$username','$phone','$password','$role','$address')");
	}
	
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