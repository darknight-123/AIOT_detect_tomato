<?php
	if(isset($_POST['Tempature_ID']))
	{
		require_once "../conn.php";
		$RaspberryID=$_POST['Tempature_ID'];
		//尋找最小日期
		
		//搜尋結果
		if(!empty($_POST['Month']))
		{
			$Class=$_POST['Class'];
			$Month=$_POST['Month'];
			$Month=$Month . '-01';
			if($Class=='All')
			{
				$sql="select * from location_tempature where RaspberryID='$RaspberryID' and MONTH(Day)=MONTH('$Month') and YEAR(Day)=YEAR('$Month') ORDER BY Day";
			}
			else
			{
				$sql="select * from location_tempature where RaspberryID='$RaspberryID' and MONTH(Day)=MONTH('$Month') and YEAR(Day)=YEAR('$Month') ORDER BY Day";
			}
			$result=$conn->query($sql);
			
			while ($row = $result->fetch_assoc()) {
				$same=0;
				if(!empty($location_tempature))
				{
					for($t=0;$t<count($location_tempature);$t++)
					{
						if($location_tempature[$t]['Day']==$row['Day'])
						{
							$location_tempature[$t]['Tempature']+=$row['Tempature'];
							$location_tempature[$t]['Count']+=1;
							$same=1;
						}
					}
				}
				if($same==0)
				{
					$location_tempature[]=$row;
					$location_tempature[count($location_tempature)-1]['Count']=1;
				}	
			}
			////////////算平均/////////
			for($t=0;$t<count($location_tempature);$t++)
			{
				$location_tempature[$t]['Tempature']=round($location_tempature[$t]['Tempature']/$location_tempature[$t]['Count'],2);
			}
			
		}
	}
?>