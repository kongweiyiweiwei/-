<?php

include_once("connect.php");
$sql="select * from active";
$re=mysqli_query($conn,$sql);
$data="";

while($row=mysqli_fetch_array($re,MYSQL_ASSOC)){
   
$name=$row["name"];
$content=$row["content"];
$time=date('Y-m-d',$row["time"]);
$thumb=$row["thumb"];

$data.=" 
    <li class='list-group-item'>
         <div class='media'>
          
          <div class='media-body'>
           <h4 class='media-heading text-info'>$name</h4>
           <p>$content</p>
            <p class='text-right'> <i class='icon iconfont icon-rili1'></i>$time</p>
         </div>
       </div>
      </li>";
}
echo $data;
?>


