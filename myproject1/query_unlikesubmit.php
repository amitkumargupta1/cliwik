<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
?>
<?php 
$z=$_SESSION['y'];
$id=$_POST['unlike_id'];
include('config.php');
$query1=mysql_query("select * from login1 where username='$z'");
$fetch1=mysql_fetch_array($query1);
$mydata_emailpic=$fetch1['picname'];
$mydata_email=$fetch1['username'];
$query2=mysql_query("insert into queryunlike_insert value('','$id','$mydata_email','$mydata_emailpic')");
echo "you unsupported";


?>
