<?php
if (empty ($_POST['Day'])) {		
	require_once "../conn.php";
	$RaspberryID = $_POST['ID'];
	$sql         = "select * from conditions where RaspberryID = '$RaspberryID' ORDER BY Day";
		
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()){	
		$Day = $row['Day'];
	}
	$_POST['Day'] = $Day;	
}		
?>
