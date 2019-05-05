
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
<link href="css/Animate.css" rel="stylesheet" type="text/css">
<link href="css/animate.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
   <link href="cv/css/aos.css" rel="stylesheet">
   <link href="cv/styles/main.css" rel="stylesheet">
   
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
  include 'signinEmployerModals.php';
  ?>
<div class="page-content">
  <div class="section">
  	<div class="container">
	  	<form action="manage-insert.php" method="POST">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title" id="exampleModalLabel">Update Accomplishment Details</h5>
	          
	        </div>
	        <?php 
	        	include 'connect.php';
	            $said = $_GET['said'];
	            $saupdtSQL = "SELECT * FROM `seeker_accomplishments` where id = '$said';";
	                $saupdtresult = $conn->query($saupdtSQL);
	                foreach ($saupdtresult as $saupdtr) {
	                  $updt_title = $saupdtr['title'];
	                  $updt_institute = $saupdtr['institute'];
	                  $updt_concentration = $saupdtr['concentration'];
	                  $updt_result = $saupdtr['result'];
	                  $updt_passing_year = $saupdtr['passing_year'];
	       	?>
	        <div class="modal-body">
	           <div class="form-group">
	              <label >Academic Qualification</label>
	              <select class="form-control" name="title" required="">
	                <option selected value="<?php echo $updt_title; ?>"> <?php echo $updt_title; ?> </option>
	                <option value="Secondary School certificate (SSC)">Secondary School certificate (SSC)</option>
	                <option value="Higher Secondary School certificate (HSC)">Higher Secondary School certificate (HSC)</option>
	                <option value="Bachelor or Equivalence">Bachelor or Equivalence</option>
	                <option value="Master or Equivalence">Master or Equivalence</option>
	              </select>
	          </div>
	          <div class="form-group">
	              <label >Instutute</label>
	              <input type="test" class="form-control" name="institute" value="<?php echo $updt_institute; ?>">
	          </div>
	           <div class="form-group">
	              <label >Concentration</label>
	              <input type="test" class="form-control" name="concentration" value="<?php echo $updt_concentration; ?>">
	          </div>
	          <div class="form-group">
	              <label >Result</label>
	              <input type="test" class="form-control" name="result" value="<?php echo $updt_result; ?>">
	          </div>
	          <div class="form-group">
	              <label >Passing Year</label>
	              <input type="test" class="form-control" name="passing_year" value="<?php echo $updt_passing_year; ?>">
	          </div>
	        </div>
	        <?php } ?>
	        <div class="modal-footer">
	          <input type="hidden" name="sid" value="<?php echo $said; ?>">
			  
	          <input type="submit" class="btn btn-primary" name="updateaccomplishment" value="Update">
	        </div>
	      </div>
	    </form> 
	</div> 
  </div>
</div>  
<?php include 'footer.php';?> 

<script src="js/tilt.jquery.min.js"></script>
<script src="js/signinModal.js"></script>

<script src="cv/js/core/jquery.3.2.1.min.js"></script>
    <script src="cv/js/core/popper.min.js"></script>
    <script src="cv/js/core/bootstrap.min.js"></script>
    <script src="cv/js/now-ui-kit.js?v=1.1.0"></script>
    <script src="cv/js/aos.js"></script>
    <script src="cv/scripts/main.js"></script>

</body>
</html>
