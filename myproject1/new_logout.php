<?php
session_start();
$z=$_SESSION['y'];
include('config.php');
$comment_query= mysql_query("select * from notification2 order by ownid desc limit 1");
$update1=mysql_fetch_array($comment_query);
$update_query=$update1['ownid'];
$comment_query2= mysql_query("UPDATE comment_live SET mydataid='$update_query' WHERE email='$z';");
$comment_query5= mysql_query("select * from querydata order by id desc limit 1");
$update5=mysql_fetch_array($comment_query5);
$update_query5=$update5['id'];
mysql_query("UPDATE comment_live SET wall='$update_query5' WHERE email='$z';"); 
$livecomment_query20= mysql_query("select * from book order by id desc limit 1");
$liveupdate20=mysql_fetch_array($livecomment_query20);
$update_query20=$liveupdate20['id'];
mysql_query("UPDATE comment_live SET book='$update_query20' WHERE email='$z'");
$livecomment_query21= mysql_query("select * from accessories order by id desc limit 1");
$liveupdate21=mysql_fetch_array($livecomment_query21);
$update_query21=$liveupdate21['id'];
mysql_query("UPDATE comment_live SET accessories='$update_query21' WHERE email='$z'");
$livecomment_query22= mysql_query("select * from bikes order by id desc limit 1");
$liveupdate22=mysql_fetch_array($livecomment_query22);
$update_query22=$liveupdate20['id'];
mysql_query("UPDATE comment_live SET bikes='$update_query22' WHERE email='$z'");
if(!empty($_SESSION['y']))
{
$_SESSION['y']='';
$_SESSION['select']='';
}
header("Location:index.php");

?>
