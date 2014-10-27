<?php
session_start();
if(!empty($_SESSION['y']))
{
header('Location: multisubmit1.php');
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Ajax Login Page with Shake Effect</title>
<link rel="stylesheet" href="css2/style.css"/>
<script src="js2/jquery.min.js"></script>
<script src="js2/jquery.ui.shake.js"></script>
	<script>
			$(document).ready(function() {
			
			$('#login').click(function()
			{
			var username=$("#username").val();
			var password=$("#password").val();
		    var dataString = 'username='+username+'&password='+password;
			if($.trim(username).length>0 && $.trim(password).length>0)
			{
			
 
			$.ajax({
            type: "POST",
            url: "ajaxLogin1.php",
            data: dataString,
            cache: false,
            beforeSend: function(){ $("#login").val('Connecting...');},
            success: function(data){
			
            if(data)
            {
             $("#formid").submit();
            }
            else
            {
             $('#box').shake();
			 $("#login").val('Login')
			 $("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
            }
            }
            });
			
			}
			return false;
			});
			
				
			});
		</script>
</head>

<body>
<div id="main">
<h1>cliWik</h1>

<div id="box">
<form action="multisubmit1.php" method="post" id="formid">
<label>Username</label> 
<input type="text" name="username" class="input" autocomplete="on" id="username"/>
<label>Password </label>
<input type="password" name="password" class="input" autocomplete="off" id="password"/><br/>
<input type="submit" class="button button-primary" value="Log In" id="login"/> 
<span class='msg'></span> 

<div id="error">

</div>	
<a href="test_newaccount.php" align="left">create new account</a>
</div>

</form>	

</div>

</div>
</body>
</html>