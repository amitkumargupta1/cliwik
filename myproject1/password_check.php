<?php
session_start();
$z=$_SESSION['y'];
$email=$_POST['email_id'];
include('configuration.php');
$m=mysql_query("select * from login where username='$z'");
$num1=mysql_fetch_array($m);
$passwd=$num1['passwd'];
$num=mysql_num_rows($m);
if ($passwd!=$email)
echo "<font color='red'>*entered wrong password</font>";
?>