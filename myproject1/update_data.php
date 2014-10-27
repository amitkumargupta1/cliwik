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
if(isSet($_POST['content']))
{
$query1=mysql_query("select * from login1 where username='$z'");
$fetch1=mysql_fetch_array($query1);
$email=$fetch1['username'];
$emailpic=$fetch1['picname'];
$date=date("y-m-d");
$time=date("h:i:s");
$content=$_POST['content'];
mysql_query("insert into mydata1 value('$email','','$date','$time','$emailpic','','$content','')");
$query2=mysql_query("select * from mydata1 order by id desc limit 1");
$m=mysql_fetch_array($query2);
$id=$m['id'];
$date1=$m['date'];
$time1=$m['time'];
$picname1=$m['picname'];
$picname2=$m['emailpic'];
$dbcomment=$m['wall_comment'];
}

?>


<li class="bar<?php echo $id; ?>">
<div align="left">
<span style=" padding:10px"><?php echo $dbcomment; ?> </span>
<span class="delete_button"><a href="#" id="<?php echo $id; ?>" class="delete_update">X</a></span>
</div>
</li>