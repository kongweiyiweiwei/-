<?php
include_once("connect.php");
if(!isset($_POST['sub'])){
	msg("请在表单页面提交","organ_add.php");
	exit;
}
$title=$_POST["title"];
$ff=fun_file();

$thumb=implode(";",$ff);
$content=$_POST["content"];
$time=time();
if($content=="" and $title=="" and $thumb==""){
	msg("添加信息不完整","organ_add.php");
}else{
$re="insert into organ(name,content,time,thumb) values('$title','$content','$time','$thumb')";
$flag=mysqli_query($conn,$re);
}
if($flag){
	msg("添加成功","organ_list.php");
	exit;
}else{
    msg("添加失败","");
	exit;
}

?>