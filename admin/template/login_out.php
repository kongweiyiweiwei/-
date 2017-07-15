<?php
header("content-type:Text/html;charset=utf-8") ;
include "connect.php";
if(!isset($_SESSION['user'])){
 header("location:index.php");
 exit;
}

$_SESSION=array();
session_destroy();
if(isset($_SESSION['user'])){
msg("退出失败","index.php");

}else{

	msg("再见","login.php");
}
 ?>

