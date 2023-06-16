<?
ob_start();
include ("db.php") ;
$query_sett=mysql_query( "select * from setting");
$row_sett=mysql_fetch_array($query_sett) ;
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style/style.css">
<meta name="description" content="<? echo $row_sett['desc']?>" />
<meta name="keywords" content="<? echo $row_sett['keyword']?>" />
<title> <? echo $row_sett ['name'] ?></title>
</head>
<body>
<?
if($row_sett['active'] !=1)
{
	 echo '<div class="close">'.$row_sett['msg'].'</div>';
	 exit ;
}
?>
<div class="top_head">
<center><div id="logo"><img src="image/لوجو ملايكة.png" width="110" height="100"/> </div></center>
<div id="name_content"><p><center><h1><? echo $row_sett ['name'] ?></h1>
  <h1>كنيسة السيدة العذراء والملاك ميخائيل -الاباصيري</h1>
</center>
</p></div>

<div id="name_content2"><center>
  <h1><strong>"اهْتَمَّ بِهذَا. كُنْ فِيهِ، لِكَيْ يَكُونَ تَقَدُّمُكَ ظَاهِرًا فِي كُلِّ شَيْءٍ."</strong> (<a href="https://st-takla.org/Bibles/BibleSearch/showVerses.php?book=64&amp;chapter=4&amp;vmin=15&amp;vmax=15">1 تي 4: 15</a>)</h1>
  <p>&nbsp;</p>
  
</center>
</div>
</div>

<p>'</p>
<div class="nev" style="background: #12FF00 ; font-size:18px ">
<ul>
<?
$query_ul=mysql_query("select * from section order by arrange");
while($row_ul=mysql_fetch_array($query_ul))
{
	echo'<li><h3><strong><a href="'.$row_ul['link'].'.php">'.$row_ul['name'].'</a></strong></h3></li>';
}

?>
</ul>

</div>
<div class="center">
<div class="r-center" >
<div class="block-head" style="background: #FF0004 ; font-size:22px; color:#FFFFFF ; height:30px ; width:250px" > القائمة الرئيسية </div>
<div class="block-body">
<div class="menu"><ul>


<?
$query_art=mysql_query("select * from article");
while($row_art=mysql_fetch_array($query_art))
{
	echo'<li><a href="r_article.php?id='.$row_art['id'].'"> '.$row_art['title'].'</a></li>';
}


?>

</ul></div></div></div>
<div  class="c-center">