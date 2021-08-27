<?php
    include "connection.php";   
    $data =[];


    $query_user = mysqli_query($connect,"SELECT count(id_user) as total FROM users WHERE role='user'")or die(mysqli_error());
    $user_data = mysqli_fetch_array($query_user);
    $total_user= (int) $user_data['total'];

    $query_resto = mysqli_query($connect,"SELECT count(id_restaurant) as total FROM restaurants")or die(mysqli_error());
    $resto_data = mysqli_fetch_array($query_resto);
    $total_resto= (int) $resto_data['total'];

    $query_review = mysqli_query($connect,"SELECT count(id_rating) as total FROM ratings")or die(mysqli_error());
    $review_data = mysqli_fetch_array($query_review);
    $total_review= (int) $review_data['total'];

    $query_menu = mysqli_query($connect,"SELECT count(id_menu) as total FROM menus")or die(mysqli_error());
    $menu_data = mysqli_fetch_array($query_menu);
    $total_menu= (int) $menu_data['total'];

  
        $data= [
            'total_user' => $total_user,
            'total_resto' => $total_resto,
            'total_review' => $total_review,
            'total_menu' => $total_menu
        ];
    $response->success = 1;
    $response->message = "Get Data Success";
    $response->data = $data;
    die(json_encode($response));


?>