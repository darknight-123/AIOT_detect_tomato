<?php
$server="localhost";
$username="root";
$password="";
$database="test";
$conn=new mysqli($server,$username,$password,$database);
mysqli_query($conn,"set names utf8");
if($conn->connect_error){
	die("Connection failed:" . $conn->connect_error);
}
?>