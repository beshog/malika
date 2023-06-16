<?
include_once ("nic/header.php");
?>

<div class="block_head"></div>
<div class="block_body"></div>
<?
$query=mysql_query("select * from news order by id desc limit 20");
while($row=mysql_fetch_array($query))
{
	echo'<div class="all_news" style="height:180px; width:400px;background:#FFED00 " >
<h3><a href="r_news.php?id='.$row['id'].'">'.$row['title'].'</a></h3>
<br>
<img src="'.$row['pic'].'" height="130px" width="130px">
<p> 
'.mb_substr($row['short'],0,100,"utf-8").'
</p>
<h4><a href="r_news.php?id='.$row['id'].'">المزيد..</a></h4>
</div>';
}

?>

</div>
