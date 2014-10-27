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
$path = "uploads/";

function getExtension($str) 
{

         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

	$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					 $ext = getExtension($name);
					if(in_array($ext,$valid_formats))
					{
					
						
							$actual_image_name = time().substr(str_replace(" ", "_", $ext), 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
								
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
								$query1=mysql_query("select * from login1 where username='$z'");
$fetch1=mysql_fetch_array($query1);
$email=$fetch1['username'];
$emailpic=$fetch1['picname'];
$name=$fetch1['name'];
$date=date("y-m-d");
$time=date("h:i:s");
mysql_query("insert into mydata1 value('$email','$actual_image_name','$date','$time','$emailpic','','','','$name')");
$query2=mysql_query("select * from mydata1 where date='$date' && time='$time' && email='$email'");
$fetch2=mysql_fetch_array($query2);
$msg_id=$fetch2['id'];
									echo "<img   src='uploads/".$actual_image_name."' height='100' width='100' class='pic'>";
	
									echo "<button id='$msg_id' class='delete_pic'>delete</button>";
								}
							else
								echo "Fail upload folder with read access.";
						
											
						}
						else
						echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}
?>