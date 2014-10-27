<html>
<head>

<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script type="text/javascript">
  
  $(document).ready(function()
  {
 $(".notification").live("click",function() 
{

var username=$(this).attr('id');
var usercommentid=$(this).attr('name');

var dataString = 'user_id='+username+'&comment_name='+usercommentid;
	$.ajax({
            type: "POST",
            url: "notification.php",
            data: dataString,
            cache: false,
            success: function(data)
            {
			if(data=="")
			$("#notification_update").html("no new comments").show();
			else
            $("#notification_update").html(data).show();
           }
});
});
return false;
});
</script>
 <script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('.notification').load('update_notification.php').fadeIn("slow");
}, 1000); // refresh every 10000 milliseconds
</script>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#newquery1').load('update_query.php').fadeIn("slow");
}, 1000); // refresh every 10000 milliseconds
</script>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#add1').load('update_add.php').fadeIn("slow");
}, 1000); // refresh every 10000 milliseconds
</script>

 <link rel="stylesheet" href="newcss/styles.css">
<style type="text/css">
    
#container
{
margin:50px; padding:10px; width:460px
}
#contentbox
{
width:458px; height:20px;
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
#display
{
display:none;
border-left:solid 1px #dedede;
border-right:solid 1px #dedede;
border-bottom:solid 1px #dedede;
overflow:hidden;
}
.display_box
{
padding:4px; border-top:solid 1px #dedede; font-size:12px; height:30px;
}
.display_box:hover
{
background:#3b5998;
color:#FFFFFF;
}
.image
{
width:25px; float:left; margin-right:6px
}
</style>
</head>
<body>
<?php 
/*session_start();*/
$z=$_SESSION['y'];
include('config.php');
$livecomment_query1= mysql_query("select * from notification2 order by ownid desc limit 1");
$liveupdate1=mysql_fetch_array($livecomment_query1);
$update_query1=$liveupdate1['ownid'];
$livecomment_query2=mysql_query("select * from comment_live where email='$z'");
$liveupdate2=mysql_fetch_array($livecomment_query2);
$update_query2=$liveupdate2['mydataid'];
$update_query3=$liveupdate2['wall'];
$update_query12=$liveupdate2['book'];
$update_query13=$liveupdate2['accessories'];
$update_query14=$liveupdate2['bikes'];
$livecomment_query10= mysql_query("select * from notification2 where ownid >$update_query2");
$comment_count=mysql_num_rows($livecomment_query10);
if($comment_count==0)
$send_update="no new events";
else
$send_update="<font color='red'>$comment_count unseen events</font>";
$livecomment_query11= mysql_query("select * from querydata where id >$update_query3");
$comment_count11=mysql_num_rows($livecomment_query11);
if($comment_count11==0)
$send_update11="query";
else
$send_update11="<font color='red'>$comment_count11 new query</font>";
$livecomment_query12= mysql_query("select * from book where id >$update_query12");
$comment_count12=mysql_num_rows($livecomment_query12);
$livecomment_query13= mysql_query("select * from accessories where id >$update_query13");
$comment_count13=mysql_num_rows($livecomment_query13);
$livecomment_query14= mysql_query("select * from bikes where id >$update_query14");
$comment_count14=mysql_num_rows($livecomment_query14);
if($comment_count12!=0 || $comment_count13!=0 || $comment_count14!=0)
{
$send_update12="<font color='red'>new add</font>";
}
else
$send_update12="Post Add";
?>
 <nav>
 
        <ul id="navMain">
            <li><a href="multisubmit1.php"> Home</a></li>
			  <li><a href="myprofile.php"> profile</a></li>
            <li id="add1" ><a href="book.php"><?php echo $send_update12; ?></a></li>
            
			 <li><a href="http://www.cusatxpress.com/" target="_blank"> CusatXpress</a></li>
			   <li id="newquery1"><a href="query.php"> <?php echo $send_update11; ?> </a></li>
            <li><a href="new_logout.php"> Logout</a></li>
			 <li><div class="notification" id="<?php echo $update_query2; ?>" name="<?php echo $update_query1; ?>"><div><?php echo $send_update; ?></div></div>
           <ul>
		   <li ><div id="notification_update" class="display"></div></li>
		   </ul></li>
			<div style="float:right;padding:0px;"><form method="post" action="box_search.php">
<input type="text" id="contentbox" name="searchword" placeholder="search for a person" required />
<input type="submit">
</form></div>


        </ul>
    </nav>
	<body>
</html>