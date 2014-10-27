<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
$z=$_SESSION['y'];
include('config.php');
$query1=mysql_query("select * from login1 where username='$z'");
$fetch1=mysql_fetch_array($query1);
$email=$fetch1['username'];
$emailpic=$fetch1['picname'];
$name=$fetch1['name'];
$date=date("y-m-d");
$time=date("h:i:s");
$wall_comment=$_POST['content'];
mysql_query("insert into mydata1 value('$email','','$date','$time','$emailpic','','$wall_comment','','$name')");
$query2=mysql_query("select * from mydata1 where wall_comment='$wall_comment' && date='$date' && time='$time' && email='$email'");
$m=mysql_fetch_array($query2);
$msg_id=$m['id'];
$date1=$m['date'];
$time1=$m['time'];
$picname1=$m['picname'];
$picname2=$m['emailpic'];
$dbcomment=$m['wall_comment'];
$name2=$m['name'];
$link_txt=linkToAnchor($dbcomment);
$video=video_link($dbcomment);
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
        // The Regular Expression filter
        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

        // The Text you want to filter for urls

        // Check if there is a url in the text
        if(preg_match_all($reg_exUrl, $text, $url)) {
               // make the urls hyper links
               $matches = array_unique($url[0]);
               foreach($matches as $match) {
                    $replacement = "<a href=".$match." target='_blank'>{$match}</a>";
                    $text = str_replace($match,$replacement,$text);
               }
               return nl2br($text);
        } else {

               // if no urls in the text just return the text
               return nl2br($text);

        }
    }
$button= "<button name='deletesubmit' class='delete_update' id='$msg_id'>delete</button>";

mysql_query("UPDATE mydata1_count set data1_id='$msg_id' where own_id='1'");


?>


<table bgcolor="#F0F0F0" class="bar<?php echo $msg_id; ?>" id="box">
<tr><td>
<div class="stbody"> 
<div class="stimg"><form method="post" action="profile2.php"><input type="hidden" name="<?php echo $msg_id; ?>">
<input type="image" height="50" width="50" src="login/<?php echo $picname2;?>" align="left" border="1px"></form></div>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $name2; ?><?php echo $button; ?>
<br><font color="#B0B0B0"><?php echo $date1; ?>&nbsp;&nbsp;<?php echo $time1; ?></font></div><br>
<br><?php echo $link_txt; ?><br><div id="like_search<?php echo $msg_id; ?>"></div>
<div id="unlike_post<?php echo $msg_id; ?>"></div>
<div id="like_post<?php echo $msg_id; ?>" class="view_like" name="<?php echo $msg_id;?>"></div>
<button class="click_unlike" id="<?php echo $msg_id;?>">unlike</button><button class="click_like" id="<?php echo $msg_id;?> ">like</button>
</td></tr><tr><td><?php echo $video; ?></tr></td><tr><td><div  id="loadplace<?php echo $msg_id; ?>" ></div></tr></td><tr>
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