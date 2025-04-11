<?php
	
	if (isset ($_POST['ID'])) {
		require_once "../conn.php";
		$RaspberryID = $_POST['ID'];
		//尋找最小日期
		//搜尋結果
		if (!empty($_POST['Day']) and !empty($_POST['Class'])) {
			$Day   = $_POST['Day'];
			$Class = $_POST['Class'];
			
			if ($Class == 'All') {
				$sql = "select * from conditions where RaspberryID = '$RaspberryID' and Day = '$Day'";
			}
			else {
				$sql = "select * from conditions where RaspberryID = '$RaspberryID' and Day = '$Day' and $Class > 0";
			}
			
			$result = $conn->query($sql);
			
			while ($row = $result->fetch_assoc()) {
				$conditions[] = $row;
				$_SESSION['pre_ID']        = $_POST['ID'];
				$_SESSION['pre_Day']       = $_POST['Day'];
				$_SESSION['pre_Class']     = $_POST['Class'];
				$_SESSION['pre_Condition'] = $conditions;		
			}
		}
		
	}
?>
