<?php
mysql_connect("localhost","root","");
mysql_select_db("newcollege");
session_start();
if(isSet($_POST['username']) && isSet($_POST['password']))
{
// username and password sent from Form
$username=$_POST['username']; 
$password=$_POST['password']; 

$result=mysql_query("select * from login where username='$username' and passwd='$password'");
$count=mysql_num_rows($result);
$row=mysql_fetch_array($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count>0)
{
$_SESSION['y']=$row['username'];
$_SESSION['select']=$row['college'];
echo $row['username'];
}
}
?>