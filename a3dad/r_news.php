<?
include_once ("nic/header.php");
$id_news=$_REQUEST['id'];
if(intval($id_news)==0)
{
	header("location:index.php");
}else
{
	$query=mysql_query("select * from news where id=".$id_news);
$row=mysql_fetch_array($query);
echo '
<div class="block_head" ></div>
<div class="news_body">

<div style="text-align: center; color:#001DFF" ><h3>'.$row['title'].'</h3></div>
<h4 style="color:#001DFF ;text-align: center">'.date("Y/n/d",$row['date']).'</h4>
<img  src="'.$row['pic'].'" width="250px" height="200px"  >
 <p>
'.$row['news'].'
 </p>


</div>

';
}

?>




<?
include_once ("nic/footer.php");
?>