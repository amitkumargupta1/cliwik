<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
include('config.php');
if($_POST['msg_id'])
{
$id=$_POST['msg_id'];
$sql = "delete from comment where commentid='$id'";
mysql_query( $sql);
mysql_query( "delete from notification2 where commentid='$id'");
}
?>