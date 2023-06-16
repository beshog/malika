<?
include_once ("nic/header.php");
?>

<meta charset="utf-8">
<br>
<br>
<div>
<form method="post" action="">
<table width="60%"  border="1" align="center" dir="rtl" color="#003CFF" font-size:24px height="10%" >
<tr>


<tr>
<td>
<select name="table">
<option value="new_table">اولي</option>
<option value="new_table2">ثانية</option>
</select>
</td>
</tr>


<tr>
<td>الكود</td>
<td><div align="center"><input name="sit_nume" type="text"></div></td>
</tr>

<tr>
<td></td>
<td><div align="center"><input type="submit" name="serch" value="بحث"></div></td>
</tr>

</table>
</form>

<br>
<?
if($_POST['serch'])
{
$table=$_POST['table'];
$sit=$_POST['sit_nume']	;

$sql="select * from ".$table." where sit_nume=".$sit;
$query=mysql_query($sql);
if(@mysql_num_rows($query)!=0)

{
	$row=mysql_fetch_array($query);
echo '<table align="center" width="90%" border="1px" dir="rtl" style="color:#003CFF; ; text-align:center">

<tr>
<td>الكود</td>
<td>الاسم</td>
<td>المجموع الكلي</td>
<td>النسبة المئوية</td>
<td>التقدير</td>
</tr>



<tr>
<td>'.$row['sit_nume'].'</td>
<td>'.mb_substr($row['name'],"utf-8").'</td>
<td> '.$row['degree'].'</td>
<td> '.$row['pers'].'</td>
<td>'.$row['result'].'</td>
</tr>



</table>
';
}else
{
	echo'<div> لا توجد نتائج لهذا الرقم</div>';
}
}


?>

</div>

<?
include_once ("nic/footer.php");
?>
