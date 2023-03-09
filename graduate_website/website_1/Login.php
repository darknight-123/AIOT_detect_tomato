<?php

 if(isset($_POST['Username'])&& isset($_POST['Password']))
 {
	 require_once "conn.php";
	 $Username=$_POST['Username'];
	 $Password=$_POST['Password'];
	 print($Username);
	 $sql="select * from user where Username='$Username'";
	 $result=$conn->query($sql);
	 $row = $result->fetch_assoc();
	 if(!empty($row))
	 {
		$password_hash= $row['Password'];
	 }
	if($result->num_rows >0&&password_verify($Password, $password_hash))
	{
			
			$_POST['Result']="success";
	}
	else
	{
		 
		 $_POST['Result']="failure";
	}
	 
	 
 }
?>
