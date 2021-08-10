<?php
    include "connection.php";

    $id_order = $_POST['id_order'];
    
    $query = "SELECT o.id_order, o.id_restaurant, o.id_user, r.name, r.phone, o.menu_name, o.menu_price, o.menu_qty, o.total, o.status, o.payment, o.date FROM orders o INNER JOIN restaurants r ON o.id_restaurant = r.id_restaurant WHERE o.id_order ='$id_order'";
    $result = $connect->query($query);
    $i=0;

    if ($result->num_rows>0) {

        while($row = $result->fetch_assoc()) {
            $data = [
            'id_order' => $row["id_order"],
            'id_restaurant' => $row["id_restaurant"],
            'id_user' => $row["id_user"],
            'user_name' => $row["name"],
            'user_phone' => $row["phone"],
            'menu_name' => unserialize($row["menu_name"]),
            'menu_price' => unserialize($row["menu_price"]),
            'menu_qty' =>  unserialize($row["menu_qty"]),
            'total' => $row["total"],
            'status' => $row["status"],
            'payment' => $row["payment"],
            'date' => $row["date"]
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