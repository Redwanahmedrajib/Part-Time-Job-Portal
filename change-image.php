
<?php 
session_start();
if (isset($_POST['uploadImage'])) {
	include 'connect.php';

		$sid = $_SESSION["sid"];

		if (isset($_FILES['image'])) {
			// files handle
		    $targetDirectory = "uploads/"; 
		    // get the file name
		    $file_name = $_FILES['image']['name'];
		    // get the mime type
		    $file_mime_type = $_FILES['image']['type'];
		    // get the file size
		    $file_size = $_FILES['image']['size'];
		    // get the file in temporary
		    $file_tmp = $_FILES['image']['tmp_name'];
		    // get the file extension, pathinfo($variable_name,FLAG)
		    $extension = pathinfo($file_name,PATHINFO_EXTENSION);
		    if ($extension =="jpg" || $extension =="png" || $extension =="jpeg" || $extension =="tif"){
		    		
			    	move_uploaded_file($file_tmp,$targetDirectory.$file_name);

			    	$iquery="UPDATE seeker SET `profile_image`= '$file_name' WHERE id = '$sid';";
		        	if ($conn->query($iquery) === TRUE) {
		        		echo '<script>alert("Profile image changed.")</script>';
		        		echo '<script>window.location="seekerAccount.php"</script>';
		        	}else {
		                echo "Error: " . $iquery . "<br>" . $conn->error;
		            }
		    }else{
		    	echo '<script>alert("Required JPG,PNG,GIF,TIF in image field.")</script>';
        		echo '<script>window.location="seekerAccount.php"</script>';
		    }
		}
	}
?>