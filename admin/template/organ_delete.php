<?php
include_once("connect.php");
if(!isset($_SESSION['user'])){
  msg("请您先登陆","login.php");
}
$nid=$_GET["nid"];
$sql="delete from organ where new_id=$nid";
$re=mysqli_query($conn,$sql);
if($re){
	msg("删除成功","organ_list.php");
}else{

msg("删除失败","");

}

?>