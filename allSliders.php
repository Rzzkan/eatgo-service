<?php
    include "connection.php";
	
    $query = "SELECT * FROM sliders";
    $result = $connect->query($query);
    $data =[];
    $i=0;

	if ($result->num_rows>0) {

        while($row = $result->fetch_assoc()) {
            $data[$i] = [
            'id_slider' => $row["id_slider"],
            'image' => $row["image"]
            ];
            $i = $i + 1;
        }
        $response->success = 1;
        $response->message = "Get Data Success";
        $response->data = $data;
	    die(json_encode($response));
	}else{ 
		$response->success = 0;
		$response->message = "Data Empty";
		die(json_encode($response)); 
	}	

?>