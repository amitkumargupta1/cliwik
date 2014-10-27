<html>
<body>
<div id="navigation" style="float: left;width: 546px;">
<table cellpadding="0" cellspacing="0" width="500px">
<tr>
<td>
<!--<div style="height:7px"></div>-->




<div  id="update" class="timeline"></div>
<?php
session_start();
$z=$_SESSION['y'];
include('config.php');
$id_be=$_POST['lastmsg'];
/*session_start();
$z=$_SESSION['y'];*/
function video_link($text) {
        // The Regular Expression filter
        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

        // The Text you want to filter for urls

        // Check if there is a url in the text
        if(preg_match_all($reg_exUrl, $text, $url)) {
               // make the urls hyper links
               $matches = array_unique($url[0]);
               foreach($matches as $match) {
			  if( preg_match_all ("/youtube+/U", $match, $pat_array))
			   { 
			   $video="<iframe width='500' height='345'
src='$match'>
</iframe>";
			   }
			   else
			   $video="";
               }
               return ($video);
        } 
    } 
function linkToAnchor($text) {
       
        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

       

        
        if(preg_match_all($reg_exUrl, $text, $url)) {
               
               $matches = array_unique($url[0]);
               foreach($matches as $match) {
                    $replacement = "<a href=".$match." target='_blank'>{$match}</a>";
                    $text = str_replace($match,$replacement,$text);
               }
               return nl2br($text);
        } else {

           
               return nl2br($text);

        }
    }

$login_query=mysql_query("select * from login1 where username='$z'");
$login_fetch=mysql_fetch_array($login_query);
$login_username=$login_fetch['picname'];
$login_email=$login_fetch['username'];
$login_name=$login_fetch['name'];

$sql = mysql_query("select * from mydata1 where id<'$id_be' order by id desc limit 10 ");
$update_count=mysql_num_rows($sql);
if($update_count==0)
$msg_id=0;
while($m=mysql_fetch_array($sql))
{
$msg_id=$m['id'];
$date1=$m['date'];
$time1=$m['time'];
$picname1=$m['picname'];
$picname2=$m['emailpic'];
$dbcomment=$m['wall_comment'];
$email=$m['email'];
$name1=$m['name'];
$dbcomment1=$m['pic_comment'];
	$link_txt=linkToAnchor($dbcomment);
	$video=video_link($dbcomment);
	if($picname1!='')
	{
	if($dbcomment1=="updated his profile pic")
	$wall_imaging="<br><br><img src='login/$picname1' height='500px' width='480px' border='1px'>";
	else
$wall_imaging="<br><br><img src='uploads/$picname1' height='500px' width='480px' border='1px'>";
}
else
{
$wall_imaging="";
}
if($email==$z)
$button= "<button name='deletesubmit' class='delete_update' id='$msg_id'>delete</button>";
else
$button="";

$likequery1 = mysql_query("select * from like_insert where id='$msg_id'");
$like_count1=mysql_num_rows($likequery1);

$likequery2 = mysql_query("select * from like_insert where email='$z' and id='$msg_id'");
$like_count2=mysql_num_rows($likequery2);
if($like_count2==1)
{
$like_button="";
$like_count1=$like_count1 - 1;
$like_counter=$like_count1;
if($like_counter==0)
$like_counter="you liked";
else
$like_counter="$like_count1 like and you liked";

}
else
{
$like_button="<button class='click_like' id='$msg_id'>like</button>";
$like_counter=$like_count1;
if($like_counter==0)
$like_counter="";
else
$like_counter="$like_count1 like";
}


$unlikequery1 = mysql_query("select * from unlike_insert where id='$msg_id'");
$unlike_count1=mysql_num_rows($unlikequery1);
$unlikequery2 = mysql_query("select * from unlike_insert where email='$z' and id='$msg_id'");
$unlike_count2=mysql_num_rows($unlikequery2);
if($unlike_count2==1)
{
$unlike_button="";
$unlike_count1=$unlike_count1 - 1;
$unlike_counter=$unlike_count1;
if($unlike_counter==0)
$unlike_counter="you unliked";
else
$unlike_counter="$unlike_count1 unlike and you unliked";

}
else
{
$unlike_button="<button class='click_unlike' id='$msg_id'>unlike</button>";
$unlike_counter=$unlike_count1;
if($unlike_counter==0)
$unlike_counter="";
else
$unlike_counter="$unlike_count1 unlike";
}

?>

<table bgcolor="#F0F0F0" class="bar<?php echo $msg_id; ?>" id="box">
<tr><td>
<div class="stbody"> 
<div class="stimg">
<form method="post" action="profile2.php"><input type="hidden" name="<?php echo $msg_id; ?>">
<input type="image" height="50" width="50" src="login/<?php echo $picname2;?>" align="left" border="1px"></form></div>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $name1; ?>
<?php echo $button; ?><br><font color="#B0B0B0"><?php echo $date1; ?>&nbsp;&nbsp;<?php echo $time1; ?></font>
</div><br><br><?php echo $dbcomment1; ?>
<?php echo $wall_imaging; ?><?php echo $link_txt; ?><br><?php echo $video; ?>
<br><div id="like_search<?php echo $msg_id; ?>"></div>
<div id="unlike_post<?php echo $msg_id; ?>"><?php echo $unlike_counter;?></div>
<div id="like_post<?php echo $msg_id; ?>" class="view_like" name="<?php echo $msg_id;?>"><?php echo $like_counter;?></div>
<?php echo $unlike_button;?><?php echo $like_button;?>
</td></tr><tr><td>
<div id="commentcolor">
<?php
$commentquery=mysql_query("select * from comment where id='$msg_id'");
$number=mysql_num_rows($commentquery);
if($number>0)
{
while($member=mysql_fetch_array($commentquery))
{
$commentemailid=$member['emailid'];
$msg_id1=$member['commentid'];
$comment_emailpic=$member['emailidpic'];
$comment_text=$member['comment'];
$name2=$member['name'];
if($commentemailid==$z)
{
$delete_button= "<button name='deletesubmit' class='delete_comment' id='$msg_id1'>delete</button>";
}
else
{
$delete_button="";
} ?>
<table class="comment<?php echo $msg_id1; ?>">
<tr><td>
<div class="stbody"> <div class="stimg">
<form method="post" action="profile1.php"><input type="hidden" name="<?php echo $msg_id1; ?>">
<input type='image' height="45" width="45" align="left" src="login/<?php echo $comment_emailpic;?>" border="1px">
 </form></div>
<div class="sttext"><font color="green"><u><?php echo $name2; ?></u></font>
<?php echo $comment_text; ?>
<?php echo $delete_button; ?></td></tr></table>
<?php } } ?></div> 
</div>

</div>
<div  id="loadplace<?php echo $msg_id; ?>" ></div>

<tr ><td ><div style="background-color: #E8F4FF;"><div class="stbody" >
<div class="stimg"><img height="45" width="45" align="left" src="login/<?php echo $login_username;?>" border="1px">
</div><div class="sttext" >
<div id="flash<?php echo $msg_id; ?>" class="flash_load" ></div>

<!--<form action="" method="post" name="<?php echo $msg_id; ?>">-->
<textarea  id="textboxcontent<?php echo $msg_id; ?>" placeholder="write a comment" class="input" style="height:40px;width:420px;margin-right:50px;">
</textarea><br /></div>
<input type="submit" value="post"  class="comment_submit" id="<?php echo $msg_id; ?>" /></div>



<!--</form>--></div>
</td></tr>
</table><br>
<?php } ?> 

</td>
</tr>
</table>
<div id="more<?php echo $msg_id; ?>" class="morebox">
<a href="#" id="<?php echo $msg_id; ?>" class="more">more</a>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>

</div>


</body>
</html>
