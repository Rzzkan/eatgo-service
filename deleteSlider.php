<?php
	include "connection.php";

	$id_slider = $_POST['id_slider'];

	
	$query = mysqli_query($connect,"DELETE FROM sliders WHERE id_slider='$id_slider'");
	
    //Handle Response
	if ($query) {
		$response->success = 1;
		$response->message = "Update Data Success";
		die(json_encode($response));
	} else{ 
		$response->success = 0;
		$response->message = "Failed to Delete Data";
		die(json_encode($response)); 
	}	

?>