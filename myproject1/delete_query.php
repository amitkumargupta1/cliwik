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
$sql = "delete from querydata where id='$id'";
mysql_query( $sql);
mysql_query( "delete from querycomment where id='$id'");
}
?>