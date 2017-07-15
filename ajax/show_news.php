<?php

include_once("connect.php");
$sql="select * from show_news";
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
           <div class='media-left'>  
             <a href=''> <img class='media-object'src='./admin/template/$thumb' style='width:80px;height:80px'></a>
           </div>
          <div class='media-body'>
           <h4 class='media-heading'>$name</h4>
           <p>$content</p>
            <p class='text-right'><i class='icon iconfont icon-rili1'></i> $time</p>
         </div>
       </div>
      </li>";
}
echo $data;
?>