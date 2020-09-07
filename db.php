<?php

$servername = "localhost";
$username = "root";
$password= "";
$database = "user";


$conn = new mysqli($servername,$username,$password,$database);

if($conn === false){

die("could not connect". $conn->connect_error);

}



 ?>
