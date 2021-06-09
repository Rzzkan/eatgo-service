<?php
	include "connection.php";

	$id_from = $_POST['id_from'];
	$id_to = $_POST['id_to'];
	$message = $_POST['message'];
	$date = $_POST['date'];

	$query = mysqli_query($connect,"INSERT INTO chats (id_from, id_to, message, date_msg) VALUES('$id_from','$id_to','$message','$date')");

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