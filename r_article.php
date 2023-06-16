<?
include_once ("nic/header.php");
$id_art=$_REQUEST['id'];
if(intval($id_art)==0)
{
	header("location:index.php");
}else
{
	$query=mysql_query("select * from article where id=".$id_art);
$row=mysql_fetch_array($query);
echo '
<div class="block_head" style="text-align: center; width:200px; height:30px;margin-right:auto; margin-left:auto; font-size:23px;   color:#FFFFFF">'.$row['title'].'</div>
<div >



 <p>
'.$row['article'].'
 </p>


</div>

';
}

?>


