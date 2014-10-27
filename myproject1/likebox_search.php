<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
?>
<?php
include('config.php');
if($_POST)
{
$q=$_POST['user_id'];

$sql_res=mysql_query("select * from like_insert where id='$q'");
while($row=mysql_fetch_array($sql_res))
{
$emailpic=$row['emailpic'];
$email=$row['email'];
$likeid=$row['likeid'];
?>
<a href="#" class='liked_profile' title='<?php echo $likeid; ?>'>
<div class="display_box" >
<img src="login/<?php echo $emailpic; ?>" class="image" />
<?php echo $email; ?></a>
</div>
<?php
}
}
?>