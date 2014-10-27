<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
include('config.php');
$q=$_POST['searchword'];

$sql_res=mysql_query("select * from user_data where fname like '%$q%' or lname like '%$q%' order by uid LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$fname=$row['fname'];
$lname=$row['lname'];
$img=$row['img'];
$country=$row['country'];
$uid=$row['uid'];
$user_distric=$row['distric'];
$user_state=$row['state'];
$user_semester=$row['sem'];
$user_branch=$row['branch'];
?>
<form method="post" action="profile3.php"><input type="hidden" name="<?php echo $uid; ?>">
<div >
<input type="image" src="login/<?php echo $img; ?>" class="image" height="100"  width="100" align="left"/>
&nbsp;name&nbsp;&nbsp;:&nbsp;&nbsp;<font color="green"><?php echo $fname; ?>&nbsp;<?php echo $lname; ?></font>
<br>&nbsp;sem&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $user_semester; ?>
<br>&nbsp;branch&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $user_branch; ?>
<br>&nbsp;distric&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $user_distric; ?>
<br>&nbsp;state&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $user_state; ?>

</div></form>
<?php
}
?>