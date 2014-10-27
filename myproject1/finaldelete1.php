<?php
session_start();
$z=$_SESSION['y'];
$img=$_SESSION['img'];
include('config.php');
								mysql_query("update login1 set picname='$img' where username='$z'");
								mysql_query("update user_data set img='$img' where email='$z'");
								mysql_query("update comment_live set emailpic='$img' where email='$z'");
								mysql_query("update mydata1 set emailpic='$img' where email='$z'");
								mysql_query("update comment set emailidpic='$img' where emailid='$z'");
								mysql_query("update like_insert set emailpic='$img' where email='$z'");
								mysql_query("update book set emailpic='$img' where email='$z'");
								mysql_query("update bikes set emailpic='$img' where email='$z'");
								mysql_query("update accessories set emailpic='$img' where email='$z'");
								mysql_query("update importantmessage set emailpic='$img' where email='$z'");
								mysql_query("update querydata set emailpic='$actual_image_name' where email='$z'");
								mysql_query("update querycomment set emailidpic='$actual_image_name' where emailid='$z'");
								mysql_query("update querylike_insert set emailpic='$actual_image_name' where email='$z'");
								mysql_query("update queryunlike_insert set emailpic='$actual_image_name' where email='$z'");
?>