
<html>
<head>
  
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="icon" href="images/homepage/favicon.ico" type="image/x-icon">
<title>  Part Time Job Portal </title>
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
   <div class="section" id="about">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <div class="h4 mt-0 title">Post Details</div>
            	<?php 
        		include 'connect.php';
        		$post_id = $_GET["post_id"];
				$pSQL = "SELECT * FROM `post` where id = '$post_id' ;";
				$presult = $conn->query($pSQL);
				foreach ($presult as $pr) {
					$eid = $pr['eid'];
            	?>
              	<div class="row" style="padding-bottom: 3%;">
					<?php 
						$eSQL = "SELECT * FROM `employer` where id = '$eid';";
						$eresult = $conn->query($eSQL);
						foreach ($eresult as $er) {
					?>
	                <div class="col-md-4" style="border-right: 1px solid gray;">
	                	<div class="col-sm-12" style="text-align: center;">
	                		<img src="uploads/<?php echo $er['logo']; ?>" class="image-circle"/>
	                	</div>
                    <div class="rating" style="color: #f91818;text-align: center;">
                      <?php 
                      $etotal_rating = 0;
                      $et_r_g_person = 0;
                      $eratingSQL = "SELECT * FROM `employer_rating` WHERE eid = '$eid';";
                      $eratingsresult = $conn->query($eratingSQL);
                      foreach ($eratingsresult as $err ) {
                        $etotal_rating = $etotal_rating + $err['rating'];
                        $et_r_g_person ++;
                      }
                      $eaverage_rating = $etotal_rating / $et_r_g_person;
                      for ($i=1; $i <= $eaverage_rating ; $i++) { 
                    ?>
                    <i class="fa fa-star"></i> 
                    <?php } ?>
					<p>Rating Out of 5 </p>
                  </div>
	                	<div class="col-sm-12 text-center"><strong class="text-uppercase"><?php echo $er['name']; ?></strong></div>
	                  	<div class="col-sm-12 text-center"><?php echo $er['phone']; ?></div>
	                  	<div class="col-sm-12 text-center"><?php echo $er['email']; ?></div>
	                  	<div class="col-sm-12 text-center"><?php echo $er['address']; ?></div>
	                </div>
					<?php } ?>
	                <div class="col-md-8">
	                	<div class="col-sm-12 text-left"><strong class="text-uppercase" style="color: blue;"> Need <?php echo $pr['name']; ?> for our company.</strong></div>
	                	<div class="col-sm-12" ><p><?php echo $pr['date']; ?></p> </div><br><br>
	                	<div class="col-sm-1" ></div><div class="col-sm-10" >
	                		<p>Category: <?php echo $pr['category']; ?></p>
	                	
	                		<p>Role: <?php echo $pr['role']; ?></p>
                      <p>Expected Job Duration: <?php echo $pr['duration']; ?></p>
	                		<p>Min Exprience: <?php echo $pr['minexp']; ?> Years</p>
	                	</div><br>
	                	<div class="col-sm-1" ></div><div class="col-sm-11" ><?php echo $pr['desc']; ?></div>
	                	<div class="col-sm-10" >
	                		<p>Emplayment Type: <?php echo $pr['employmentType']; ?></p>
	                		<p>Salary: <?php echo $pr['salary']; ?></p>
	                	</div>
                    <?php 
                      if (isset($_SESSION['log_person']) == "Seeker") { ?>
                        <a href="applyJob.php?id=<?php echo $post_id = $_GET["post_id"];?>" class="btn btn-success" ><h3>Apply</h3></a>
                    <?php  }
                    ?>
                   
	                </div>
              	</div>
              	<?php } ?>
          </div>       
        </div>
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
