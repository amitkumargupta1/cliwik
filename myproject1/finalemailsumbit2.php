<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
session_start();
$email=$_POST['email_id'];
$password=$_POST['password'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$add_college=$_POST['add_college'];
$select_college=$_POST['select_college'];
$joint=$firstname." ".$lastname;
if($add_college!="")
{
mysql_select_db("newcollege");
mysql_query("INSERT INTO college values('','$add_college','');");
$sql = mysql_query("select * from college where college='$add_college'");
$m=mysql_fetch_array($sql);
$college_no=$m['no'];
$college_name=$m['college'];
$collegeid=$college_no."college";
mysql_query("UPDATE college SET collgeid='$collegeid' WHERE college='$add_college'");
mysql_query("INSERT INTO login values('','$email','$password','','$joint','$collegeid');");
mysql_query("create database $collegeid");
mysql_select_db("$collegeid");
mysql_query("create table login1
(
id int primary key auto_increment,
username varchar(50),
passwd varchar(100),
picname varchar(100),
name varchar(500)
);");
mysql_query("create table mydata1
(
email varchar(50),
picname varchar(100),
date varchar(30),
time varchar(30),
emailpic varchar(100),
pic_comment varchar(10000),
wall_comment varchar(10000),
id INT AUTO_INCREMENT PRIMARY KEY,
name varchar(200)
);");
mysql_query("create table comment
(
id int, 
comment varchar(10000),
emailid varchar(50),
emailidpic varchar(100),
commentid int auto_increment primary key,
name varchar(100),
date varchar(30),
time varchar(30)
);");
mysql_query("CREATE TABLE user_data
(
uid INT AUTO_INCREMENT PRIMARY KEY,
fname VARCHAR(25),
lname VARCHAR(50),
country VARCHAR(50),
img VARCHAR(100),
email varchar(100),
branch varchar(100),
hobbies varchar(200),
distric varchar(100),
state varchar(50),
sem varchar(100)
);");
mysql_query("CREATE TABLE like_insert
(
likeid INT AUTO_INCREMENT PRIMARY KEY,
id INT,
email VARCHAR(30),
emailpic VARCHAR(30)
);");
mysql_query("create table comment_live
(
commentid INT AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(30),
emailpic VARCHAR(30),
name varchar(50),
mydataid int,
wall int,
book int,
accessories int,
bikes int
);");
mysql_query("CREATE TABLE  picture_uploads (
upload_id int AUTO_INCREMENT PRIMARY KEY,
image_name varchar(100),
email varchar(30),
email_pic varchar(30),
mydata_id int
);");
mysql_query("CREATE TABLE unlike_insert
(
likeid INT AUTO_INCREMENT PRIMARY KEY,
id INT,
email VARCHAR(30),
emailpic VARCHAR(30)
);");
mysql_query("CREATE TABLE notification2
(
ownid int AUTO_INCREMENT PRIMARY KEY,
commentid int,
mydataid int,
email varchar(50),
emailpic varchar(100),
name varchar(200),
date varchar(50),
time varchar(50),
type varchar(30)
);");
mysql_query("CREATE TABLE notification1
(
ownid int AUTO_INCREMENT PRIMARY KEY,
commentid int,
mydataid int,
email varchar(50),
emailpic varchar(100),
name varchar(200),
date varchar(50),
time varchar(50),
type varchar(30)
);");
mysql_query("CREATE TABLE importantmessage
(
id INT AUTO_INCREMENT PRIMARY KEY,
email varchar(30),
emailpic varchar(30),
date varchar(20), 
time varchar(20),
title varchar(200), 
discription varchar(1000)
);");
mysql_query("create table querydata
(
email varchar(50),
picname varchar(50),
date varchar(30),
time varchar(30),
emailpic varchar(50),
pic_comment varchar(50),
wall_comment varchar(10000),
id INT AUTO_INCREMENT PRIMARY KEY,
name varchar(200)
);");
mysql_query("create table querycomment
(
id int, 
comment varchar(10000),
emailid varchar(50),
emailidpic varchar(100),
commentid int auto_increment primary key,
name varchar(100),
date varchar(30),
time varchar(30)
);");
mysql_query("CREATE TABLE querylike_insert
(
likeid INT AUTO_INCREMENT PRIMARY KEY,
id INT,
email VARCHAR(30),
emailpic VARCHAR(30)
);");
mysql_query("CREATE TABLE queryunlike_insert
(
likeid INT AUTO_INCREMENT PRIMARY KEY,
id INT,
email VARCHAR(30),
emailpic VARCHAR(30)
);");
mysql_query("CREATE TABLE book
(
id INT AUTO_INCREMENT PRIMARY KEY,
email varchar(30),
emailpic varchar(30),
date varchar(20), 
time varchar(20),
title varchar(200),
cost varchar(100), 
discription varchar(1000)
);");
mysql_query("CREATE TABLE accessories
(
id INT AUTO_INCREMENT PRIMARY KEY,
email varchar(30),
emailpic varchar(30),
date varchar(20), 
time varchar(20),
title varchar(200),
cost varchar(100), 
discription varchar(1000)
);");
mysql_query("CREATE TABLE bikes
(
id INT AUTO_INCREMENT PRIMARY KEY,
email varchar(30),
emailpic varchar(30),
date varchar(20), 
time varchar(20),
title varchar(200),
cost varchar(100), 
discription varchar(1000)
);");
mysql_query("create table mydata1_count
(
own_id int auto_increment primary key,
data1_id int
);");
mysql_query("INSERT INTO login1 VALUE('','$email','$password','','$joint');");
mysql_query("INSERT INTO user_data VALUE('','$joint','','','','$email','','','','','');");
mysql_query("INSERT INTO comment_live VALUE('','$email','','$joint','0','0','0','0','0');");
$_SESSION['y']=$email;
$_SESSION['select']=$collegeid;
}
else
{
mysql_select_db("newcollege");
$sql = mysql_query("select * from college where college='$select_college'");
$m=mysql_fetch_array($sql);
$college_no=$m['no'];
$college_name=$m['collgeid'];
mysql_query("INSERT INTO login values('','$email','$password','','$joint','$college_name');");
mysql_select_db("$college_name");
mysql_query("INSERT INTO login1 VALUE('','$email','$password','','$joint');");
mysql_query("INSERT INTO user_data VALUE('','$joint','','','','$email','','','','','');");
mysql_query("INSERT INTO comment_live VALUE('','$email','','$joint','0','0','0','0','0');");
$_SESSION['y']=$email;
$_SESSION['select']=$college_name;
}
?>