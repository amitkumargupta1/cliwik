<html>
<head>
<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
?>
<?php
$z=$_SESSION['y'];
include('config.php'); //$session id
$user_query=mysql_query("select * from user_data where email='$z'");
$user_fetch=mysql_fetch_array($user_query);
$user_picture=$user_fetch['img'];
$user_country=$user_fetch['country'];
$user_branch=$user_fetch['branch'];
$user_hobbies=$user_fetch['hobbies'];
$user_fname=$user_fetch['fname'];
$user_lname=$user_fetch['lname'];
$user_distric=$user_fetch['distric'];
$user_state=$user_fetch['state'];
$user_semester=$user_fetch['sem'];
$_SESSION['img']=$user_picture;
?>

<title>Ajax Image Upload 9lessons blog</title>
<link rel="stylesheet" href="css2/style.css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.wallform.js"></script>
<script type="text/javascript">
$(document).ready(function() 
{
$('.delete_pic').live("click",function() 
{
 
var B=$("#imageloadbutton");

if(confirm("Sure you want to delete this update? There is NO undo!"))
{

var dataString = 'user_id=amit';
$.ajax({
type: "POST",
 url: "finaldelete1.php",
 data: dataString,
 cache: false,
      
 success: function(html){
 $(".pic").slideUp('slow', function() {$(this).remove();});
      
 }
});
$(this).remove();
B.show();
}

return false;
});

$('#photoimg').live('change', function() 
 {

 
var A=$("#imageloadstatus");
var B=$("#imageloadbutton");
A.show();
B.hide();
$("#imageform").ajaxForm({target: '#preview', 
beforeSubmit:function(){
A.show();
B.hide();
}, 
success:function(){
A.hide();
B.hide();

}, 
error:function(){
A.hide();
B.show();
} }).submit();
});

}); 
</script>


</head>
<body>
<!--<form id="imageform" method="post" enctype="multipart/form-data" action="final_userdetail.php">

<fieldset>
  <legend>Login</legend>
  <label>
    Username
    <input type="text" name="username">
  </label>
  <label>
    Password
    <input type="text" name="password">
  </label>
  <label>
    upload pic
	<div id="imageloadstatus" style="display:none"><img src="loader.gif" alt="Uploading...."/></div>
<div id="imageloadbutton"><div id='preview'>
	</div>
    <input type="file" name="photoimg" id="photoimg" /></div>
  </label>
  
</fieldset>
</form>-->
<div id="box">

	<div id='preview'>
	</div>
	<form id="imageform" method="post" enctype="multipart/form-data" action="final_userdetail1.php">
select your new profile image 
<div id="imageloadstatus" style="display:none"><img src="loader.gif" alt="Uploading...."/></div>
<div id="imageloadbutton">
<input type="file" name="photoimg" id="photoimg" />
</div>
</form>



<form method="post" action="final_submition1.php">
<label>name:</label><input type="text" name="name1" value="<?php echo $user_fname; ?>" class="input"><br>
<label>branch:</label><input type="text" name="branch" value="<?php echo $user_branch; ?>" class="input"><br>
<label>semester:</label><input type="text" name="sem" value="<?php echo $user_semester; ?>" class="input"><br>
<label>hobbies:</label><input type="text" name="hobbies" value="<?php echo $user_hobbies; ?>" class="input"><br>
<label>distric:</label><input type="text" name="distric" value="<?php echo $user_distric; ?>" class="input"><br>
<label>state:</label><input type="text" name="state" value="<?php echo $user_state; ?>" class="input"><br>
<input type="submit" class="button button-primary">
</form>

<a href="change_password.php">change password</a>

</div>
</body>
</html>