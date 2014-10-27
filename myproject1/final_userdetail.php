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
$path = "login/";

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
								
								mysql_query("update login1 set picname='$actual_image_name' where username='$z'");
								mysql_query("update user_data set img='$actual_image_name' where email='$z'");
								mysql_query("update comment_live set emailpic='$actual_image_name' where email='$z'");

									echo "<img   src='login/".$actual_image_name."' height='100' width='100' class='pic'>";
	
									echo "<button class='delete_pic'>delete</button>";
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