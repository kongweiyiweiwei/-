<?php

include_once("connect.php");
$sql="select * from show_news limit 0,5";
$re=mysqli_query($conn,$sql);
$data="";

while($row=mysqli_fetch_array($re,MYSQL_ASSOC)){
   
$name=$row["name"];
$content=$row["content"];
$time=date('Y-m-d',$row["time"]);
$thumb=$row["thumb"];

$data.=" 
   
    <p class='text-left text-info blue'>$name</p>";
}
echo $data;