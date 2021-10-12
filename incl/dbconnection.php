<?php

$server='localhost';
$user = 'root';
$password = '';
$dbname = 'userdb';

$conn = new mysqli($server,$user,$password,$dbname);

if ($conn->connect_error) 
 {
	die('Database connection faild'. $conn->connect_error);
 }

?>