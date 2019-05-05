<?php
include 'connect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $name = $_POST["name"];
     $email = $_POST["email"];
     $password = $_POST["password"];
     $dob = $_POST["dob"];
     $skills = $_POST["skills"];
     
	 $evalidationSql = "SELECT * FROM `seeker` WHERE email = '$email'";
	$checkResult = $conn->query($evalidationSql);
	if($checkResult->num_rows > 0 ){
	 echo "Sorry, this email already exists.";
	 exit();
	}
     
     $target_dir = "uploadedResume/";
$target_file = $target_dir . basename($_FILES["resume"]["name"]);
$fileName= basename($_FILES["resume"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["resume"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($fileType != "txt" && $fileType != "doc" && $fileType != "docx" && $fileType != "pdf" ) {
    echo "Sorry, only txt, doc, docx & pdf files are allowed.";
	exit();
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

    $sql = "INSERT INTO seeker (name,email,password,dob,skills,resume)
VALUES ('$name', '$email', '$password','$dob', '$skills','$fileName')";

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
      <h3 >Thanks for Registering with us.. Login to continue using our services</h3>
     <br>
     <a href="index.php?msg=login">Login</a>
    </div>
    </div>
</div> 
    <script> $('#modalBtn').trigger("click"); </script>
    </body>
</html>

<?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}else{
      header("location : index.php");
}

