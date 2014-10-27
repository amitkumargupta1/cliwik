<?php
$select=$_SESSION['select'];
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysql_select_db("$select");
?>