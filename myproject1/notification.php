<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
?>


<?php 
$z=$_SESSION['y'];
include('config.php');
$livecomment_query1= mysql_query("select * from notification2 order by ownid desc limit 1");
$liveupdate1=mysql_fetch_array($livecomment_query1);
$update_query1=$liveupdate1['ownid'];
mysql_query("UPDATE comment_live SET mydataid='$update_query1' WHERE email='$z'");
$user_query=mysql_query("select * from notification2 order by ownid desc limit 10");
while($user_fetch=mysql_fetch_array($user_query))
{ 
$notification_ownid=$user_fetch['ownid'];
$notification_mydataid=$user_fetch['mydataid'];
$notification_name=$user_fetch['name'];
$notification_type=$user_fetch['type'];
$notification_email=$user_fetch['email'];
$user_query2=mysql_query("select * from mydata1 where id='$notification_mydataid'");
$user_fetch2=mysql_fetch_array($user_query2);
$mydata1_name=$user_fetch2['name'];
$mydata1_picname=$user_fetch2['picname'];
$mydata1_wallcomment=$user_fetch2['wall_comment'];
if($mydata1_picname=="")
{
$post_value=$mydata1_wallcomment;
}
else
{
$post_value="<img src='uploads/$mydata1_picname' height='30' width='30' border='1px'>";
}
if($notification_type=="like")
{
$print_value="likes ";
}
else
{
$print_value="commented on ";
}
if($notification_email==$z)
{
}
else
{
?>
<html>
<body>
<table cellpadding="10px">
<tr><td>
<form method="post" action="notification_detail.php">
<input type="hidden" name="<?php echo $notification_ownid; ?>"><font color="green">
<button><?php echo $notification_name; ?></font>&nbsp;&nbsp;&nbsp;<?php echo $print_value; ?><font color="green"><b><?php echo $mydata1_name; ?></b></font>
&nbsp;&nbsp;post&nbsp;&nbsp;
<font color="black"><b><?php echo $post_value; ?></b></font></button>

</form>
</td></tr>
</table><hr>
<?php } } ?>

</body>
</html>