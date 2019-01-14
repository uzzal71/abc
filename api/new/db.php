<?php

$servername = "localhost";
$dbname = "abc_07012019_2";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $dbname); 
if ($conn -> connect_error) {
 	die("error" . $conn -> connect_error);
 } 



?>