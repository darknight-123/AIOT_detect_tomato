<?php
if(empty($_POST['Month']))
{		require_once "../conn.php";
	    $RaspberryID=$_POST['ID'];
		$sql="select * from conditions where RaspberryID='$RaspberryID' ORDER BY Day";
		$result=$conn->query($sql);
		while ($row = $result->fetch_assoc()){
			$timestamp=strtotime($row['Day']);
			$Month=date('Y-m',$timestamp);
			
		}
		$_POST['Month']=$Month;
}		

?>