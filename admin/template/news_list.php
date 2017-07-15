<?php
include_once("connect.php");
if(!isset($_SESSION['user'])){
 msg("您还没有登陆，请先登陆","login.php");
}

// $sql="select * from show_news ";
// $re=mysqli_query($conn,$sql);
// $i=1;
// while($row=mysqli_fetch_array($re,MYSQL_ASSOC)){
// $sid=$i;
// $title=$row['name'];
// $content=$row['content'];
// $time=date("Y-m-d",$row['time']);
// $thumb=$row['thumb'];
// $i++;
// }

$re="select * from show_news";
$data=array();
$str="";
$every=5;
$num=mysqli_num_rows(mysqli_query($conn,$re));
$pages=ceil($num/$every);
if(!isset($_GET["page"])){
  $page=1;
}else{
  $page=$_GET["page"];
  if($page<=1) $page=1;
  if($page>$pages) $page=$pages;
} 

$start=($page-1)*$every;
$re.=" limit $start,5";
$res=mysqli_query($conn,$re);
$i=1;
while($list=mysqli_fetch_array($res)){
 $data[]=$list;
$i++;
}

?>



<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="../css/pintuer.css">
<link rel="stylesheet" href="../css/admin.css">
<script src="../js/jquery.js"></script>

</head>
<body>

<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="news_add.php"> 添加内容</a> </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th>图片</th>
        <th>标题</th>
        <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>
      <tr>
      <?php
     

       foreach($data as $k=>$v){?>
       
        <td style="text-align:left; padding-left:20px;">
            <input type="checkbox" name="id[]" value="" /><?=$v['new_id']?></td>
        <td width="10%"><img src="<?=$v['thumb'] ?>" alt="" width="70" height="50" />  </td>
         <td><?=$v['name']?></td>
         <td>  <?=date("Y-m-d",$v['time'] )?>  </td>
         <td>
             <div class="button-group">
             <a class="button border-main" href="news_edit.php?nid=<?=$v['new_id']?>">
                  <span class="icon-edit"></span> 修改</a>
                  <a class="button border-red" href="news_delete.php?nid=<?=$v['new_id']?>" >
                       <span class="icon-trash-o"></span> 删除</a>
             </div>
       </tr>
     
       <?php }?>
      <tr>
        <td colspan="8">
            <div class="pagelist">
                  <a href="news_list.php?page=<?=($page-1).$str?>">上一页</a>
                  <!--  <span class="current"><a href="news_list.php?page=<?=$page.$str?>">1</a></span> -->
                   <a href="news_list.php?page=<?=($pages-2).$str?>">  1</a>
                  <a href="news_list.php?page=<?=($pages-1).$str?>">  2</a>
                  <a href="news_list.php?page=<?=$pages.$str?>">3</a>
                  <a href="news_list.php?page=<?=($page+1).$str?>">下一页</a>
                  <a href="news_list.php?page=<?=$pages.$str?>">尾页</a></div></td>
      </tr>

    </table>
  </div>
</form>
<script type="text/javascript">
//删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
        /*window.location.href="../delete.php?id="+id;*/
	}else{
        alert(1);
    }
}
</script>
</body>
</html>