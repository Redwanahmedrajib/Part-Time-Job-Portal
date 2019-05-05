<!-- employerRatingtoemployee.php -->

<?php include 'authorizeEmployer.php';?>
<html>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="icon" href="images/homepage/favicon.ico" type="image/x-icon">
<title> Part Time Job Portal </title>
<link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/Animate.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<link href="css/Animate.css" rel="stylesheet" type="text/css">
<link href="css/animate.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">
<style>
    .tiltContain{margin-top:0%;} 
    .btnTilt{height: 75px;background:rgba(225,225,225,0.2) ;  color:white; font-family: Comfortaa;}

    .textDarkShadow{
    text-shadow: 0px 0px 3px #000,3px 3px 5px #003333; 
}
    /*    #btn1,#btn2,#btn3,#btn4,#btn5,#btn6{display:none;}*/
</style>

<body onload="logoBeat()" style="font-family: 'Kodchasan', sans-serif;">
<?php
include 'navBar.php';
?>

<div class="container-fluid" style="background:url('img/Wonderful-Blur-Wallpaper.jpg');">
	<div class="hero" >	
		<div style="width: 100%; " class="row" >
			<div class="col-md-4"></div>
			<div class="col-md-4"  style=" height: 50vh; margin-top:5% "> 
				<form action="" method="POST">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Give Rating to Employee</label>
				    <input type="number" name="rating" min="1"  max="5" class="form-control" aria-describedby="emailHelp" placeholder="Enter rating 1 to 5" required="">
					 <label for="exampleInputEmail1">Give Review to Employee</label>
					<input type="text" name="review"  class="form-control" aria-describedby="emailHelp" placeholder="Enter review " required="">
				    <small id="emailHelp" class="form-text text-muted">Give Rating based on overall employee behavior, work experience....  </small>
				  </div>
				  <div class="form-check">
				    <input type="checkbox" class="form-check-input" id="exampleCheck1" required="I am agree">
				    <label class="form-check-label" for="exampleCheck1">I am agree.</label>
				  </div>
				  <input type="submit" name="submit"  class="btn btn-primary" value="Submit">
				</form>      
			</div>           
		</div>  
	</div>
</div>

<script src="js/tilt.jquery.min.js"></script>
<script src="js/signinModal.js"></script>

  	<?php include 'footer.php';?>

</body>
</html>
<?php
if (isset($_POST['submit'])) {
	$sid = $_GET['id'];
	$eid = $_SESSION['eid'];
	$rating = $_POST['rating'];
	$review = $_POST['review'];
	$pid = $_GET['pid'];

	$sql = "INSERT INTO `seeker_ratings`(`eid`, `sid`,`pid`, `rating`, `review` ) VALUES ('$eid','$sid','$pid','$rating', '$review');";
	include 'connect.php';
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Rating Given.")</script>';
        echo '<script>window.location="ViewApplicants.php"</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
