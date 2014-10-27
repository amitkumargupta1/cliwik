
<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
?>
<?php 
$z=$_SESSION['y'];
$deletepic_id=$_POST["deletepic_id"];
$text_string=$_POST["text_string"];
include('config.php');
mysql_query("update mydata1 set pic_comment='$text_string' where id='$deletepic_id'");
$query2=mysql_query("select * from mydata1 where id='$deletepic_id'");
$m1=mysql_fetch_array($query2);
$msg_id=$m1['id'];
$date1=$m1['date'];
$time1=$m1['time'];
$picname1=$m1['picname'];
$picname2=$m1['emailpic'];
$dbcomment=$m1['pic_comment'];
$name2=$m1['name'];
$wall_imaging="<img src='uploads/$picname1' height='500' width='500'>";

$button= "<button name='deletesubmit' class='delete_update' id='$msg_id'>delete</button>";
?>
<html>
<body>

<table bgcolor="#F0F0F0" class="bar<?php echo $msg_id; ?>" id="box">
<tr><td>
<div class="stbody"> 
<div class="stimg"><form method="post" action="profile2.php"><input type="hidden" name="<?php echo $msg_id; ?>">
<input type="image" height="50" width="50" src="login/<?php echo $picname2;?>" align="left" border="1px"></form></div>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $name2; ?><?php echo $button; ?>
<br><font color="#B0B0B0"><?php echo $date1; ?>&nbsp;&nbsp;<?php echo $time1; ?></font></div><br>
<br><?php echo $dbcomment; ?><br><br><?php echo $wall_imaging; ?><br><div id="like_search<?php echo $msg_id; ?>"></div>
<div id="unlike_post<?php echo $msg_id; ?>"></div>
<div id="like_post<?php echo $msg_id; ?>" class="view_like" name="<?php echo $msg_id;?>"></div>
<button class="click_unlike" id="<?php echo $msg_id;?>">unlike</button><button class="click_like" id="<?php echo $msg_id;?> ">like</button>
</td></tr><tr><td><div  id="loadplace<?php echo $msg_id; ?>" ></div></tr></td><tr>
<td>
<div style="background-color: #E8F4FF;"><div class="stbody" ><div class="stimg">
<img height="45" width="45" align="left" src="login/<?php echo $picname2;?>" border="1px>"></div><div class="sttext" >


<div id="flash<?php echo $msg_id; ?>" class='flash_load'></div>
 <!--<form action="" method="post" name="<?php echo $msg_id; ?>">-->
<textarea  id="textboxcontent<?php echo $msg_id; ?>" placeholder="write a comment" class="input" style="height:40px;width:420px;margin-right:50px;" >
</textarea>
<br /></div>
<button value=" Comment_Submit "  class="comment_submit" id="<?php echo $msg_id; ?>" >post</button></div>



 <!--</form>--></div> 
</td></tr></table><br>
</body>
</html>






