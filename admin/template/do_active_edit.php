<?php
include_once("connect.php");
if(!isset($_POST['sub'])){
	msg("请在表单页面提交","active_edit.php");
	exit;
}

$new_id=$_POST['new_id'];
$name=trim($_POST["title"]);
$content=trim($_POST["content"]);
$ff=fun_file();
$thumb=implode(";",$ff);

$sql="select * from active";
$re=mysqli_query($conn,$sql);
$list=[];
while($data=mysqli_fetch_array($re)){
	 $list[]=$data;
}


if($content!="" and $name!="" and $thumb!=""){
	$res="update active set name='$name' ,content='$content',thumb='$thumb' where new_id=$new_id";
		$flag=mysqli_query($conn,$res);
		if($flag){
		    msg("修改成功","active_list.php");
			exit;
		}else{
		    msg("修改失败","active_edit.php");
			exit;
		}
}else{
	msg("请填写完整的数据","active_edit.php?nid=$new_id");
}

?>


