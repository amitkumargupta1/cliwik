<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Insert Record with jQuery and Ajax</title>
  
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
 <script type="text/javascript">
$(function() {
$('.delete_update').live("click",function() 
{
var ID = $(this).attr("id");
 var dataString = 'msg_id='+ ID;
 
if(confirm("Sure you want to delete this update? There is NO undo!"))
{

$.ajax({
type: "POST",
 url: "accessories_delete.php",
  data: dataString,
 cache: false,
 success: function(html){
 $(".bar"+ID).slideUp('slow', function() {$(this).remove();});
 }
});

}

return false;
});

$(".comment_button").click(function() {


   
    var boxval = $("#content").val();
	var title = $("#title").val();
	var cost = $("#cost").val();
    var dataString = 'content='+ boxval +'&title='+ title +'&cost='+ cost ;
	
	if(title=='' || cost=='')
	{
	alert("Please Enter Some Text in cost and title box");
	
	}
	else
	{
	$("#flash").show();
	$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
$.ajax({
		type: "POST",
  url: "comment_accessories.php",
   data: dataString,
  cache: false,
  success: function(html){
 
   $("ol#update").prepend(html);
  $("ol#update li:first").slideDown("slow");
   document.getElementById('content').value='';
    document.getElementById('title').value='';
	 document.getElementById('cost').value='';
  $("#flash").hide();
	
  }
 });
}
return false;
	});



});


</script>
<link rel="stylesheet" href="css/style.css"/>
</head>

<body>
<?php
 include('liveupdate1.php'); ?>
 <br><br><br><br>
<div align="center">
<a href="book.php">sell book</a><br>
<a href="bikes.php">sell bikes</a>
<table cellpadding="0" cellspacing="0" width="500px">
<tr>
<td>

<div align="left">

<table cellpadding="0" cellspacing="0" width="500px">

<tr><td align="left"><div align="left"><h3>post your add for selling accessories</h3></div></td></tr>
<tr>
<td style="padding:4px; padding-left:10px;" class="comment_box">
<textarea cols="30" rows="2"  style="width:480px;font-size:14px; font-weight:bold" name="title" id="title" placeholder="enter title" >
</textarea><br />
<textarea cols="30" rows="2"  style="width:480px;font-size:14px; font-weight:bold" name="cost" id="cost" placeholder="enter cost">
</textarea><br />
<textarea cols="30" rows="2"  style="width:480px;font-size:14px; font-weight:bold" name="content" id="content" placeholder="enter discription" >
</textarea><br />
<input type="submit"  value="Update"  id="v" name="submit" class="comment_button"/>
</td>

</tr>

</table>


</div>
<div style="height:7px"></div>
<div id="flash" align="left"  ></div>



<ol  id="update" class="timeline">
</ol>

</td>
</tr>
</table>






</div>

<?php

/*$z=$_SESSION['y'];*/
include('config.php');
$livecomment_query20= mysql_query("select * from accessories order by id desc limit 1");
$liveupdate20=mysql_fetch_array($livecomment_query20);
$update_query20=$liveupdate20['id'];
mysql_query("UPDATE comment_live SET accessories='$update_query20' WHERE email='$z'");
$login_query=mysql_query("select * from login1 where username='$z'");
$login_fetch=mysql_fetch_array($login_query);
$login_username=$login_fetch['picname'];
$login_email=$login_fetch['username'];
$login_name=$login_fetch['name'];
$sql = mysql_query("select * from accessories order by id desc");
while($m=mysql_fetch_array($sql))
{
$msg_id=$m['id'];
$date1=$m['date'];
$time1=$m['time'];
$title=$m['title'];
$picname2=$m['emailpic'];
$discription=$m['discription'];
$email=$m['email'];
$cost=$m['cost'];
if($email==$z)
$button= "<button name='deletesubmit' class='delete_update' id='$msg_id'>delete</button>";
else
$button=""; 
$user_query=mysql_query("select * from user_data where email='$email'");
$user_fetch=mysql_fetch_array($user_query);
$user_branch=$user_fetch['branch'];
$user_fname=$user_fetch['fname'];
$user_lname=$user_fetch['lname'];
$user_distric=$user_fetch['distric'];
$user_state=$user_fetch['state'];
$user_semester=$user_fetch['sem'];
?>
<table class="bar<?php echo $msg_id; ?>" id="box">
<tr><td><img src="login/<?php echo $picname2; ?>" height="100px" width="100px"><br>
<font color="green"><u><?php echo $user_fname."&nbsp;&nbsp;".$user_lname; ?></u></font><br></td></tr>
<tr><td>title&nbsp;:&nbsp;&nbsp;<?php echo $title; ?><br>
details&nbsp;:&nbsp;&nbsp;<?php echo $discription; ?><br>cost&nbsp;: &nbsp;&nbsp;<?php echo $cost; ?><br></td></tr><tr><td><?php echo $button; ?></td></tr><br>
</table>

<?php } ?>
</body>
</html>


