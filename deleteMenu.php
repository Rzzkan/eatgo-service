<?php
	include "connection.php";

	$id_menu = $_POST['id_menu'];

	
	$query = mysqli_query($connect,"DELETE FROM menus WHERE id_menu='$id_menu'");
	
    //Handle Response
	if ($query) {
		$response->success = 1;
		$response->message = "Delete Data Success";
		die(json_encode($response));
	} else{ 
		$response->success = 0;
		$response->message = "Failed to Delete Data";
		die(json_encode($response)); 
	}	

?>