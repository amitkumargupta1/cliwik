<html>
<body>
<?php 
session_start();
$z=$_SESSION['y'];
include('config.php');
$livecomment_query2=mysql_query("select * from comment_live where email='$z'");
$liveupdate2=mysql_fetch_array($livecomment_query2);
$update_query2=$liveupdate2['mydataid'];
$update_query3=$liveupdate2['wall'];
$update_query12=$liveupdate2['book'];
$update_query13=$liveupdate2['accessories'];
$update_query14=$liveupdate2['bikes'];
$livecomment_query12= mysql_query("select * from book where id >$update_query12");
$comment_count12=mysql_num_rows($livecomment_query12);
$livecomment_query13= mysql_query("select * from accessories where id >$update_query13");
$comment_count13=mysql_num_rows($livecomment_query13);
$livecomment_query14= mysql_query("select * from bikes where id >$update_query14");
$comment_count14=mysql_num_rows($livecomment_query14);
if($comment_count12!=0 || $comment_count13!=0 || $comment_count14!=0)
{
$send_update12="<font color='red'>new add</font>";
}
else
$send_update12="post add";
?>
<a href="book.php"><?php echo $send_update12; ?> </a>
</body>
</html>