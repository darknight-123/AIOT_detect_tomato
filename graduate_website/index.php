<!DOCTYPE html>
<?php
    session_start();
    if(!empty($_POST['Send']) && !empty($_POST['Username'])&& !empty($_POST['Password']))
    {      
        require_once "./website_1/Login.php";
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name=”viewport” content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>登入介面</title>

</head>
<style>
 html {
            height: 100%;
        }
body {
            background: "./icon/farm.jpg";
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
}
</style>
<body background = "./icon/farm.jpg">
<div style="text-align:center">
	<div style="margin-top:5%;text-align:center;">
		<h1><img src="./icon/tomato.PNG"></h1>
	</div>
<div style="text-align:center;margin-top:5%;">
<form method="POST" action="">
	<span style="vertical-align:middle">
	<div style="margin:1%;text-align:center;font-size:20px;vertical-align:middle;" >
		<img src="./icon/username.PNG" width="50px">
		<input style="BACKGROUND-COLOR: transparent;height:10%;" type="text" name="Username" size="40" />
	</div>
	<div style="margin:1%;text-align:center;;font-size:20px;vertical-align:middle;">
		<img src="./icon/password.PNG" width="50px">
		<input style="BACKGROUND-COLOR: transparent;height:10%;" type="password" name="Password" size="40" />
	</div>
	<div style="margin-top:5%;text-align:center;">
		<input style="width:7%;height:2%;font-size:15px;" type="submit" name="Send" value="登入" />
	</div>
	</span>
</form>
</div>

<?php
    
		if(!empty($_POST["Send"]) and $_POST["Send"]=="登入")
		{
			if(!empty($_POST['Result']) and $_POST['Result']=="success")
			{
				$_SESSION['Username']=$_POST['Username'];
				header("Location: ./website_1/Day/Graph.php"); 
				print_r("登入成功");
			}
			else if(!empty($_POST['Result']) and $_POST['Result']=="failure")
			{
				echo  '<span style="color:red;font-size: 40px;"> ' . "帳號或密碼錯誤" . '<script>alert("帳號或密碼錯誤")</script>';
			}
			
			else
			{
				echo '<span style="color:red;font-size: 40px;"> '. "帳號或密碼不可為空白" . '<script>alert("帳號或密碼不可為空白")</script>';
			}
		}
?>





</body>
</html>