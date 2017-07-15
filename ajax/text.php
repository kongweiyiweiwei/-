<?php
include_once("connect.php");

$sql="select count(*) from active";
$re=mysqli_query($conn,$sql);
$countArr=mysqli_fetch_row($re);
$arr[]=ceil($countArr[0]/10);
//print_r($arr);


$start=$_GET["p"]*10;
$sql="select * from active limit {$start},10";
$res=mysqli_query($conn,$sql);
while($tmpArr=mysqli_fetch_assoc($res)){
	$arr[]=$tmpArr;
}
//print_r($arr);
echo json_encode($arr);
?>

