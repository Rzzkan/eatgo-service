<?php
	include "connection.php";

	$id_user = $_POST['id_user'];
	$id_restaurant = $_POST['id_restaurant'];
	$menu_name = $_POST['menu_name'];
	$menu_price = $_POST['menu_price'];
	$menu_qty = $_POST['menu_qty'];

	$menu_name_str = serialize($menu_name);
	$menu_price_str = serialize($menu_price);
	$menu_qty_str = serialize($menu_qty);

	$total = $_POST['total'];
	$point_used = $_POST['point_used'];
	$point_earned = $_POST['point_earned'];
	$status = $_POST['status'];
	$payment = $_POST['payment'];
	$date = $_POST['date'];
	
	$query = mysqli_query($connect,"INSERT INTO orders (id_user, id_restaurant, menu_name, menu_price, menu_qty, total, point_used, point_earned, status, payment, date) VALUES('$id_user','$id_restaurant','$menu_name_str','$menu_price_str', '$menu_qty_str', $total, '$point_used', '$point_earned', '$status', '$payment','$date')");

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