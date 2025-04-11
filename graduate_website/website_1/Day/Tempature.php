<?php
print ($_POST['Tempature_ID']);
	if (isset ($_POST['Tempature_ID']))
	{
		require_once "../conn.php";
		$RaspberryID = $_POST['Tempature_ID'];
		//尋找最小日期
		
		//搜尋結果
		if (!empty ($_POST['Day']))
		{
			$Day    = $_POST['Day'];
			$sql    = "select * from location_tempature where RaspberryID = '$RaspberryID' and Day = '$Day'";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
				$location_tempature[]=$row;
			}
		}
	}
?>
