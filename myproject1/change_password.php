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

?>

<title>Ajax Image Upload 9lessons blog</title>
<link rel="stylesheet" href="css2/style.css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.wallform.js"></script>
<script type="text/javascript">
$(document).ready(function() 
{
$('#create').click(function()
			{
			var username=$("#emailcheck").html();
			var pcheck=$("#passwordcheck").html();
			var oldpassword=$("#emailid").val();
				var password1=$("#password1").val();
					var oldpassword2=$("#password2").val();
			if(username=="" && pcheck=="password match"  && oldpassword!="" && password1!="" && password2!="")
			{
			alert("amit");
	$("#myForm").submit();
}
else
{
 alert("enter the form corrctly");
 }
			return false;
			});
$("#emailid").change(function(){
  var ID = $("#emailid").val();
 var dataString = 'email_id='+ ID;
  $("#emailcheck").html("checking");
 	$.ajax({
            type: "POST",
            url: "password_check.php",
            data: dataString,
            cache: false,
            success: function(data)
            {
			 
			if(data!='')
			{
             $("#emailcheck").html(data);
			 
			 }
			 else
			 {
			   $("#emailcheck").html("");
			 
				}
           }
});
return false;
  });
    $("#password2").keyup(function(){
    var pass1=$("#password1").val();
    var pass2=$("#password2").val();
      if(pass1==pass2)
           {
                $("#passwordcheck").html("password match");
            
           }
        else
           {
               $("#passwordcheck").html("<font color='red'>password doesnt match</font>");
           }
		   return false;
  });
   $("#emailid").keyup(function(){
  $("#emailcheck").html("checking");
  });
  });
</script>


</head>
<body>
<div id="box">
<form method="post" action="final_submition3.php" id="myForm">
<label>entere old password</label><input type="password" name="t4"  id="emailid" placeholder="Enter old password" class="input" /><br>
<div id="emailcheck"></div><br><div id="appear">
<label>enter new password</label><input type="password" name="t5"  id="password1" placeholder="Enter new password" class="input" /><br><br>
<label>renter password</label><input type="password" name="t7"  id="password2" placeholder="renter password" class="input" /><br><div id="passwordcheck">
</div></div>
<input type="submit" id="create" class="button button-primary" >
</form>
</body>
<a href="user_detail1.php">go back</a>
</div>
</html>