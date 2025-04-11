<?php
require_once "../conn.php";
foreach ($list as $key => $value) {
	$ID     = $value['RaspberryID'];			
	$sql    = "select * from conditions where RaspberryID=$ID";
	$result = $conn->query($sql);
	$row    = $result->fetch_assoc();
	if (!empty ($row['Day']) and (empty($Inital_Day) or strtotime($Inital_Day) > strtotime ($row['Day']))) {
		$Inital_Day = $row['Day'];
		$Final_Day  = $row['Day'];
	}
	while ($row = $result->fetch_assoc()) {
		if (strtotime ($Final_Day) < strtotime ($row['Day']))
			$Final_Day = $row['Day'];
	}
}
?>
