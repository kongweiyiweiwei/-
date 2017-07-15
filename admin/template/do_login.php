<?php
include_once("connect.php");
if(!isset($_POST['sub'])){
	msg("请从表单页面提交","login.php");
	exit;
}
$username = trim( $_POST["username"]);
$password = trim(md5($_POST["password"]));
$code = $_POST["usercode"];
$sysCode = $_SESSION["sysCode"];
if($code!=$sysCode){
	msg("验证码错误","login.php");
		}
if($username!=""&&$password!=""&&$code==$sysCode){
			$sql = "select * from users where name = '$username' and password = '$password'";
			$result = mysqli_query($conn, $sql);
			if($result->num_rows>0){
				$_SESSION["user"] = $username;
				msg("登录成功","./index.php");
				exit();//退出当前页面的操作
			}else{
				msg("登录失败","");
			exit();
			}
		}

?>