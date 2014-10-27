<?php 
session_start();
$z=$_SESSION['y'];
include('config.php');
$passwd1=$_POST['t7'];
$query1=mysql_query("select * from login1 where username='$z'");
$fetch1=mysql_fetch_array($query1);
$passwd2=$fetch1['passwd'];
if($passwd1!=$passwd2)
mysql_query("update login1 set passwd='$passwd1' where username='$z'");
mysql_select_db("newcollege");
mysql_query("update login set passwd='$passwd1' where username='$z'");
header('Location:multisubmit1.php');
?>