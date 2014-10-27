<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
?>
<?php
$email=$_SESSION['email1'];
$emailpic=$_SESSION['emailpic1'];
for($c=1;$c<=1000;$c++)
{
if(isset($_POST[$c]))
{
$comment=$_POST['t1'];
include('config.php');
$q=mysql_query("insert into comment value('$c','$comment','$email','$emailpic','')");
echo "inserted";
header("location:home2.php");
break;
}
}
?>