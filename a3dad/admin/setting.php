<?
include ("session.php") ;
$query=mysql_query( "select * from setting");
$row=mysql_fetch_array($query);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css.css">
<title></title>
</head>

<body>
<div class="head_block"><h2>اعدادت الموقع</h2></div>
<div class="body_block">
<?
if($_POST['save_s'])
{
$POST_name=$_POST['name'];
$POST_link=$_POST['link'];
$POST_msg=$_POST['msg'];
$POST_desc=$_POST['desc'];
$POST_keyword=$_POST['keyword'];
$POST_active=$_POST['active'];
if ($POST_name!='')
{
	$update=mysql_query("update setting set `name`='$POST_name' , `link` ='$POST_link' , `active` ='$POST_active' , `msg`='$POST_msg' , `desc`='$POST_desc' ,`keyword`='$POST_keyword' where id =1");
	if($update)
	{
	echo"<div class='send '> تم عملية الحفظ بنجاح </div>" ;
	echo '<meta http-equiv="refresh" content="1;url=setting.php"/>' ;
	exit ;
	}
}
}
?>
<form method="post" action="">
<table border="1" align="center" >

<tr>
<td>اسم الموقع</td>
<td><input type="text" name="name" value="<? echo $row['name']?>" >  </td>
</tr>

<tr>
<td>عنوان الموقع</td>
<td><input type="text" name="link" value="<? echo $row['link'] ?>"></td>
</tr>

<tr>
<td>حالة الموقع</td>
<td> 
<select name="active">
<?
if($row['active']==1)
{
	echo '
	 <option value="1">يعمل</option> 
	 <option value="2">مغلق</option>
	';
}else 
{
	echo '
		<option value="2">مغلق</option>
		<option value="1">يعمل</option> 
	';
}
?>
</select> </td>
</tr>

<tr>
<td> رسالة اغلاق </td>
<td> <textarea name="msg" cols="30" rows="5">
<?
echo $row ['msg'] ?>
</textarea> </td>
</tr >

<tr>
<td> وصف الموقع </td>
<td> <textarea name="desc"  cols="30" rows="5">
<?
echo $row ['desc'] 
?></textarea> </td>
</tr>

<tr>
<td>مفتاح الموقع </td>
<td> <textarea name="keyword"  cols="30" rows="5">
<?
echo $row ['keyword'] 
?> </textarea> </td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="save_s" value="حفظ التعديل" ></td>
</tr>

</table>
</form>
</div>
</body>
</html>