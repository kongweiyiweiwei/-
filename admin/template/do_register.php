<?php
include_once("connect.php");
if(!isset($_POST["sub"])){
		msg("请从表单页面提交","register.php");
		}else{
		$data=array();
		$user=trim($_POST["name"]);
		$pwd=trim(md5($_POST["password"]));		
		$email=$_POST["email"];
		$time=time();
		//打开用户表
		$sql="select * from users";
		$resoult=mysqli_query($conn,$sql);
		if($result->num_rows>0){
			while($list=mysqli_fetch_assoc($resoult)){
				  $data[]=$list;
			}
		}
		foreach($data as $k=>$v){
			if($v["user"]===$user){
				msg("用户名已存在","");
				exit;
			}
		}	
		//插入数据
		$re="insert into users (name,password,email,time)values('$user','$pwd','$email','$time')";
		$flag=mysqli_query($conn,$re);
		

		if($flag){
			msg("注册成功","login.php");
			exit;
		}else{
			msg("注册失败","");
			exit;	
		}		
	}	