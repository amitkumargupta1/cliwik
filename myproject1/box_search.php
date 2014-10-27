<html>
<title>search</title>
<head>
<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
?>
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
 
<script type="text/javascript">
$(document).ready(function()
{

$("#contentbox").keyup(function() 
{

var content=$(this).text(); //Content Box Data

var dataString = 'searchword='+ content;
//If @ available
//if @abc avalable
if(content.length>0)
{
 $(".addname").remove();
 $("#msgbox").show();
$.ajax({
type: "POST",
url: "box_search2.php", // Database name search 
data: dataString,
cache: false,
success: function(data)
{
$("#msgbox").hide();
$("#display").html(data).show();
}
});
}

return false;
});
});
</script>
<style type="text/css">
#container
{
margin:50px; padding:10px; width:460px
}
#contentbox
{
width:458px; height:50px;
border:solid 2px #333;
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
margin-bottom:6px;
text-align:left;
}
#msgbox
{
border:solid 1px #dedede;padding:5px;
display:none;background-color:#f2f2f2
}
.msgbox1
{
border:solid 1px #dedede;padding:5px;
display:none;background-color:#f2f2f2
}
#display
{
display:none;
border-left:solid 1px #dedede;
border-right:solid 1px #dedede;
border-bottom:solid 1px #dedede;
overflow:hidden;
}

</style>
</head>
<?php
include('config.php');
include('liveupdate2.php'); ?>
<br><br><br>

<div id="contentbox" contenteditable="true" >
</div>
<div id="msgbox">searching......</div>
<div id="display"  id="msgbox1">
</div>


<?php if($_POST)
{
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
<div class="addname">
<form method="post" action="profile3.php"><input type="hidden" name="<?php echo $uid; ?>">

<input type="image" src="login/<?php echo $img; ?>" class="image" height="100"  width="100" align="left" >
&nbsp;name&nbsp;&nbsp;:&nbsp;&nbsp;<font color="green"><?php echo $fname; ?>&nbsp;<?php echo $lname; ?></font>
<br>&nbsp;sem&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $user_semester; ?>
<br>&nbsp;branch&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $user_branch; ?>
<br>&nbsp;distric&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $user_distric; ?>
<br>&nbsp;state&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $user_state; ?>
</form></div>

<?php
}
}
?>



<?php 

$comment_query= mysql_query("select * from notification2 order by ownid desc limit 1");
$update1=mysql_fetch_array($comment_query);
$update_query=$update1['ownid'];
$comment_query2= mysql_query("UPDATE comment_live SET mydataid='$update_query' WHERE email='$z';");
$comment_query5= mysql_query("select * from querydata order by id desc limit 1");
$update5=mysql_fetch_array($comment_query5);
$update_query5=$update5['id'];
mysql_query("UPDATE comment_live SET wall='$update_query5' WHERE email='$z';"); 
?>

</body>
</html>
