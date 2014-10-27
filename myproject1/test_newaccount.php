<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$( "#select_college" ).change(function() {
var college = $("#select_college").val();
if(college!='not found')
document.getElementById('add_college').value='';
});
$( "#add_college" ).focus(function() {
document.getElementById('select_college').value='not found';
});
$('#create').click(function()
			{
			var username=$("#emailcheck").html();
			var pcheck=$("#passwordcheck").html();
			var ID = $("#emailid").val();
			var password = $("#password1").val();
			var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();
			var college = $("#select_college").val();
			var college1 = $("#add_college").val();
            var dataString = 'email_id='+ ID +'&password='+ password +'&firstname='+ firstname +'&lastname='+ lastname +'&select_college='+ college +'&add_college='+ college1;
			if(username=="" && pcheck=="password match" && ID!="" && password!="" && firstname!="" && lastname!="" && college!="not found" || college1!="")
			{
				$.ajax({
            type: "POST",
            url: "finalemailsumbit2.php",
            data: dataString,
            cache: false,
            success: function(data)
            {
			  $("#myForm").submit();
           }
});
}
else
alert("enter the data correctly");
			return false;
			});
  $("#emailid").change(function(){
  var ID = $("#emailid").val();
 var dataString = 'email_id='+ ID;
 	$.ajax({
            type: "POST",
            url: "emailidcheck.php",
            data: dataString,
            cache: false,
            success: function(data)
            {
			  $("#emailcheck").html("checking");
			if(data!='')
             $("#emailcheck").html(data);
			 else
			   $("#emailcheck").html("");
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
  });
  $("#emailid").keyup(function(){
  $("#emailcheck").html("checking");
  });
});
</script>
</head>
<body>

<form id="myForm"  method="POST" action="user_detail.php">
<table color="grey" height="550" width="1350" class="table" bgcolor="#F0F0F0">
<tr align="right"><td><font size="7">Create new account</font><br><br><input type="text" name="t3" size="30"
id="firstname" placeholder="first name" required>
<input type="text" name="t6" size="30" id="lastname" placeholder="last name" required>
<br><br><input type="email" name="t4" size="47" id="emailid" placeholder="Enter your valid email id" required multiple><br><div id="emailcheck"></div><br>
<input type="password" name="t5" size="47" id="password1" placeholder="Enter password" required><br><br>
<input type="password" name="t7" size="47" id="password2" placeholder="renter password" required><br><div id="passwordcheck"></div><br>
<input type="submit" value="submit" id="create">
<input type="reset" value="reset">
 </td></tr>
</table></form>
<select id="select_college">
 <option value="not found">not found</option>
<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysql_select_db("newcollege");
$sql = mysql_query("select * from college order by college");
while($m=mysql_fetch_array($sql))
{
$college=$m['college'];
?>

  <option value="<?php echo $college ?>"><?php echo $college ?></option>
<?php 
}

 ?>
 </select>or add your college<input type="text" name="college" id="add_college">
<?php 

?>
</body>
</html>