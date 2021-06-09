<?php
    include "connection.php";
    $id_from= $_POST['id_from'];
    
    $query = mysqli_query($connect,"SELECT c.id_chat, c.id_from, c.id_to, c.message, u.name , u.image, c.date_msg FROM chats c INNER JOIN users u ON c.id_to = u.id_user WHERE c.id_from ='$id_from' GROUP BY c.id_to");
    $data =[];
    $i=0;

    if ($query->num_rows>0) {
        while ($row = $query->fetch_assoc()) {
            $data[$i]= [
            'id_chat' => $row["id_chat"],
            'from' => $row["id_from"],
            'to' => $row["id_to"],
            'to_name' => $row["name"],
            'to_image' => $row["image"],
            'message' => $row["message"],
            'date' => $row["date_msg"]
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