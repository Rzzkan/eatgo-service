<?php
    include "connection.php";

    $latitude_user = $_POST['latitude'];
    $longitude_user = $_POST['longitude'];
	
    $query = "SELECT * FROM restaurants";
    $result = $connect->query($query);
    $data =[];
    $i=0;

	if ($result->num_rows>0) {

        while($row = $result->fetch_assoc()) {
            $data[$i] = [
            'id_restaurant' => $row["id_restaurant"],
            'name' => $row["name"],
            'image' => $row["image"],
            'phone' => $row["phone"],
            'address' => $row["address"],
            'link' => $row["link"],
            'latitude' => $row["latitude"],
            'longitude' => $row["longitude"],
            'distance' => distance((double) $latitude_user,(double) $longitude_user,(double) $row["latitude"], (double)$row["longitude"],"K"),
            'is_active' => $row["is_active"]
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


    function distance($lat1, $lon1, $lat2, $lon2, $unit) {

      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);

      if ($unit == "K") {
        return ($miles * 1.609344);
      } else if ($unit == "N") {
          return ($miles * 0.8684);
        } else {
            return $miles;
          }
    }
?>