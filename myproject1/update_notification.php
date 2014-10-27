<html>
<body>
<?php 
session_start();
$z=$_SESSION['y'];
include('config.php');
$livecomment_query1= mysql_query("select * from notification2 order by ownid desc limit 1");
$liveupdate1=mysql_fetch_array($livecomment_query1);
$update_query1=$liveupdate1['ownid'];
$livecomment_query2=mysql_query("select * from comment_live where email='$z'");
$liveupdate2=mysql_fetch_array($livecomment_query2);
$update_query2=$liveupdate2['mydataid'];
$update_query3=$liveupdate2['wall'];
$livecomment_query10= mysql_query("select * from notification2 where ownid >$update_query2");
$comment_count=mysql_num_rows($livecomment_query10);
if($comment_count==0)
{
$send_update="no new events";
?>
 <div><?php echo $send_update; ?></div>
<?php
}
else
{
$send_update="<font color='red'>$comment_count unseen events</font>";
?>
<div><?php echo $send_update; ?></div>
		   
<?php 
}
?>
</body>
</html>