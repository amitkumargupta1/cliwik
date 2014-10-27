<html>
<head>
<?php
session_start();
if(empty($_SESSION['y']))
{
header('Location: index.php');
}
$z=$_SESSION['y'];
include('config.php'); //$session id
?>

<title>Ajax Image Upload 9lessons blog</title>
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
 url: "finaldelete.php",
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
<div style="width:600px">

	<div id='preview'>
	</div>
	


<form id="imageform" method="post" enctype="multipart/form-data" action="final_userdetail.php">
Upload your image 
<div id="imageloadstatus" style="display:none"><img src="loader.gif" alt="Uploading...."/></div>
<div id="imageloadbutton">
<input type="file" name="photoimg" id="photoimg" />
</div>
</form>
<form method="post" action="final_submition.php">
branch:<input type="text" name="branch" placeholder="enter your branch"><br>
semester:<input type="text" name="sem" placeholder="enter your semester"><br>
hobbies:<input type="text" name="hobbies" placeholder="enter your hobbies"><br>
distric:<input type="text" name="distric" placeholder="enter your distric"><br>
state:<input type="text" name="state" placeholder="enter your state"><br>
<input type="submit" >
</form>

</div>
</body>
</html>