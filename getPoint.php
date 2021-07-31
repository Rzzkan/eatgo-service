<?php
    include "connection.php";
    $id_user = $_POST['id_user'];
	
    $query = "SELECT point FROM users WHERE id_user ='$id_user'";
    $result = $connect->query($query);
    $data =[];


	if ($result->num_rows>0) {

        while($row = $result->fetch_assoc()) {
            $data = [
            'point' => $row["point"]
            ];
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