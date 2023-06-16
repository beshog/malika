<?
include_once ("nic/header.php");
?>

<div class="suled">


</div>

<div class="block_body1">

<?
$query_home=mysql_query("select * from article where home=1");
$row_home=mysql_fetch_array($query_home);
?>

<div class="block_head1" style=" font-size:18px;color:#FFFFFF ; height:30px ; width:250px; margin-right:auto; margin-left: auto; text-align:center  "> <h2> <? echo $row_home['title'] ?></h2></div>


<p>
<? echo $row_home['article'] ?>

</p>

</div>
<div class="block_body1">

