<?
include("session.php")
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css.css">
<title>المقالات</title>
</head>

<body>
<div class="head_block"><h2>المقالات</h2></div>
<div class="body_block">
<div class="add"><h3><a href="?action=add"> اضافة مقالة</a></h3></div>
<?

if($_REQUEST['action']=='delete')
{
	$get_id=$_GET['id'];
	if($get_id)
	{
		$dele=mysql_query("delete from article where id=".$get_id);
		if($dele)
		{
			echo"<div class='send '> تم الحذف بنجاح</div>" ;
	echo '<meta http-equiv="refresh" content="1;url=add_article.php"/>' ;
	exit ;
		}
	}
}

if($_POST['edit_article'])
{
		$post_title=$_POST['title'];
	$post_article=$_POST['article'];
	$post_active=$_POST['active'];
	$post_id=$_POST['id'];
		if($post_title!="" || $post_article!="" )
		{
			$update=mysql_query("update article set `title`='$post_title',`article`='$post_article',`active`='$post_active' where id=".$post_id);
			if($update)
				{
					echo"<div class='send '> تم التعديل بنجاح</div>" ;
	echo '<meta http-equiv="refresh" content="1;url=add_article.php"/>' ;
	exit ;
			}
		}
	
}



if($_REQUEST['action']=='edit')
{
	$get_id=$_GET['id'];
	if($get_id)
	{
		$query_edit=mysql_query("select * from article where id=".$get_id);
$row_edit=mysql_fetch_array($query_edit);
echo '<form method="post" action="">
<table  width="50%" align="center" >
<tr>
<td>اعنوان المقالة</td>
<td><input type="text" name="title" value="'.$row_edit['title'].'"></td>
</tr>

<tr>
<td>المقالة</td>
<td><div class="toolbar" align="center" >
			<textarea name="article" id="fdddd">
			'.$row_edit['article'].'
			</textarea>
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
<td>الحالة</td>
<td><select name="active">';
if($row_edit['active']==1)
{
	echo'<option value="1">ظاهر</option>
<option value="2">مخفي</option>';
}else
{
	echo'
	<option value="2">مخفي</option>
	<option value="1">ظاهر</option>';

}



echo'


</select>
</td>
</tr>



<tr>
<td></td>
<td><input type="submit" name="edit_article" value="حفظ التعديل" >
<input name="id" value="'.$get_id.'" type="hidden" >


 
</td>
</tr>




</table></form>';
	}
}




if($_POST['home'])
{
	$get_id=$_POST['id_home'];
	if($get_id)
	{ 
		$update=mysql_query("update article set `home`='0'");
		if($update)
		{
			$update=mysql_query("update article set `home`='1' where id=".$get_id);
			if($update)
			{echo"<div class='send '> تم الحفظ بنجاح </div>" ;
	echo '<meta http-equiv="refresh" content="1;url=add_article.php"/>' ;
	exit ;
			}
		}
	}
}


if($_POST['add_article'])
{
	$post_title=$_POST['title'];
	$post_article=$_POST['article'];
	$post_active=$_POST['active'];
	if($post_title!='' || $post_article!='' )
	{
		$insert=mysql_query("insert into article (`title`,`article`,`active`,`home`) values('$post_title','$post_article','$post_active','0')");
		if($insert)
		{
echo"<div class='send '> تم الحفظ بنجاح </div>" ;
	echo '<meta http-equiv="refresh" content="1;url=add_article.php"/>' ;
	exit ;
		}
	}else
	{
		echo'<div class="err"> رجاء ادخال البيانات </div>';
	}
}

if($_REQUEST['action']=='add')
{
	echo '<form method="post" action="">
<table  width="50%" align="center" >
<tr>
<td>اعنوان المقالة</td>
<td><input type="text" name="title"></td>
</tr>

<tr>
<td>المقالة</td>
<td><div class="toolbar" align="center" >
			<textarea name="article" id="fdddd"></textarea>
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
<td>الحالة</td>
<td><select name="active">
<option value="1">ظاهر</option>
<option value="2">مخفي</option></select>
</td>
</tr>



<tr>
<td></td>
<td><input type="submit" name="add_article" value="حفظ المقالة"></td>
</tr>




</table></form>';
}

?>


<table width="80%" border="1px" align="center">
<tr>
<td>رقم </td>
<td>عنوان المقالة</td>
<td>الرئيسية</td>
<td>تعديل</td>
<td>حذف</td>

</tr>
<?
$query=mysql_query("select * from article");
while($row=mysql_fetch_array($query))
{
if($row['home']==1)
{
	$text_val="ظاهر";
	$sub="input_s_act";
	
}else 
{
	$text_val="مخفي";
		$sub="input_s";
}
echo

	'<tr>
<td>'.$row['id'].' </td>
<td>'.$row['title'].'</td>
<td>
<form method="post" action="">
<input type="submit" name="home" value="'.$text_val.'" id="'.$sub.'">
<input type="hidden" name="id_home" value="'.$row['id'].'">
</form>



</td>
<td><a href="?action=edit&id='.$row['id'].'">تعديل</a></td>
<td><a href="?action=delete&id='.$row['id'].'">حذف</a></td>

</tr>';
}

?>


</table>


</div>
</body>
</html>