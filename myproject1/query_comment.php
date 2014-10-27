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
if(isSet($_POST['textcontent']))
{
$textcontent=$_POST['textcontent'];
$msgid=$_POST['com_msgid'];
$date=date("y-m-d");
$time=date("h:i:s");
$query1=mysql_query("select * from login1 where username='$z'");
$fetch1=mysql_fetch_array($query1);
$email=$fetch1['username'];
$emailpic=$fetch1['picname'];
$name=$fetch1['name'];
mysql_query("insert into querycomment value('$msgid','$textcontent','$email','$emailpic','','$name','$date','$time')");
$query2=mysql_query("select * from querycomment where emailid='$z'");
$fetch2=mysql_fetch_array($query2);
$picname2=$fetch2['emailidpic'];
$msg_id=$fetch2['commentid'];
$query3=mysql_query("select * from querycomment where comment='$textcontent' && date='$date' && time='$time' && emailid='$email'");
$fetch3=mysql_fetch_array($query3);
$msg_id1=$fetch3['commentid'];
$name2=$fetch3['name'];
$button= "<button name='deletesubmit' class='delete_comment' id='$msg_id1'>delete</button>";
}

?>
<div id="commentcolor">
<table bgcolor="#F0F0F0" class="comment<?php echo $msg_id1; ?>"><tr><td>
<div class="stbody"> 
<div class="stimg"><form method="post" action="query_profile2.php"><input type="hidden" name="<?php echo $msg_id1; ?>">
<input type='image' height="45" width="45" align="left" src="login/<?php echo $picname2;?>" border="1px"></form></div><div class="sttext">
<font color="green"><u><?php echo $name2;?></u></font>
<?php echo $textcontent;?><?php echo $button; ?>
</td></tr></table></div> 
</div>

</div>
 


