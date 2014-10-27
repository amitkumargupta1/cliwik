<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
?>
<?php
include('config.php');
$z=$_SESSION['y'];
$comment_query= mysql_query("select * from notification2 order by ownid desc limit 1");
$update1=mysql_fetch_array($comment_query);
$update_query=$update1['ownid'];
$comment_query2= mysql_query("UPDATE comment_live SET mydataid='$update_query' WHERE email='$z';");
$comment_query5= mysql_query("select * from querydata order by id desc limit 1");
$update5=mysql_fetch_array($comment_query5);
$update_query5=$update5['id'];
mysql_query("UPDATE comment_live SET wall='$update_query5' WHERE email='$z';");
$comment_query6= mysql_query("select * from book order by id desc limit 1");
$update6=mysql_fetch_array($comment_query6);
$update_query6=$update6['id'];
mysql_query("UPDATE comment_live SET book='$update_query6' WHERE email='$z';");
$comment_query7= mysql_query("select * from accessories order by id desc limit 1");
$update7=mysql_fetch_array($comment_query7);
$update_query7=$update7['id'];
mysql_query("UPDATE comment_live SET accessories='$update_query7' WHERE email='$z';");
$comment_query8= mysql_query("select * from bikes order by id desc limit 1");
$update8=mysql_fetch_array($comment_query8);
$update_query8=$update8['id'];
mysql_query("UPDATE comment_live SET bikes='$update_query8' WHERE email='$z';");
$branch=$_POST["branch"];
$sem=$_POST["sem"];
$hobbies=$_POST["hobbies"];
$distric=$_POST["distric"];
$state=$_POST["state"];
mysql_query("update user_data set branch='$branch' where email='$z'");
mysql_query("update user_data set hobbies='$hobbies' where email='$z'");
mysql_query("update user_data set distric='$distric' where email='$z'");
mysql_query("update user_data set state='$state' where email='$z'");
mysql_query("update user_data set sem='$sem' where email='$z'");
header('Location:multisubmit1.php');
?>
