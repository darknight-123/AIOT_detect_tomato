<!--<!DOCTYPE html>
<html lang="en">-->
    <?php
    
    $_POST["Username"]=$_SESSION["Username"];
    require_once "../Raspberry.php";
	require_once "Small_date.php";
	
    ?>
<!---    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=”viewport” content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>設定條件</title>
</head>
<body>
--->

<style>

.div1 {

display: inline-block;

}


</style>
<div style="margin-top:20px;">
		<a href='../../index.php'><button style='width:85px;height:30px;font-size:20px;'>登出</button></a>
	</div>
</br>
<a href='../Day/Graph.php'><button style='margin-top:5%;margin-left:35%;width:100px;height:30px;font-size:100%;'>日期模式</button></a>
<a href='../Month/Graph.php'><button style='margin-left:20%;width:100px;height:30px;font-size:100%;'>月份模式</button></a>
<div style="margin-top:100px;margin-left:35%;">
<!--------------------------RaspberryID選擇------------------------->
	<div class="div1">
	<p   style="font-size:30px;">請選擇要查看的RaspberryID:</p>
	</div>
	<div class="div1">
	<form action="" method="POST">
		<select name="ID" style='width:100px;height:30px;font-size:20px;'> 
			<?php 
				foreach($list as $key => $value){ if(!isset($default_ID)){$default_ID=$value['RaspberryID'];} ?>
					<option value="<?php echo $value['RaspberryID'];?>" <?php if(!empty($_POST['ID']) and $_POST['ID'] == $value['RaspberryID']) echo " selected" ?>><?php echo $value['RaspberryID'];     ?></option> 
			<?php } ?>
		</select>
	</div>
<!------------------------------------日期選擇--------------------------->
	</br>
	<div class="div1">
	<p style="font-size:30px;">請選擇週期:</p>
	</div>
	<div class="div1">
	<input type="date" name="Month" style='width:150px;height:30px;font-size:20px;' value="<?php if(!empty($_POST['Month'])){echo $_POST['Month'];}else if(!empty($Final_Day)){echo $Final_Day;}else{date('Y-m-d');}?>" min="<?php if(!empty($Inital_Day)){echo $Inital_Day;}else{date('Y-m-d');}?>" max="<?php if(!empty($Final_Day)){echo $Final_Day;}else{date('Y-m-d');}?>" size="50">
	</div>
	
<!----------------------------------類別選擇----------------------------->
	</br>
	<div class="div1">
	<p style="font-size:30px;">請選擇該天是否有出現該類別:</p>
	</div>
	<div class="div1">
	<select name="Class" style='width:200px;height:30px;font-size:20px;'>
	<option value="All" <?php if(isset($_POST['Class']) and $_POST['Class']=='All'){echo 'selected';}?>>全部類別與時間段</option>
	<option value="TomatoWorm" <?php if(isset($_POST['Class']) and $_POST['Class']=='TomatoWorm'){echo 'selected';}?>>番茄夜蛾</option>
	<option value="TabaccoWorm" <?php if(isset($_POST['Class']) and $_POST['Class']=='TabaccoWorm'){echo 'selected';}?>>斜紋夜盜蛾</option>
	<option value="BeetWorm" <?php if(isset($_POST['Class']) and $_POST['Class']=='BeetWorm'){echo 'selected';}?>>甜菜夜蛾</option>
	<option value="Problems" <?php if(isset($_POST['Class']) and $_POST['Class']=='Problems'){echo 'selected';}?>>有問題的葉子</option>
	<option value="None" <?php if(isset($_POST['Class']) and $_POST['Class']=='None'){echo 'selected';}?>>其他物種</option>
	<option value="Tomato" <?php if(isset($_POST['Class']) and $_POST['Class']=='Tomato'){echo 'selected';}?>>番茄</option>
	<option value="TomatoFlower" <?php if(isset($_POST['Class']) and $_POST['Class']=='TomatoFlower'){echo 'selected';}?>>番茄花</option>
	</select>
	</div>
	</br>
	</div>
	<!------------------------------送出--------------------------------->
	<div style="text-align:center;">
	<input style='margin-top:100px;width:80px;height:30px;font-size:20px;' type=submit value="查看"></input>
	</div>
	</form>
	
	<?php
			
			if(!empty($_POST['Month']))
			{
				
				//if(isset($conditions))
				//{
					//$_SESSION['Tempature_ID']=$_POST['Tempature_ID'];
					//$_SESSION['ID']=$_POST['ID'];
					//$_SESSION['Day']=$_POST['Day'];
					//$_SESSION['Class']=$_POST['Class'];
					//header("Location: Graph.php"); 
				//}
				require_once "Condition.php";
				if(empty($conditions))
				{
					echo "<script>alert('該時間點沒有資料');</script>";
					$_POST['ID']=$_SESSION['pre_ID'];
					$_POST['Month']=$_SESSION['pre_Month'];
					$_POST['Class']=$_SESSION['pre_Class'];
					
					
				}
			}
			if(empty($_POST['ID']))
			{
				
				$_POST['ID']=$default_ID;
			}
			if(empty($_POST['Class']))
			{
				$_POST['Class']="All";
			}
			if(empty($_POST['Month']))
			{
				$timeable=strtotime($Final_Day);
				$_POST['Month']=$Final_Day;
			}
		?>
	<!-------------------------------------------------------------------->
	
	

<!--
</body>
</html>-->