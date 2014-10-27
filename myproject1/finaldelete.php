
<?php
session_start();
$z=$_SESSION['y'];
include('config.php');
mysql_query("update login1 set picname='' where username='$z'");
mysql_query("update user_data set img='' where email='$z'");
mysql_query("update comment_live set emailpic='' where email='$z'");


?>