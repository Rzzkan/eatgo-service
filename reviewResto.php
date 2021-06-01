<?php
    include "connection.php";
    $id= $_POST['id_restaurant'];
    
    $query = mysqli_query($connect,"SELECT r.id_rating, r.id_restaurant, r.id_user, u.name, r.rating, r.review FROM ratings p, users u WHERE r.id_restaurant='$id' AND r.id_user=u.id_user");
    $data =[];

    if ($query->num_rows>0) {
        $row = $query->fetch_assoc();
        $data= [
            'id_rating' => $row["id_rating"],
            'id_restaurant' => $row["id_restaurant"],
            'id_user' => $row["id_user"],
            'rating' => $row["rating"],
            'review' => $row["review"]
        ];
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