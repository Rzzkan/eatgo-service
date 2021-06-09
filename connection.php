<?php
    header('Content-Type: application/json');
	error_reporting(0);
	
	$server		= "localhost"; 
	$user		= "u6117788_eatgo"; 
	$password	= "123456"; 
	$database	= "u6117788_eatgo"; 
	
	$connect = mysqli_connect($server, $user, $password, $database) or die ("Connection Failed !");

?>