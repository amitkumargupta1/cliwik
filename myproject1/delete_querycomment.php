<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
?>
<?php
include('config.php');
if($_POST['msg_id'])
{
$id=$_POST['msg_id'];
$sql = "delete from querycomment where commentid='$id'";
mysql_query( $sql);
}
?>