<?php
$email=$_POST['email_id'];
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysql_select_db("newcollege");
$m=mysql_query("select * from login where username='$email'");
$num=mysql_num_rows($m);
if ($num>0)
echo "<font color='red'>*this username already in use</font>";
?>