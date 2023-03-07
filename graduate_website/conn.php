<?php

$server="localhost";
$username="root";
$password="";
$database="test";

//$socket="";

$conn=new mysqli($server,$username,$password,$database);
mysqli_query($conn,"set names utf8");
//echo $server;
if($conn->connect_error){
	die("Connection failed:" . $conn->connect_error);
}

?>
