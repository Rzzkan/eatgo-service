<?php
	include "connection.php";

	$id_order = $_POST['id_order'];
	$status = $_POST['status'];
	
	$query = mysqli_query($connect,"UPDATE orders SET status='$status' WHERE id_order='$id_order'");
	
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