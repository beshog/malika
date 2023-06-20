<?
$hostname="localhost" ; 
$database= "a3dad" ;
$username="root"; 
$password= "1071079999" ;
$con=mysql_connect($hostname, $username , $password ,$database);
if (mysql_error()){
	echo"not connected" ;
	exit();
}
else{
	echo "";
}
?>
