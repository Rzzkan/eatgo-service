<?php
    include "connection.php";
    $id= $_POST['id_restaurant'];
    
    $query = mysqli_query($connect,"SELECT r.id_rating, r.id_restaurant, r.id_user, u.image, u.name, r.rating, r.review FROM ratings r INNER JOIN users u ON r.id_user = u.id_user WHERE r.id_restaurant ='$id'");
    $data =[];
    $i=0;

    if ($query->num_rows>0) {
        while ($row = $query->fetch_assoc()) {
            $data[$i]= [
            'id_rating' => $row["id_rating"],
            'id_restaurant' => $row["id_restaurant"],
            'id_user' => $row["id_user"],
            'name' => $row["name"],
            'image' => $row["image"],
            'rating' => $row["rating"],
            'review' => $row["review"]
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