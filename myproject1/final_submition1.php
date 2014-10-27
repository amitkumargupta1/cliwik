<?php
session_start();
include('config.php');
$z=$_SESSION['y'];
$branch=$_POST["branch"];
$sem=$_POST["sem"];
$hobbies=$_POST["hobbies"];
$distric=$_POST["distric"];
$state=$_POST["state"];
$name1=$_POST["name1"];
$query1=mysql_query("select * from login1 where username='$z'");
$fetch1=mysql_fetch_array($query1);
$email=$fetch1['username'];
$emailpic=$fetch1['picname'];
$name=$fetch1['name'];
$date=date("y-m-d");
$time=date("h:i:s");
mysql_query("update user_data set branch='$branch' where email='$z'");
mysql_query("update user_data set hobbies='$hobbies' where email='$z'");
mysql_query("update user_data set distric='$distric' where email='$z'");
mysql_query("update user_data set state='$state' where email='$z'");
mysql_query("update user_data set sem='$sem' where email='$z'");
$img=$_SESSION['img'];
$user_query=mysql_query("select * from user_data where email='$z'");
$user_fetch=mysql_fetch_array($user_query);
$user_picture=$user_fetch['img'];
if($user_picture!=$img)
{
mysql_query("insert into mydata1 value('$email','$emailpic','$date','$time','$emailpic','updated profile pic','','','$name')");
}
if($name!=$name1)
{
	                            mysql_query("update login1 set name='$name1' where username='$z'");
								mysql_query("update user_data set fname='$name1' where email='$z'");
								mysql_query("update comment_live set name='$name1' where email='$z'");
								mysql_query("update mydata1 set name='$name1' where email='$z'");
								mysql_query("update comment set name='$name1' where emailid='$z'");
								mysql_query("update querydata set name='$name1' where email='$z'");
								mysql_query("update querycomment set name='$name1' where emailid='$z'");
	                            mysql_select_db("newcollege");	
	                            mysql_query("update login  name='$name1' where username='$z'");
}

header('Location:multisubmit1.php');
?>
