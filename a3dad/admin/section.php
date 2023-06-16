<?
include("session.php")
?>

<!doctype html>
<html>
<head>

<meta charset="utf-8">
<link rel="stylesheet" href="css.css">
<title>اقسام الموقع </title>
</head>

<body>
<div class="head_block"><h2>اقسام الموقع</h2></div>
<div class="body">
<div class="add"><h2><a href="?action=add">اضافة قسم</a></h2
></div>
<?
if ($_REQUEST['action']=='delete')

{
	$get_id=intval($_GET['id']);
	if($get_id !=0)
	{
		$dele=mysql_query("delete from section where id=".$get_id);
		if($dele)
		{
			echo"<div class='send '>تم الحذف بنجاح </div>" ;
	echo '<meta http-equiv="refresh" content="1;url=section.php"/>' ;
	exit ;
		}
		
	}
	
}
if($_POST['ok_edit'])
{
	$post_id=$_POST['id'];
	$post_name=$_POST['name'];
	$post_link=$_POST['link'];
	$post_arra=$_POST['arra'];
	if($post_id!='' ||$post_name!='' || $post_link!='' )
	{
		$update=mysql_query("update section set `name`='$post_name' , `link`='$post_link' , `arrange`='$post_arra' where id=".$post_id);
		if($update)
		{
			echo"<div class='send '> تم التعديل بنجاح </div>" ;
	echo '<meta http-equiv="refresh" content="1;url=section.php"/>' ;
	exit ;
		}
	}else
	{
		echo '<div class="err"> رجاء ادخال البيانات </div>';
	}
}

if($_REQUEST['action']=='edit')
{
	$id=intval($_GET['id']);
	if($id)
	{
		$query_d=mysql_query("select * from section where id='$id'");
		$row_d=mysql_fetch_array($query_d);
	echo'<form method="post" action="">
<table border="1" align="center" dir="rtl" >
<tr>
<td>اسم القسم</td>
<td> <input name="name" type="text" value="'.$row_d['name'].'"></td>
</tr>
<tr>
<td>ترتيب</td>
<td><input type="text" name="arra" value="'.$row_d['arrange'].'"></td>
</tr>
<tr>
<td>صفحة القسم</td>
<td><input name="link" type="text" value="'.$row_d['link'].'"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="ok_edit" value="حفظ التعديل">
<input type="hidden" name="id"  value="'.$row_d['id'].'">
</td>
</tr>
</table>
</form>';	
	}
}
if ($_POST['ok_add'])
{
$post_name=$_POST['name'];
$post_arra=$_POST['arra'];
$post_link=$_POST['link'];
if($post_name !='' || $post_link!='')
{
	$insert=mysql_query("insert into section (`name`,`link`,`arrange`) values ('$post_name', '$post_link' , '$post_arra')" );
	if($insert)
	{
			echo"<div class='send '> تم عملية الحفظ بنجاح </div>" ;
	echo '<meta http-equiv="refresh" content="1;url=section.php"/>' ;
	exit ;
	}
	
}else
{
	echo '<div class="err"> رجاء ادخال البيانات </div>';
}
}
if ($_REQUEST['action']=='add')
{
echo'<form method="post" action="">
<table border="1" dir="rtl" align="center" >
<tr>
<td>اسم القسم</td>
<td> <input name="name" type="text"></td>
</tr>
<tr>
<td>ترتيب</td>
<td><input type="text" name="arra"></td>
</tr>
<tr>
<td>صفحة القسم</td>
<td><input name="link" type="text"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="ok_add" value="حفظ البيانات"></td>

</tr>
</table>
</form>
';
}
?>




<table border="1px" align="center" width="90%" frame="box" dir="rtl">
<tr>
<th>رقم</th>
<th>اسم</th>
<th>ترتيب</th>
<th>تعديل</th>
<th>حذف</th>
</tr>
<?
$query_sec=mysql_query("select * from section");
while($row=mysql_fetch_array($query_sec))
{
	echo
	'
	<tr>
<td>'.$row['id'].'</td>
<td>'.$row['name'].'</td>
<td>'.$row['arrange'].'</td>
<td><a href="?action=edit&id='.$row['id'].'">تعديل</a></td>
<td><a href="?action=delete&id='.$row['id'].'">حذف</a></td>
</tr>
	';
}
?>
</table>

</div>
</body>
</html>