
<!DOCTYPE html>
<html>
<head>
<?php
/*session_start();
$z=$_SESSION['y'];*/
include('config.php'); //$session id
?>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>Ajax Image Upload 9lessons blog</title>
   
<!--<script src="sliderengine/jquery.js"></script>
    <script src="sliderengine/amazingslider.js"></script>
    <script src="sliderengine/initslider-1.js"></script>-->



   
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.wallform.js"></script>
<script type="text/javascript">
$(document).ready(function() 
{
$(".pic_uploadplace").click(function() {


   alert("amit");
    var boxval = $("#photoimg").val();
	var B=$("#imageloadbutton");
	alert(boxval);
	$("#flash").show();
	$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
$.ajax({
		type: "POST",
  url: "uploadimg_onwall1.php",
  cache: false,
  success: function(html){
 
  $("#update").prepend(html);
  
  $(".pic").slideUp('slow', function() {$(this).remove();});
   document.getElementById('photoimg').value='';
  $("#flash").hide();
  $(".delete_pic").remove();
   $("#imageloadstatus").slideUp('slow', function() {$(this).remove();});
	
  }
 });

return false;
	});
$('.delete_pic').live("click",function() 
{
var ID = $(this).attr("id");
 var dataString = 'msg_id='+ ID;
if(confirm("Sure you want to delete this update? There is NO undo!"))
{

$.ajax({
type: "POST",
 url: "delete_pic1.php",
  data: dataString,
 cache: false,
 success: function(html){
 $("#pic"+ID).slideUp('slow', function() {$(this).remove();});
      
 }
});
$(this).remove();
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
B.show();
}, 
error:function(){
A.hide();
B.show();
} }).submit();
});

}); 
</script>

<!--<style type="text/css">

<!--body
{
font-family:arial;
}
.preview
{
width:200px;
border:solid 1px #dedede;
padding:10px;
}
#preview
{
color:#cc0000;
font-size:12px
}
#slider-wrapper {
display: block;
max-width: 790px;
margin: 5% auto;
max-height: 500px;
height: 100%; }

#slider {
display: block;
position: relative;
z-index: 99999;
max-width: 710px;
width: 100%;
margin: 0 auto; }

#button-previous { 
position: relative;
left: 0;
margin-top: 40%;
width: 40px;
height: 60px; }

#button-next {
position: relative;
margin-top: 40%;
float: right; }

.sp {
position: absolute; }

#slider .sp {
max-width: 710px;
width: 100%;
max-height: 500px; }

</style>-->
</head>
<body>


<div style="width:600px">

	<div id='preview'>
	</div>
	


<form id="imageform" method="post" enctype="multipart/form-data" action="ajaximage1.php">
Upload your image 
<div id='imageloadstatus' style='display:none'><img src="loader.gif" alt="Uploading...."/></div>
<div id='imageloadbutton'>
<input type="file" name="photoimg" id="photoimg" />
</div>
</form>
<button class='pic_uploadplace' >upload</button>


</div>
<div id="update"></div>
</body>
</html>