<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
?>
<?php 
$z=$_SESSION['y'];
$id=$_POST['like_id'];
include('config.php');
$date=date("y-m-d");
$time=date("h:i:s");
$query1=mysql_query("select * from login1 where username='$z'");
$fetch1=mysql_fetch_array($query1);
$mydata_emailpic=$fetch1['picname'];
$mydata_email=$fetch1['username'];
$name=$fetch1['name'];
$query2=mysql_query("insert into querylike_insert value('','$id','$mydata_email','$mydata_emailpic')");
echo "you supported";


?>
