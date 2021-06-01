<?php
	include "connection.php";

	$id_user = $_POST['id_user'];
	$password = $_POST['password'];
	
	$query = mysqli_query($connect,"UPDATE users SET password='$password' WHERE id_user='$id_user'");
	
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