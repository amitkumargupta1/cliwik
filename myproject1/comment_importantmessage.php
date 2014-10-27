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
$query1=mysql_query("select * from login1 where username='$z'");
$fetch1=mysql_fetch_array($query1);
$email=$fetch1['username'];
$emailpic=$fetch1['picname'];
$login_name=$fetch1['name'];
$date=date("y-m-d");
$time=date("h:i:s");
$wall_comment=$_POST['content'];
$title=$_POST['title'];
mysql_query("insert into importantmessage value('','$email','$emailpic','$date','$time','$title','$wall_comment')");
$query2=mysql_query("select * from importantmessage where discription='$wall_comment' && date='$date' && time='$time' && email='$email'");
$m=mysql_fetch_array($query2);
$msg_id=$m['id'];
$date1=$m['date'];
$time1=$m['time'];
$title=$m['title'];
$picname2=$m['emailpic'];
$discription=$m['discription'];
$email=$m['email'];
$user_query=mysql_query("select * from user_data where email='$email'");
$user_fetch=mysql_fetch_array($user_query);
$user_branch=$user_fetch['branch'];
$user_fname=$user_fetch['fname'];
$user_lname=$user_fetch['lname'];
$user_distric=$user_fetch['distric'];
$user_state=$user_fetch['state'];
$user_semester=$user_fetch['sem'];
$button= "<button name='deletesubmit' class='messagedelete_update' id='$msg_id'>delete</button>";
?>
<html>
<body>
<table class="bar<?php echo $msg_id; ?>" id="box">
<tr><td><img src="login/<?php echo $picname2; ?>" height="100px" width="100px"><br>
<font color="green"><u><?php echo $user_fname."&nbsp;&nbsp;".$user_lname; ?></u></font><br></td></tr>
<tr><td>title&nbsp;:&nbsp;&nbsp;<?php echo $title; ?><br>
details&nbsp;:&nbsp;&nbsp;<?php echo $discription; ?><br></td></tr><tr><td><?php echo $button; ?></td></tr><br>
</table>

</body>
</html>




