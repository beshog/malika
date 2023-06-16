<?
include("session.php")
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css.css">
<title>اخبار</title>
</head>

<body>
<div class="head_block"><h2>الاخبار</h2></div>
<div class="body_block">
<div class="add"><h2><a href="?action=add">اضافة خبر</a></h2
></div>
<?
if($_REQUEST['action']=="delete")
{
	$get_id=$_GET['id'];
	if($get_id)
	{
		$dele=mysql_query("delete from news where id= ".$get_id);
		if($dele)
		{
		echo"<div class='send '>تم الحذف بنجاح </div>" ;
	echo '<meta http-equiv="refresh" content="1;url=add_news.php"/>' ;
	exit ;
		}
	}
}
if($_POST['edit_news'])
{
	$post_title=$_POST['title'];
	$post_pic=$_POST['pic'];
	$post_short=$_POST['short'];
	$post_news=$_POST['news'];
	$post_id=$_POST['id'];
	if($post_title!='' || $post_short!='' || $post_news!='')
	{
			$update=mysql_query("update  news set `title`='$post_title' ,`pic`='$post_pic' ,`short`='$post_short', `news`='$post_news' where id=".$post_id);
			if($update)
			{
				echo"<div class='send '> تم التعديل بنجاح </div>" ;
	echo '<meta http-equiv="refresh" content="1;url=add_news.php"/>' ;
	exit ;
			}
	}
}
if($_REQUEST['action']=="edit")
{
	$get_id=intval($_GET['id']);
	if($get_id)
	{
		$query_edit=mysql_query("select * from news where id=".$get_id);
		$row_edit=mysql_fetch_array($query_edit);
		echo
		'<form method="post" action="">
<table border="1" align="center" width="70%"  >
<tr>
<td>عنوان الخبر</td>
<td> <input type="text" name="title" value="'.$row_edit['title'].'"></td>
</tr>

<tr>
<td>صورة</td>
<td><input type="text" name="pic"  value="'.$row_edit['pic'].'"></td>
</tr>


<tr>
<td>جزء من الخبر</td>
<td><textarea name="short">'.$row_edit['short'].'</textarea></td>
</tr>

<tr>
<td>الخبر</td>
<td><div class="toolbar" align="center" >
			<textarea name="news" id="fdddd" >'.$row_edit['news'].'</textarea>
			<script type="text/javascript" src="editor-min.js"></script>
			<script type="text/javascript">
				
				Editor.setStyle({
					"bgColor": "#FFD5B3",
					"borderColor": "#c8c8c8",
					"fontFamily": "tahoma"
				});
				
				Editor.run({
					"replace": "fdddd",  
					"height": 120,  
					"width": 600,
					"path": "",
					"mode": "advance"
				});
				
			</script>
			</div>


</td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="edit_news" value=" حفظ الخبر">
<input type="hidden" value="'.$get_id.'" name="id">
</td>
</tr>

</table>
</form>';
	}
}
if($_POST['add_news'])
{
	$post_title=$_POST['title'];
	$post_pic=$_POST['pic'];
	$post_short=$_POST['short'];
	$post_news=$_POST['news'];
	$post_date=time();
	if($post_title!='' || $post_news!='' || $post_short!='')
	{
		$insert=mysql_query("insert into news (`title`,`pic`,`short`,`news`,`date`) values('$post_title','$post_pic','post_short','$post_news','$post_date')");
		if($insert)
		{
echo"<div class='send '> تم الحفظ بنجاح </div>" ;
	echo '<meta http-equiv="refresh" content="1;url=add_news.php"/>' ;
	exit ;
		}
	}else
	{
		echo'<div class="err"> رجاء ادخال البيانات </div>';
	}
}
if($_REQUEST['action']=='add')
{
	echo'<form method="post" action="">
<table border="1" align="center" width="70%"  >
<tr>
<td>عنوان الخبر</td>
<td> <input type="text" name="title"></td>
</tr>

<tr>
<td>صورة</td>
<td><input type="text" name="pic"></td>
</tr>


<tr>
<td>جزء من الخبر</td>
<td><textarea name="short"></textarea></td>
</tr>

<tr>
<td>الخبر</td>
<td><div class="toolbar" align="center" >
			<textarea name="news" id="fdddd"></textarea>
			<script type="text/javascript" src="editor-min.js"></script>
			<script type="text/javascript">
				
				Editor.setStyle({
					"bgColor": "#FFD5B3",
					"borderColor": "#c8c8c8",
					"fontFamily": "tahoma"
				});
				
				Editor.run({
					"replace": "fdddd",  
					"height": 120,  
					"width": 600,
					"path": "",
					"mode": "advance"
				});
				
			</script>
			</div>


</td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="add_news" value=" حفظ الخبر"></td>
</tr>

</table>
</form>';
	}
?>
<table border="0" align="center" dir="rtl" width="80%">
<tr>
<th>رقم</th>
<th>عنوان الخبر</th>
<th>التاريخ</th>
<th>تعديل</th>
<th>حذف</th>
</tr>
<?
$query_news=mysql_query("select * from news");
while($row_news=mysql_fetch_array($query_news))
{
	echo
	'
	<tr>
<td>'.$row_news['id'].'</td>
<td>'.$row_news['title'].'</td>
<td>'.date("Y/m/d",$row_news['date']).'</td>
<td><a href="?action=edit&id='.$row_news['id'].'">تعديل</a></td>
<td><a href="?action=delete&id='.$row_news['id'].'">حذف</a></td>
</tr>
	';
}
?>


</table>

</div>
</body>