<?php

include_once("connect.php");
$sql="select * from organ";
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
           <div class='media-left '> 
             <h4 class='media-heading text-info'style='width:180px'>$name</h4> 
             <a href=''> <img class='media-object'
             src='./admin/template/$thumb' style='width:120px;height:120px;border:2px solid #ccc;border-radius: 60px'></a>
           </div>
          <div class='media-body' >
         
           <p style='margin-top:40px' class='text-info'>$content</p>
           <p class='text-left'><i class='icon iconfont icon-rili1'></i> $time</p>
         </div>
       </div>
      </li>
      ";
}
echo $data;
?>