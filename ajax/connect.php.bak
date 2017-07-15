<?php
	header("content-type:text/html;charset=utf-8");
	/*
		以工具脚本的方式存在

	*/
		session_start();
	function msg($msg,$url){
		echo "<script>
		       alert('$msg');
			   location.href = '$url';
			 </script>";
	}

	define("HOST", "127.0.0.1");
	define("USERNAME", "root");
	define("PASSWORD", "");
	define("DBNAME", "news");
	define("MYSQL_CHARSET", "utf8");

	$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME);
	if(!$conn){
		die("数据库连接失败！");
	}

	// 定义PHP和数据库的访问 通信字符集
	$mysql_charset_sql = "set names ".MYSQL_CHARSET;

	mysqli_query($conn, $mysql_charset_sql);

	//多文件上传
	function fun_files(){
		$num=count($_FILES["pic"]["name"]);  //通过一个参数获取文件个数
		for($i=0;$i<$num;$i++){
			if($_FILES["pic"]["name"][$i]==""){
				$file[]="";
				continue;
			}
			//判断文件类型（jpg,png,gif,php）
			$hz=explode(".",$_FILES["pic"]["name"][$i]);
			$c=end($hz);     
			$name=array("jpg","jpeg","image","png","gif","");
			if(!in_array($c,$name)){
			msg("上传的文件类型不对","");
			exit;
			}
			$temp=$_FILES["pic"]["tmp_name"][$i];
			$filename="./uploads/".date("YmdHis").rand(100,999).".".$c;
			$file[]=$filename;
			move_uploaded_file($temp,$filename);
		}
		return $file;
	}
	//单文件上传
	function fun_file(){
		$h=explode(".",$_FILES["thumb"]["name"]);
		$z=end($h);
		$name=array("jpg","jpeg","image","png","gif","");
		if(!in_array($z,$name)){
			msg("上传的文件类型不对","");
			exit;
		}
		$tmp=$_FILES["thumb"]["tmp_name"];
		$fil="./uploads/".date("YmdHis").rand(100,999).".".$z;
		move_uploaded_file($tmp,$fil);
		$fi[]=$fil;
		return $fi;
	}
