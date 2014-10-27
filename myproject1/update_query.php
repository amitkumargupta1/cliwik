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
$livecomment_query11= mysql_query("select * from querydata where id >$update_query3");
$comment_count11=mysql_num_rows($livecomment_query11);
$livecomment_query20= mysql_query("select * from querydata order by id desc limit 1");
$liveupdate20=mysql_fetch_array($livecomment_query20);
$update_query20=$liveupdate20['id'];
if($comment_count11==0)
{
$send_update11="query";
?>
<a href="query.php"><?php echo $send_update11; ?> </a>
<?php
}
else
{
$send_update11="<font color='red'>$comment_count11 new query</font>";

?>
<a href="query.php"> <?php echo $send_update11; ?> </a>
<?php
}
?>
</body>
</html>