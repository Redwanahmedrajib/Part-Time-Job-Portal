<?php

include 'connect.php';

$name =$email= $password="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $name = $_POST["name"];
	 $email = $_POST["email"];
	 $password = $_POST["password"];
	 $phone = $_POST["phone"];
	 $address = $_POST["address"];
	
	//email validation 
    $evalidationSql = "SELECT * FROM `employer` WHERE email = '$email'";
	$checkResult = $conn->query($evalidationSql);
	if($checkResult->num_rows > 0 ){
	 echo "Sorry, this email already exists.";
	 exit();
	}
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["logo"]["name"]);
	$fileName= basename($_FILES["logo"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	if ($_FILES["logo"]["size"] > 300000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		exit();
		$uploadOk = 0;
	}
	
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";

	} else {
		if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
	
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}

    $sql = "INSERT INTO employer (name,email,password,logo,phone,address)
	VALUES ('$name', '$email', '$password','$fileName', '$phone', '$address')";

	if ($conn->query($sql) === TRUE) {

    ?>
<html>
    <head>
<link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/Animate.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="background: url(img/bgbg.png);height: 100vh;">
        <div style="">  
        </div>
<button id="modalBtn" type="button" style="display:none" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h3 >Employer has been registered.. Login to continue using our services</h3>
     <br>
     <a href="index.php?msg=login">Login</a>
    </div>
    </div>
</div>
    
    <script>$('#modalBtn').trigger("click");</script>
    </body>
</html>

<?php
    $conn->close();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}else{
    header("location : index.php");
}
