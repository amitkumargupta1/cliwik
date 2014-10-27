<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
$id=$_POST['msg_id'];
include('config.php');
mysql_query( "delete from bikes where id='$id'");
?>