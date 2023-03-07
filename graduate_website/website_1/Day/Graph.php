<!DOCTYPE html>
<html lang="en">
<?php
session_start();

#if(!empty($_SESSION['pre_ID']) and !empty($_SESSION['pre_Day']) and !empty($_SESSION['pre_Condition']) and !empty($_SESSION['pre_Class'])){
#	$_POST['ID']=$_SESSION['pre_ID'];
#	$_POST['Day']=$_SESSION['pre_Day'];
#	$_POST['Condition']=$_SESSION['pre_Condition'];
#	$_POST['Class']=$_SESSION['pre_Class'];

#}

require_once "Setting.php";


require_once "Tempature.php";
require_once "Growth.php";
?>	
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=”viewport” content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <title>報表</title>
</head>
<style type="text/css">
	 body{
	 	background:#ccc;
	 }
	    *{
	    	padding: 0px;
	    	margin: 0px;

	    }
      
     .head{
     	background: white;
     	color: RGB(225,66,0);
     	padding: 10px 70px;
     	font-family: sans-serif;
     	font-size: 30px;
     	border-top:10px solid #37f;	
     }


	    .nav{
	    	padding: 10px 0px;
	    	background: #37f;
	    	text-align: center;
	    }

         .main-menu>li{
         	display: inline-block;
         	width: 150px;
         	padding: 10px 0px;
         	margin-left: 10px;
         	text-align: center;
         	color: white;
         	font-size: 20px;
         	border-left: 1px solid white;
         	transition: .4s;
         	cursor: pointer;
         	box-sizing: border-box;

         }
         
         .main-menu li:hover .sub-menu{
              display: block;
         }
 
         .sub-menu{
         	display: none;
         	position: absolute;
         	padding: 0px;
         	margin-top: 30px;
         	margin-left: -10px;	
         	float: left;
         	width: 300px; 
         	text-align: left;
         	box-sizing: border-box;
         	border: 5px solid white;
         	box-shadow: 1px 1px 1px grey;
         	
       
         }

         .sub-menu:before{
                 content:"";
                 width: 0px;
                 height:0px;
                 border-left:20px solid transparent;
                 border-right:20px solid transparent;
                 border-bottom:30px solid white;
                 position: absolute;
                 margin:-30px 0px 0px 60px;
         }

         .sub-menu li{
         	list-style-type: none;
         	padding: 10px;
         	color: white;
         	font-size: 20px;
         	background: #37f;
         }
     .main-menu>li:hover, .sub-menu>li:hover{
         	background: #35c;
         }
 
	</style>
<body>
	
    <div style="margin-top:100px;text-align:center;font-size:40px;">
	
	<p>機台ID:<?php echo $_POST['ID'];?><br>當天日期:<?php echo $_POST['Day'];?><br>生長狀態:<?php echo $_POST['Growth'];?><br></p>
	<div class="nav">
	<div class="container_0">
		<ul class="main-menu">
			<li><a href="javascript:void(0)" style='text-decoration:none;font-size:30px;color: #f44336;' class="bar-item button tablink_0 testbtn_0" onclick="openClass_0(event, 'classes1')">溫溼度</a></li>
			<li><a href="javascript:void(0)" style='text-decoration:none;font-size:30px;color: #f44336;' class="bar-item button tablink_0" onclick="openClass_0(event, 'classes2')">偵測結果</a></li>
			<li><a href="javascript:void(0)" style='text-decoration:none;font-size:30px;color: #f44336;' class="bar-item button tablink_0" onclick="openClass_0(event, 'classes3')">照片</a></li>
		</ul>
	</div>
	</div>
	<?php if(!isset($conditions)){$conditions=$_SESSION['pre_Condition'];} ?>
	<div id="classes1" class="container_0 class_0">
	<!-----------選擇溫濕度----------------------------------------->
	<div style="margin-top:100px;" class="bar-block_1">
	  <div class="container_1">
			<h5>土壤濕度,溫度表格</h5>
			<center><table  style="border:5px #1b21de solid;padding:10px;font-size:25px" rules="all" cellpadding='5';>
					<tr>
					<td width="100px">時間</td>
					<td>土壤濕度</td>
					<td>溫度</td>
					</tr>
					<?php $i=0; foreach($conditions as $key => $value){echo '<tr> <td>' . $value['Time'] . '</td>' . '<td>' . $value['moisture']. '</td> <td>' . $location_tempature[$i]['Tempature'] . '</td> </tr>'; $i++;}?>
			</table></center>
			<h5 style="margin-top:100px">請點選土壤濕度或溫度圖表</h5>
			<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink_1 testbtn_1" onclick="openClass_1(event, 'class1')" title="土壤濕度"><input type="image" src='../../icon/moisture.png' alt="圖片" width="60"> </a>
			<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink_1" onclick="openClass_1(event, 'class2')" title='溫度'><input type="image" src='../../icon/temperature.jfif' alt="圖片" width="60"> </a>
	   </div>
    </div>
	
	<!--------------------------------------------------濕度表格------------------------------------------------->
	<center>
		
		<div id="class1" class="container_1 class_1">
			<div style="width:720px;height:500px;">
				<canvas id="barChart_0"></canvas>
			</div>
		</div>
	</center>
	<!--------------------------------------------------溫度表格------------------------------------------------->
	<center>	
		<div id="class2" class="container_1 class_1">
			<div style="width:720px;height:500px;">
				<canvas id="barChart_1"></canvas>
			</div>
		</div>
	</center>
	</div>
	<div id="classes2" class="container_0 class_0">
	<!--------------------------------類別選擇---------------------------------------------------->
	<div  style="margin-top:100px;" class="bar-block">
	  <div class="container">
			<?php if($_POST['Class']=='All')
			 { ?>
			 <h5>類別表格</h5>
				 <center><table  style="border:5px #1b21de solid;padding:10px;font-size:25px" rules="all" cellpadding='5';>
					<tr>
					<td>時間</td>
					<td>番茄夜蛾</td>
					<td>斜紋夜盜蛾</td>
					<td>甜菜夜蛾</td>
					<td>有問題的葉子</td>
					<td>其他物種</td>
					<td>番茄</td>
					<td>番茄花</td>
					</tr>
					<?php foreach($conditions as $key => $value){echo '<tr> <td>' . $value['Time'] . '</td> <td>' . $value['TomatoWorm'] .
'</td><td>' . $value['TabaccoWorm'] . '</td> <td>' . $value['BeetWorm']. '</td> <td>' . $value['Problems'] . '</td> <td>' . $value['None'] . '</td> <td>' . $value['Tomato'] . '</td> <td>' . $value['TomatoFlower'] 	. '</td> </tr>';}?>
				</table></center>
				
				<h5 style="margin-top:100px;">請點選要看的類別圖表</h5>
				<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink testbtn" onclick="openClass(event, 'class3')" title='番茄夜蛾'><input type="image" src='../../icon/tomatoworm_17.png' alt="圖片" width="80"></a>
				<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink" onclick="openClass(event, 'class4')" title='斜紋夜盜蛾'><input type="image" src='../../icon/tabaccoworm_1.png' alt="圖片" width="80"></a>
				<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink" onclick="openClass(event, 'class5')" title='甜菜夜蛾'><input type="image" src='../../icon/beetworm_2.png' alt="圖片" width="80"></a>
				<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink" onclick="openClass(event, 'class6')" title='有問題的葉子'><input type="image" src='../../icon/problems.png' alt="圖片" width="50"></a>
				<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink" onclick="openClass(event, 'class7')" title='其他物種'><input type="image" src='../../icon/none_11.png' alt="圖片" width="80"></a>
				<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink" onclick="openClass(event, 'class8')" title='番茄'><input type="image" src='../../icon/tomato_12.png' alt="圖片" width="80"></a>
				<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink" onclick="openClass(event, 'class9')" title='番茄花'><input type="image" src='../../icon/tomatoflower.png' alt="圖片" width="80"></a>
			<?php } 
				else if($_POST['Class']=='TomatoWorm'){ ?>
					
					<h5>番茄夜蛾出現時間點與數量</h5>
					<center><table  style="border:5px #1b21de solid;padding:10px;font-size:25px" rules="all" cellpadding='5';>
					<tr>
					<td>時間</td>
					<td>番茄夜蛾</td>
					</tr>
					<?php foreach($conditions as $key => $value){echo '<tr> <td>' . $value['Time'] . '</td>' . '<td>' . $value['TomatoWorm'] . '</td> </tr>';}?>
					</table></center>
					<div style="margin-top:100px;">
					<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink testbtn" onclick="openClass(event, 'class3')" title='番茄夜蛾'><input type="image" src='../icon/tomatoworm_17.png' alt="圖片" width="80"></a>
					</div>
			<?php } 
				else if($_POST['Class']=='TabaccoWorm'){ ?>
					<h5>斜紋夜盜蛾出現時間點與數量</h5>
					<center><table  style="border:5px #1b21de solid;padding:10px;font-size:25px" rules="all" cellpadding='5';>
					<tr>
					<td>時間</td>
					<td>斜紋夜盜蛾</td>
					</tr>
					<?php foreach($conditions as $key => $value){echo '<tr> <td>' . $value['Time'] . '</td>' . '<td>' . $value['TabaccoWorm'] . '</td> </tr>';}?>
					</table></center>
					<div style="margin-top:100px;">
					<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink testbtn" onclick="openClass(event, 'class4')" title='斜紋夜盜蛾'><input type="image" src='../icon/tabaccoworm_1.png' alt="圖片" width="80"></a>
					</div>
			<?php } 
				else if($_POST['Class']=='BeetWorm'){ ?>
					<h5>甜菜夜蛾出現時間點與數量</h5>
					<center><table  style="border:5px #1b21de solid;padding:10px;font-size:25px" rules="all" cellpadding='5';>
					<tr>
					<td>時間</td>
					<td>甜菜夜蛾</td>
					</tr>
					<?php foreach($conditions as $key => $value){echo '<tr> <td>' . $value['Time'] . '</td>' . '<td>' . $value['BeetWorm'] . '</td> </tr>';}?>
					</table></center>
					<div style="margin-top:100px;">
					<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink testbtn" onclick="openClass(event, 'class5')" title='甜菜夜蛾'><input type="image" src='../icon/beetworm_2.png' alt="圖片" width="80"></a>
					</div>
			<?php } 
				else if($_POST['Class']=='Problems'){ ?>
					<h5>有問題的葉子出現時間點與數量</h5>
					<center><table  style="border:5px #1b21de solid;padding:10px;font-size:25px" rules="all" cellpadding='5';>
					<tr>
					<td>時間</td>
					<td>有問題的葉子</td>
					</tr>
					<?php foreach($conditions as $key => $value){echo '<tr> <td>' . $value['Time'] . '</td>' . '<td>' . $value['Problems'] . '</td> </tr>';}?>
					</table></center>
					<div style="margin-top:100px;">
					<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink testbtn" onclick="openClass(event, 'class6')" title='有問題的葉子'><input type="image" src='../icon/problems.png' alt="圖片" width="80"></a>
					</div>
			<?php } 
				else if($_POST['Class']=='None'){ ?>
					<h5>其他物種出現時間點與數量</h5>
					<center><table  style="border:5px #1b21de solid;padding:10px;font-size:25px" rules="all" cellpadding='5';>
					<tr>
					<td>時間</td>
					<td>其他物種</td>
					</tr>
					<?php foreach($conditions as $key => $value){echo '<tr> <td>' . $value['Time'] . '</td>' . '<td>' . $value['None'] . '</td> </tr>';}?>
					</table></center>
					<div style="margin-top:100px;">
					<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink testbtn" onclick="openClass(event, 'class7')" title='其他物種'><input type="image" src='../icon/none_11.png' alt="圖片" width="80"></a>
					</div>
			<?php } 
				else if($_POST['Class']=='Tomato'){ ?>
					<h5>番茄出現時間點與數量</h5>
					<center><table  style="border:5px #1b21de solid;padding:10px;font-size:25px" rules="all" cellpadding='5';>
					<tr>
					<td>時間</td>
					<td>番茄</td>
					</tr>
					<?php foreach($conditions as $key => $value){echo '<tr> <td>' . $value['Time'] . '</td>' . '<td>' . $value['Tomato'] . '</td> </tr>';}?>
					</table></center>
					<div style="margin-top:100px;">
					<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink testbtn" onclick="openClass(event, 'class8')" title='番茄'><input type="image" src='../icon/tomato_12.png' alt="圖片" width="80"></a>
					</div>
			<?php } 
				else if($_POST['Class']=='TomatoFlower'){ ?>
					<h5>番茄花出現時間點與數量</h5>
					<center><table  style="border:5px #1b21de solid;padding:10px;font-size:25px" rules="all" cellpadding='5';>
					<tr>
					<td>時間</td>
					<td>番茄花</td>
					</tr>
					<?php foreach($conditions as $key => $value){echo '<tr> <td>' . $value['Time'] . '</td>' . '<td>' . $value['TomatoFlower'] . '</td> </tr>';}?>
					</table></center>
					<div style="margin-top:100px;">
					<a href="javascript:void(0)" style='text-decoration:none;font-size:20px;' class="bar-item button tablink testbtn" onclick="openClass(event, 'class9')" title='番茄花'><input type="image" src='../icon/tomatoflower.png' alt="圖片" width="70"></a>
					</div>
			<?php } ?>
	   </div>
  </div>
  
  

<!--------------------------------------------TomatoWorm表格------------------------------------------------->
	<?php if($_POST['Class']=='TomatoWorm' or $_POST['Class']=='All'){ ?>
	<center>	
		<div id="class3" class="container class">
			<div style="width:720px;height:500px;">
				<canvas id="barChart_2"></canvas>
			</div>
		</div>
	</center><?php } ?>
<!--------------------------------------------TabacooWorm表格------------------------------------------------->
	<?php if($_POST['Class']=='TabaccoWorm' or $_POST['Class']=='All'){ ?>
	<center>	
		<div id="class4" class="container class">
			
			<div style="width:720px;height:500px;">
				<canvas id="barChart_3"></canvas>
			</div>
		</div>
	</center>
	<?php } ?>
<!--------------------------------------------BeetWorm表格------------------------------------------------->
	<?php if($_POST['Class']=='BeetWorm' or $_POST['Class']=='All'){ ?>
	<center>	
		<div id="class5" class="container class">
			
			<div style="width:720px;height:500px;">
				<canvas id="barChart_4"></canvas>
			</div>
		</div>
	</center>
	<?php } ?>
<!--------------------------------------------Problem_Leaves表格------------------------------------------------->
	<?php if($_POST['Class']=='Problems' or $_POST['Class']=='All'){ ?>
	<center>	
		<div id="class6" class="container class">
			
			<div style="width:720px;height:500px;">
				<canvas id="barChart_5"></canvas>
			</div>
		</div>
	</center>	
	<?php } ?>
<!--------------------------------------------None表格------------------------------------------------->
	<?php if($_POST['Class']=='None' or $_POST['Class']=='All'){ ?>
	<center>	
		<div id="class7" class="container class">
			
			<div style="width:720px;height:500px;">
				<canvas id="barChart_6"></canvas>
			</div>
		</div>
	</center>
	<?php } ?>
<!--------------------------------------------Tomato表格------------------------------------------------->
	<?php if($_POST['Class']=='Tomato' or $_POST['Class']=='All'){ ?>
	<center>	
		<div id="class8" class="container class">
			
			<div style="width:720px;height:500px;">
				<canvas id="barChart_7"></canvas>
			</div>
		</div>
	</center>
	<?php } ?>
<!--------------------------------------------TomatoFlower表格------------------------------------------------->
	<?php if($_POST['Class']=='TomatoFlower' or $_POST['Class']=='All'){ ?>
	<center>	
		<div id="class9" class="container class">
			
			<div style="width:720px;height:500px;">
				<canvas id="barChart_8"></canvas>
			</div>
		</div>
	</center>
	<?php } ?>
	</div>
	
	<div id="classes3" class="container_0 class_0">
	

<!-------------------------------------------查看照片時間點按鍵------------------------------------------------------>

<div style="margin-top:100px;">
  
    <h5>請選擇要看的時間點照片</h5>
<select id="slt1" class="form-control" style="width:150px;height:40px;font-size:30px;">
<?php
	$count=10;
	 foreach($conditions as $key => $value){
		 if($count==10)
		 {
		 ?>	
			 <option  value="#tab_<?php echo strval($count);?>" style='font-size:30px;' selected="selected"> <?php echo $value['Time'];?></option>
			 <?php
		 }
		 else{?>
			 <option value="#tab_<?php echo strval($count);?>" style='font-size:30px;'> <?php echo $value['Time'];?></option>
		 <?php }
			 $count=$count+1;
			
			 }
			
			?></select>
	
</div>


<?php
	$count=10;
	
	foreach($conditions as $key => $value){ ?>
	<center>	
	
	<div id="tab_<?php echo strval($count);?>">
	
	<img src='../../picture/<?php echo $value['Picture'];?>' class="form-control">
	</div>
	</center><?php $count=$count+1;} 
?>
</div>




</div>
</body>

<script>
    function openClass_0(evt, className) {
  var i, x, tablinks_0;
  // x抓取頁面中的class="class"
  x = document.getElementsByClassName("class_0");
  //計算x的長度並將這些class="class"都進行display:none隱藏的動作
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  //tablinks 抓取頁面中的tablink
  tablinks_1 = document.getElementsByClassName("tablink_0");
  //將tablinks代入for循環中並利用classList.remove刪除class="red" ，就是每執行一次function的時候就進行全部tablinks移除class="red"
  for (i = 0; i < x.length; i++) {
     tablinks_1[i].classList.remove("red");
  }
  //document.getElementById=className(函數帶進來的參數)樣式設定為display:block; 當前點擊的a link執行function 顯示出來對應的內容。
  document.getElementById(className).style.display = "block";
  //並對當前點擊的 a link 新增“red” 這個class
  evt.currentTarget.classList.add("red");
}
//預設testbtn 這個class頁面一加載後執行click();的動作。也就是點擊了testbtn有這個class的按鈕來執行上方寫的function 
var mybtn = document.getElementsByClassName("testbtn_0")[0];
mybtn.click();
</script>

<script>
    function openClass(evt, className) {
  var i, x, tablinks;
  // x抓取頁面中的class="class"
  x = document.getElementsByClassName("class");
  //計算x的長度並將這些class="class"都進行display:none隱藏的動作
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  //tablinks 抓取頁面中的tablink
  tablinks = document.getElementsByClassName("tablink");
  //將tablinks代入for循環中並利用classList.remove刪除class="red" ，就是每執行一次function的時候就進行全部tablinks移除class="red"
  for (i = 0; i < x.length; i++) {
     tablinks[i].classList.remove("red");
  }
  //document.getElementById=className(函數帶進來的參數)樣式設定為display:block; 當前點擊的a link執行function 顯示出來對應的內容。
  document.getElementById(className).style.display = "block";
  //並對當前點擊的 a link 新增“red” 這個class
  evt.currentTarget.classList.add("red");
}
//預設testbtn 這個class頁面一加載後執行click();的動作。也就是點擊了testbtn有這個class的按鈕來執行上方寫的function 
var mybtn = document.getElementsByClassName("testbtn")[0];
mybtn.click();
</script>


<script>
    function openClass_1(evt, className) {
  var i, x, tablinks_1;
  // x抓取頁面中的class="class"
  x = document.getElementsByClassName("class_1");
  //計算x的長度並將這些class="class"都進行display:none隱藏的動作
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  //tablinks 抓取頁面中的tablink
  tablinks_1 = document.getElementsByClassName("tablink_1");
  //將tablinks代入for循環中並利用classList.remove刪除class="red" ，就是每執行一次function的時候就進行全部tablinks移除class="red"
  for (i = 0; i < x.length; i++) {
     tablinks_1[i].classList.remove("red");
  }
  //document.getElementById=className(函數帶進來的參數)樣式設定為display:block; 當前點擊的a link執行function 顯示出來對應的內容。
  document.getElementById(className).style.display = "block";
  //並對當前點擊的 a link 新增“red” 這個class
  evt.currentTarget.classList.add("red");
}
//預設testbtn 這個class頁面一加載後執行click();的動作。也就是點擊了testbtn有這個class的按鈕來執行上方寫的function 
var mybtn = document.getElementsByClassName("testbtn_1")[0];
mybtn.click();
</script>


<!------------------照片------------------------>
<script>
$(function(){
  //全部選擇隱藏
  $('div[id^="tab_"]').hide();
  $('#tab_10').show();
  $('#slt1').change(function(){
    let sltValue=$(this).val();
    console.log(sltValue);
	
	
    $('div[id^="tab_"]').hide();
    //指定選擇顯示
    $(sltValue).show();
  });
  
});
</script>
<!--------------------------------------------畫濕度折線圖-------------------------------------->
<script>
    // 功能 返回隨機的顏色值
    // @param opacity 透明度
    // @return rgba格式顏色值
    var dynamicColors = function (opacity) {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        var a = opacity;
        return "rgba(" + r + "," + g + "," + b + "," + a + ")";
    }

    // 功能 返回rgba格式顏色數組
    // @param length 數組的長度
    // @param opacity 顏色的透明度
    // return 返回rgba數組
    var getColorArr = function (length, opacity) {
        var colorArr = new Array();
        for (var i = 0; i < length; i++) {
            colorArr.push(dynamicColors(opacity));
        }
        return colorArr;
    }

    
    // 準備數據
    var labels = [];
	<?php
	foreach($conditions as $key=>$value)
	{?>
	labels.push('<?php echo  $value['Time'];?>')
	<?php
	;}
	?>
    var data = [<?php foreach($conditions as $key => $value){echo  $value['moisture'] . ',';}?>];
	var color=getColorArr(labels.length,0.5);
    var chartData = {
        // x軸顯示的label
        labels: labels,
        datasets: [{
            data: data, // 數據               
            label: '土壤濕度',// 圖例
            backgroundColor: color,
			fill:false,
            borderColor: color,
            borderWidth: 3,
            
        }]
    };
    // 繪製圖表
    var ctx = document.getElementById('barChart_0').getContext('2d');
    var bar = new Chart(ctx, {
        type: 'line',
        data: chartData,
        options: {
            hover: {
                animationDuration: 0
            },
            animation: {
                onComplete: function () {
                    var chartInstance = this.chart,
                    ctx = chartInstance.ctx;

                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.fillStyle = "black";
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function (dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                            var data = dataset.data[index];
                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                        });
                    });
                }
            },
			scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '時間'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '土壤濕度'
                        },
                    ticks: {
                        min: 0,
						max:100,
                       
                    }
                    }]
                }

        }
    });

</script>


<!--------------------------------------------畫溫度折線圖-------------------------------------->
<script>
    // 功能 返回隨機的顏色值
    // @param opacity 透明度
    // @return rgba格式顏色值
    var dynamicColors = function (opacity) {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        var a = opacity;
        return "rgba(" + r + "," + g + "," + b + "," + a + ")";
    }

    // 功能 返回rgba格式顏色數組
    // @param length 數組的長度
    // @param opacity 顏色的透明度
    // return 返回rgba數組
    var getColorArr = function (length, opacity) {
        var colorArr = new Array();
        for (var i = 0; i < length; i++) {
            colorArr.push(dynamicColors(opacity));
        }
        return colorArr;
    }

    
    // 準備數據
    var labels = [];
	<?php
	foreach($location_tempature as $key=>$value)
	{
		foreach($conditions as $key => $value_1)
			{
				if($value['Time']==$value_1['Time'])
					{?>
	labels.push('<?php echo  $value['Time'];?>')
	<?php
					;}
			}
	}
	?>
    var data = [<?php foreach($location_tempature as $key => $value){foreach($conditions as $key => $value_1){if($value['Time']==$value_1['Time']){echo  $value['Tempature'] . ',';}}}?>];
	
	var color=getColorArr(labels.length,0.5);
    var chartData = {
        // x軸顯示的label
        labels: labels,
        datasets: [{
            data: data, // 數據               
            label: '溫度',// 圖例
            backgroundColor: color,
			fill:false,
            borderColor: color,
            borderWidth: 3,
            
        }]
    };
    // 繪製圖表
    var ctx = document.getElementById('barChart_1').getContext('2d');
    var bar = new Chart(ctx, {
        type: 'line',
        data: chartData,
        options: {
            hover: {
                animationDuration: 0
            },
            animation: {
                onComplete: function () {
                    var chartInstance = this.chart,
                    ctx = chartInstance.ctx;

                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.fillStyle = "black";
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';
					
                    this.data.datasets.forEach(function (dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                            var data = dataset.data[index];
                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                        });
                    });
                }
            },
			scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '時間'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '溫度'
                        },
                    ticks: {
                        min: 0,
                        max:100,
                    }
                    }]
                }

        }
    });

</script>

<!------------------------------------------畫Tomatoworm長條圖------------------------------------------------------------->

<script>
    // 功能 返回隨機的顏色值
    // @param opacity 透明度
    // @return rgba格式顏色值
    var dynamicColors = function (opacity) {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        var a = opacity;
        return "rgba(" + r + "," + g + "," + b + "," + a + ")";
    }

    // 功能 返回rgba格式顏色數組
    // @param length 數組的長度
    // @param opacity 顏色的透明度
    // return 返回rgba數組
    var getColorArr = function (length, opacity) {
        var colorArr = new Array();
        for (var i = 0; i < length; i++) {
            colorArr.push(dynamicColors(opacity));
        }
        return colorArr;
    }

    
    // 準備數據
    var labels = [];
	<?php
	foreach($conditions as $key=>$value)
	{?>
	labels.push('<?php echo  $value['Time'];?>')
	<?php
	;}
	?>
    var data = [<?php foreach($conditions as $key => $value){echo  $value['TomatoWorm'] . ',';}?>];
	
    var chartData = {
        // x軸顯示的label
        labels: labels,
        datasets: [{
            data: data, // 數據               
            label: '番茄夜蛾',// 圖例
            backgroundColor: getColorArr(labels.length,0.5),
            borderWidth: 1
        }]
    };
    // 繪製圖表
    var ctx = document.getElementById('barChart_2').getContext('2d');
    var bar = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            hover: {
                animationDuration: 0
            },
            animation: {
                onComplete: function () {
                    var chartInstance = this.chart,
                    ctx = chartInstance.ctx;

                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.fillStyle = "black";
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function (dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                            var data = dataset.data[index];
                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                        });
                    });
                }
            },
			scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '時間'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '番茄夜蛾'
                        },
                    ticks: {
                        min: 0,
                        stepSize: 1
                    }
                    }]
                }

        }
    });

</script>

<!-------------------------------------------畫Tabaccoworm長條圖------------------------------------------------------------->

<script>
    // 功能 返回隨機的顏色值
    // @param opacity 透明度
    // @return rgba格式顏色值
    var dynamicColors = function (opacity) {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        var a = opacity;
        return "rgba(" + r + "," + g + "," + b + "," + a + ")";
    }

    // 功能 返回rgba格式顏色數組
    // @param length 數組的長度
    // @param opacity 顏色的透明度
    // return 返回rgba數組
    var getColorArr = function (length, opacity) {
        var colorArr = new Array();
        for (var i = 0; i < length; i++) {
            colorArr.push(dynamicColors(opacity));
        }
        return colorArr;
    }

    
    // 準備數據
    var labels = [];
	<?php
	foreach($conditions as $key=>$value)
	{?>
	labels.push('<?php echo  $value['Time'];?>')
	<?php
	;}
	?>
    var data = [<?php foreach($conditions as $key => $value){echo  $value['TabaccoWorm'] . ',';}?>];
	
    var chartData = {
        // x軸顯示的label
        labels: labels,
        datasets: [{
            data: data, // 數據               
            label: '斜紋夜盜蛾',// 圖例
            backgroundColor: getColorArr(labels.length,0.5),
            borderWidth: 1
        }]
    };
    // 繪製圖表
    var ctx = document.getElementById('barChart_3').getContext('2d');
    var bar = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            hover: {
                animationDuration: 0
            },
            animation: {
                onComplete: function () {
                    var chartInstance = this.chart,
                    ctx = chartInstance.ctx;

                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.fillStyle = "black";
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function (dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                            var data = dataset.data[index];
                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                        });
                    });
                }
            },
			scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '時間'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '斜紋夜盜蛾'
                        },
                    ticks: {
                        min: 0,
                        stepSize: 1
                    }
                    }]
                }

        }
    });

</script>


<!---------------------------------------------畫Beetworm長條圖------------------------------------------------------------->

<script>
    // 功能 返回隨機的顏色值
    // @param opacity 透明度
    // @return rgba格式顏色值
    var dynamicColors = function (opacity) {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        var a = opacity;
        return "rgba(" + r + "," + g + "," + b + "," + a + ")";
    }

    // 功能 返回rgba格式顏色數組
    // @param length 數組的長度
    // @param opacity 顏色的透明度
    // return 返回rgba數組
    var getColorArr = function (length, opacity) {
        var colorArr = new Array();
        for (var i = 0; i < length; i++) {
            colorArr.push(dynamicColors(opacity));
        }
        return colorArr;
    }

    
    // 準備數據
    var labels = [];
	<?php
	foreach($conditions as $key=>$value)
	{?>
	labels.push('<?php echo  $value['Time'];?>')
	<?php
	;}
	?>
    var data = [<?php foreach($conditions as $key => $value){echo  $value['BeetWorm'] . ',';}?>];
	
    var chartData = {
        // x軸顯示的label
        labels: labels,
        datasets: [{
            data: data, // 數據               
            label: '甜菜夜蛾',// 圖例
            backgroundColor: getColorArr(labels.length,0.5),
            borderWidth: 1
        }]
    };
    // 繪製圖表
    var ctx = document.getElementById('barChart_4').getContext('2d');
    var bar = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            hover: {
                animationDuration: 0
            },
            animation: {
                onComplete: function () {
                    var chartInstance = this.chart,
                    ctx = chartInstance.ctx;

                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.fillStyle = "black";
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function (dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                            var data = dataset.data[index];
                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                        });
                    });
                }
            },
			scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '時間'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '甜菜夜蛾'
                        },
                    ticks: {
                        min: 0,
                        stepSize: 1
                    }
                    }]
                }

        }
    });

</script>


<!---------------------------------------------畫Problems長條圖------------------------------------------------------------->

<script>
    // 功能 返回隨機的顏色值
    // @param opacity 透明度
    // @return rgba格式顏色值
    var dynamicColors = function (opacity) {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        var a = opacity;
        return "rgba(" + r + "," + g + "," + b + "," + a + ")";
    }

    // 功能 返回rgba格式顏色數組
    // @param length 數組的長度
    // @param opacity 顏色的透明度
    // return 返回rgba數組
    var getColorArr = function (length, opacity) {
        var colorArr = new Array();
        for (var i = 0; i < length; i++) {
            colorArr.push(dynamicColors(opacity));
        }
        return colorArr;
    }

    
    // 準備數據
    var labels = [];
	<?php
	foreach($conditions as $key=>$value)
	{?>
	labels.push('<?php echo  $value['Time'];?>')
	<?php
	;}
	?>
    var data = [<?php foreach($conditions as $key => $value){echo  $value['Problems'] . ',';}?>];
	
    var chartData = {
        // x軸顯示的label
        labels: labels,
        datasets: [{
            data: data, // 數據               
            label: '有問題的葉子',// 圖例
            backgroundColor: getColorArr(labels.length,0.5),
            borderWidth: 1
        }]
    };
    // 繪製圖表
    var ctx = document.getElementById('barChart_5').getContext('2d');
    var bar = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            hover: {
                animationDuration: 0
            },
            animation: {
                onComplete: function () {
                    var chartInstance = this.chart,
                    ctx = chartInstance.ctx;

                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.fillStyle = "black";
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function (dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                            var data = dataset.data[index];
                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                        });
                    });
                }
            },
			scales: {
				
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '時間'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '有問題的葉子'
                        },
                    ticks: {
                        min: 0,
                        stepSize: 1
                    }
                    }]
                }

        }
    });

</script>



<!------------------------------------------------畫None長條圖------------------------------------------------------------->

<script>
    // 功能 返回隨機的顏色值
    // @param opacity 透明度
    // @return rgba格式顏色值
    var dynamicColors = function (opacity) {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        var a = opacity;
        return "rgba(" + r + "," + g + "," + b + "," + a + ")";
    }

    // 功能 返回rgba格式顏色數組
    // @param length 數組的長度
    // @param opacity 顏色的透明度
    // return 返回rgba數組
    var getColorArr = function (length, opacity) {
        var colorArr = new Array();
        for (var i = 0; i < length; i++) {
            colorArr.push(dynamicColors(opacity));
        }
        return colorArr;
    }

    
    // 準備數據
    var labels = [];
	<?php
	foreach($conditions as $key=>$value)
	{?>
	labels.push('<?php echo  $value['Time'];?>')
	<?php
	;}
	?>
    var data = [<?php foreach($conditions as $key => $value){echo  $value['None'] . ',';}?>];
	
    var chartData = {
        // x軸顯示的label
        labels: labels,
        datasets: [{
            data: data, // 數據               
            label: '其他物種',// 圖例
            backgroundColor: getColorArr(labels.length,0.5),
            borderWidth: 1
        }]
    };
    // 繪製圖表
    var ctx = document.getElementById('barChart_6').getContext('2d');
    var bar = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            hover: {
                animationDuration: 0
            },
            animation: {
                onComplete: function () {
                    var chartInstance = this.chart,
                    ctx = chartInstance.ctx;

                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.fillStyle = "black";
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function (dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                            var data = dataset.data[index];
                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                        });
                    });
                }
            },
			scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '時間'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '其他物種'
                        },
                    ticks: {
                        min: 0,
                        stepSize: 1
                    }
                    }]
                }

        }
    });

</script>




<!-----------------------------------------------畫Tomato長條圖------------------------------------------------------------->

<script>
    // 功能 返回隨機的顏色值
    // @param opacity 透明度
    // @return rgba格式顏色值
    var dynamicColors = function (opacity) {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        var a = opacity;
        return "rgba(" + r + "," + g + "," + b + "," + a + ")";
    }

    // 功能 返回rgba格式顏色數組
    // @param length 數組的長度
    // @param opacity 顏色的透明度
    // return 返回rgba數組
    var getColorArr = function (length, opacity) {
        var colorArr = new Array();
        for (var i = 0; i < length; i++) {
            colorArr.push(dynamicColors(opacity));
        }
        return colorArr;
    }

    
    // 準備數據
    var labels = [];
	<?php
	foreach($conditions as $key=>$value)
	{?>
	labels.push('<?php echo  $value['Time'];?>')
	<?php
	;}
	?>
    var data = [<?php foreach($conditions as $key => $value){echo  $value['Tomato'] . ',';}?>];
	
    var chartData = {
        // x軸顯示的label
        labels: labels,
        datasets: [{
            data: data, // 數據               
            label: '番茄',// 圖例
            backgroundColor: getColorArr(labels.length,0.5),
            borderWidth: 1
        }]
    };
    // 繪製圖表
    var ctx = document.getElementById('barChart_7').getContext('2d');
    var bar = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            hover: {
                animationDuration: 0
            },
            animation: {
                onComplete: function () {
                    var chartInstance = this.chart,
                    ctx = chartInstance.ctx;

                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.fillStyle = "black";
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function (dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                            var data = dataset.data[index];
                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                        });
                    });
                }
            },
			scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '時間'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '番茄'
                        },
                    ticks: {
                        min: 0,
                        stepSize: 1
                    }
                    }]
                }

        }
    });

</script>


<!---------------------------------------------畫TomatoFlower長條圖------------------------------------------------------------->

<script>
    // 功能 返回隨機的顏色值
    // @param opacity 透明度
    // @return rgba格式顏色值
    var dynamicColors = function (opacity) {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        var a = opacity;
        return "rgba(" + r + "," + g + "," + b + "," + a + ")";
    }

    // 功能 返回rgba格式顏色數組
    // @param length 數組的長度
    // @param opacity 顏色的透明度
    // return 返回rgba數組
    var getColorArr = function (length, opacity) {
        var colorArr = new Array();
        for (var i = 0; i < length; i++) {
            colorArr.push(dynamicColors(opacity));
        }
        return colorArr;
    }

    
    // 準備數據
    var labels = [];
	<?php
	foreach($conditions as $key=>$value)
	{?>
	labels.push('<?php echo  $value['Time'];?>')
	<?php
	;}
	?>
    var data = [<?php foreach($conditions as $key => $value){echo  $value['TomatoFlower'] . ',';}?>];
	
    var chartData = {
        // x軸顯示的label
        labels: labels,
        datasets: [{
            data: data, // 數據               
            label: '番茄花',// 圖例
            backgroundColor: getColorArr(labels.length,0.5),
            borderWidth: 1
        }]
    };
    // 繪製圖表
    var ctx = document.getElementById('barChart_8').getContext('2d');
    var bar = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            hover: {
                animationDuration: 0
            },
            animation: {
                onComplete: function () {
                    var chartInstance = this.chart,
                    ctx = chartInstance.ctx;

                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.fillStyle = "black";
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function (dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                            var data = dataset.data[index];
                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                        });
                    });
                }
            },
			scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '時間'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '番茄花'
                        },
                    ticks: {
                        min: 0,
                        stepSize: 1
                    }
                    }]
                }

        }
    });

</script>





</html>