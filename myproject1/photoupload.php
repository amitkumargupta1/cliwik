<html>
<head>
<?php
/*session_start();
$z=$_SESSION['y'];*/
include('config.php'); //$session id
?>

<title>Ajax Image Upload 9lessons blog</title>
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.wallform.js"></script>
<script type="text/javascript">
$(document).ready(function() 
{

$(".pic_uploadplace").hide();
$(".pic_uploadplace").click(function() {

    var boxval = $("#content_photo").val();
 var deletepic = $(".delete_pic").attr("id");
 var dataString = 'deletepic_id='+ deletepic+'&text_string='+boxval;
    var boxval = $("#photoimg").val();
	var B=$("#imageloadbutton");
	$("#flash").show();
	$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
$.ajax({
		type: "POST",
  url: "uploadimg_onwall.php",
    data: dataString,
  cache: false,
  success: function(html){
 
  $("#update").prepend(html);
  $("#update").slideDown("slow");
   $(".pic").slideUp('slow', function() {$(this).remove();});
   document.getElementById('photoimg').value='';
  $("#flash").hide();
  $(".delete_pic").remove();
  $(".pic_uploadplace").hide();
  B.show();
  
	
  }
 });

return false;
	});

$('.delete_pic').live("click",function() 
{
 
var B=$("#imageloadbutton");
var ID = $(this).attr("id");
 var dataString = 'msg_id='+ ID;
if(confirm("Sure you want to delete this update? There is NO undo!"))
{
$(".pic_uploadplace").hide();
$.ajax({
type: "POST",
 url: "delete_pic.php",
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
 $(".pic_uploadplace").show();
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


<div  class="photo_hide" align="center" >
<table cellpadding="10px" cellspacing="0" width="500px" border="1px">
<tr><td>
Upload your image 
	<div id='preview'>
	</div>
	

<form id="imageform" method="post" enctype="multipart/form-data" action="ajaximage.php">

<div id="imageloadstatus" style="display:none"><img src="loader.gif" alt="Uploading...."/></div>
<div id="imageloadbutton">
<input type="file" name="photoimg" id="photoimg" />
</div>
<textarea cols="30" rows="2" style="width:480px;font-size:14px; font-weight:bold" name="content" id="content_photo" maxlength="145" placeholder="write about the pic" ></textarea>

</form>
<button class="pic_uploadplace" >post</button>
</td></tr>
</table>
</div>
</body>
</html>