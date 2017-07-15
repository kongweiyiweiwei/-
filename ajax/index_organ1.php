<?php
include_once("connect.php");
$sql="select * from organ limit 0,3";
$re=mysqli_query($conn,$sql);
$data="";

while($row=mysqli_fetch_array($re,MYSQL_ASSOC)){
   
$name=$row["name"];
$content=$row["content"];
$time=date('Y-m-d',$row["time"]);
$thumb=$row["thumb"];

$data.= "<div class='col-sm-4 col-xs-12' >
                <div class='col-sm-3 col-xs-3'>
                  <img src='./admin/template/$thumb' class='img-circle img-round' id='show_img' >
                </div>
              <div class='col-sm-9 col-xs-9'>
                <h4 class='text-left round-h3 text-info'>$name</h4>
                <p class='text-left'>$content</p>
              </div>
            </div>
   
 

     ";
            
}
echo $data;
?>