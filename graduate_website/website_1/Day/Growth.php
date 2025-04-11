<?php
if (isset($_POST['ID']) and isset($_POST['Day']))
{
	require_once "../conn.php";
	$ID  = $_POST['ID'];
	$Day = $_POST['Day'];	
	$sql = "select * from tomato_growth where RaspberryID = '$ID' and Day = '$Day'";
	
	$result = $conn->query ($sql);
	$row    = $result->fetch_assoc();
	if (!empty ($row)) {
		$_POST['Growth'] = $row['Growth'];
	}
	else {
		$_POST['Growth']='無資料';
	}
}

?>
