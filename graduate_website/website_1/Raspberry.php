<?php

if(isset($_POST['Username']))
{
	
	require_once "conn.php";
	
	$Username=$_POST['Username'];
	$sql="select * from raspberry where Username='$Username'";
	$result=$conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		
		if($row['is_tempature']=='Y')
		{
			
			$_POST['Tempature_ID']=$row['RaspberryID'];
			
		}
		$list[]=$row;
	
  }
	
}

?>