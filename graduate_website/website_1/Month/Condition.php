<?php
	
	if(isset($_POST['ID']))
	{
		require_once "../conn.php";
		$RaspberryID=$_POST['ID'];
		//尋找最小日期
		
		
		//搜尋結果
		if(!empty($_POST['Month']) and !empty($_POST['Class']))
		{
			$Month=$_POST['Month'] . '-1';
			$Class=$_POST['Class'];
			if($Class=='All')
			{
				
				$sql="select * from conditions where RaspberryID='$RaspberryID' and MONTH(Day)=MONTH('$Month') and YEAR(Day)=YEAR('$Month') ORDER BY Day";
			}
			else
			{
				
				$sql="select * from conditions where RaspberryID='$RaspberryID' and MONTH(Day)=MONTH('$Month') and YEAR(Day)=YEAR('$Month') and $Class>0 ORDER BY Day";
			}
			
			$result=$conn->query($sql);
			if($Class!='All')
			{
				while($row=$result->fetch_assoc()){
					$same=0;
					if(!empty($Days))
					{
						for($t=0;$t<count($Days);$t++)
							{
								if($Days[$t]==$row['Day'])
								{
									$same=1;
									break;
								}
							}
					}
					if($same==0)
					{
						$Days[]=$row['Day'];
						
					}
				}
				if(!empty($Days)){
				for($k=0;$k<count($Days);$k++)
				{
					
					$sql="select * from conditions where RaspberryID='$RaspberryID' and Day='$Days[$k]'";
					$result=$conn->query($sql);
					while ($row = $result->fetch_assoc()) {
				
						$same=0;
						if(!empty($conditions))
							{
								for($t=0;$t<count($conditions);$t++)
									{
										if($conditions[$t]['Day']==$row['Day'])
											{
												
												$conditions[$t]['moisture']+=$row['moisture'];
												$conditions[$t]['TomatoWorm']+=$row['TomatoWorm'];
												$conditions[$t]['TabaccoWorm']+=$row['TabaccoWorm'];
												$conditions[$t]['BeetWorm']+=$row['BeetWorm'];
												$conditions[$t]['Problems']+=$row['Problems'];
												$conditions[$t]['None']+=$row['None'];
												$conditions[$t]['Tomato']+=$row['Tomato'];
												$conditions[$t]['TomatoFlower']+=$row['TomatoFlower'];
												$conditions[$t]['Count']+=1;
												$same=1;
											}
									}
							}
						if($same==0)
						{
							
							$conditions[]=$row;
							$conditions[count($conditions)-1]['Count']=1;
						}	
						$_SESSION['pre_ID']=$_POST['ID'];$_SESSION['pre_Month']=$_POST['Month'];$_SESSION['pre_Class']=$_POST['Class'];$_SESSION['pre_Condition']=$conditions;
						
					}
				}
				}
			}
			else{
			
				while ($row = $result->fetch_assoc()) {
					
					$same=0;
					if(!empty($conditions))
					{
						for($t=0;$t<count($conditions);$t++)
						{
							if($conditions[$t]['Day']==$row['Day'])
							{
								
								$conditions[$t]['moisture']+=$row['moisture'];
								$conditions[$t]['TomatoWorm']+=$row['TomatoWorm'];
								$conditions[$t]['TabaccoWorm']+=$row['TabaccoWorm'];
								$conditions[$t]['BeetWorm']+=$row['BeetWorm'];
								$conditions[$t]['Problems']+=$row['Problems'];
								$conditions[$t]['None']+=$row['None'];
								$conditions[$t]['Tomato']+=$row['Tomato'];
								$conditions[$t]['TomatoFlower']+=$row['TomatoFlower'];
								$conditions[$t]['Count']+=1;
								$same=1;
							}
						}
					}
					if($same==0)
					{
						
						$conditions[]=$row;
						$conditions[count($conditions)-1]['Count']=1;
					}	
					$_SESSION['pre_ID']=$_POST['ID'];$_SESSION['pre_Month']=$_POST['Month'];$_SESSION['pre_Class']=$_POST['Class'];$_SESSION['pre_Condition']=$conditions;		
				    
				}
			}
			////////////算平均/////////
			if(!empty($conditions)){
			for($t=0;$t<count($conditions);$t++)
			{
				$conditions[$t]['moisture']=round($conditions[$t]['moisture']/$conditions[$t]['Count'],2);
				$conditions[$t]['TomatoWorm']=round($conditions[$t]['TomatoWorm']/$conditions[$t]['Count'],2);
				$conditions[$t]['TabaccoWorm']=round($conditions[$t]['TabaccoWorm']/$conditions[$t]['Count'],2);
				$conditions[$t]['BeetWorm']=round($conditions[$t]['BeetWorm']/$conditions[$t]['Count'],2);
				$conditions[$t]['Problems']=round($conditions[$t]['Problems']/$conditions[$t]['Count'],2);
				$conditions[$t]['None']=round($conditions[$t]['None']/$conditions[$t]['Count'],2);
				$conditions[$t]['Tomato']=round($conditions[$t]['Tomato']/$conditions[$t]['Count'],2);
				$conditions[$t]['TomatoFlower']=round($conditions[$t]['TomatoFlower']/$conditions[$t]['Count'],2);
			}
			}
		}
		
	}
?>