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

 <link rel="stylesheet" href="newcss/styles.css">
 

</head>
<body>
<?php 
$z=$_SESSION['y'];
include('config.php');
$livecomment_query1= mysql_query("select * from notification2 order by ownid desc limit 1");
$liveupdate1=mysql_fetch_array($livecomment_query1);
$update_query1=$liveupdate1['ownid'];
$livecomment_query2=mysql_query("select * from comment_live where email='$z'");
$liveupdate2=mysql_fetch_array($livecomment_query2);
$update_query2=$liveupdate2['mydataid'];
$livecomment_query10= mysql_query("select * from notification2 where ownid >$update_query2");
$comment_count=mysql_num_rows($livecomment_query10);
if($comment_count==0)
$send_update="no new events";
else
$send_update="<font color='red'>$comment_count unseen events</font>";
?>
 <nav>
 
        <ul id="navMain">
            <li><a href="multisubmit1.php"> Home</a></li>
			 <li><a href="myprofile.php"> profile</a></li>
            <li ><a href="book.php"> Post Add </a></li>
            
			 <li><a href="http://www.cusatxpress.com/" target="_blank"> CusatXpress</a></li>
			   <li ><a href="query.php"> query </a></li>
            <li><a href="new_logout.php"> Logout</a></li>
			 <li class="notification" id="<?php echo $update_query2; ?>" name="<?php echo $update_query1; ?>"><div><?php echo $send_update; ?></div>
           <ul>
		   <li ><div id="notification_update" class="display"></div></li>
		   </ul></li>
			
        </ul>
    </nav>
	<body>
</html>