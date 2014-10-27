<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{

$("#contentbox").live("keyup",function() 
{
var content=$(this).text(); 
var dataString = 'searchword='+ content;
//If @ available
//if @abc avalable
if(content.length>0)
{
$.ajax({
type: "POST",
url: "box_search.php", // Database name search 
data: dataString,
cache: false,
success: function(data)
{
$("#msgbox").hide();
$("#display").html(data).show();
}
});
}
}
return false();
});

//Adding result name to content box.
$(".addname").live("click",function() 
{
var username=$(this).attr('title');
var old=$("#contentbox").html();
var content=old.replace(word," "); //replacing @abc to (" ") space
$("#contentbox").html(content);
var E="<a class='red' contenteditable='false' href='#' >"+username+"</a>";
$("#contentbox").append(E);
$("#display").hide();
$("#msgbox").hide();
});
});
</script>
</head>
<body>
<div id="container">
<div >
<form> 
First name: <input type="text" id="contentbox" >
</form>
</div>
<div id='display'>
</div>
<div id="msgbox">
</div>
</div>
</body>
</html>