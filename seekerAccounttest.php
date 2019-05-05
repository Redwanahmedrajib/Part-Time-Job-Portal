
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
  <?php
    include 'connect.php';
     $sid = $_GET["sid"];
    $sqlE = "select * from seeker where id = '$sid' ;";
         
      $resultE = $conn->query($sqlE);
      if ($resultE->num_rows > 0) {
           if($rowE = $resultE->fetch_assoc()) { 
              $name=  $rowE["name"];
              $email =  $rowE["email"];
              $qlf =  $rowE["qualification"];
              $skills =  $rowE["skills"]; 
              $father_name=  $rowE["father_name"];
              $mother_name =  $rowE["mother_name"];
              $dateofbirth =  $rowE["dob"];
              $phone =  $rowE["phone"]; 
              $nid=  $rowE["nid"];
              $address =  $rowE["address"];
              $profile_image = $rowE['profile_image'];    
            }
      }    
    ?>
<div class="page-content">
  <div>
    <div class="profile-page">
      <div class="wrapper">
        <div class="page-header page-header-small" filter-color="green">
          <div class="page-header-image" data-parallax="true" style="background-image: url('uploads/<?php echo $profile_image; ?>');">
          </div>
          <div class="container">
            <div class="content-center">
              <div class="cc-profile-image"><a href="#"><img src="uploads/<?php echo $profile_image; ?>" alt="Image"/></a></div>     
              <div class="rating" style="color: #f91818;">
                  <?php 
                    $total_rating = 0;
                    $t_r_g_person = 0;
                    $ratingSQL = "SELECT * FROM `seeker_ratings` WHERE sid = '$sid';";
                    $ratingsresult = $conn->query($ratingSQL);
                    foreach ($ratingsresult as $rr ) {
                      $total_rating = $total_rating + $rr['rating'];
                      $t_r_g_person ++;
                    }
                    $average_rating = $total_rating / $t_r_g_person;
                    for ($i=1; $i <= $average_rating ; $i++) { 
                  ?>
                  <i class="fa fa-star"></i> 
                  <?php } ?>
              </div>  
            </div>
          </div>      
        </div>
      </div>
    </div>
     
    <div class="section" id="about">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <div class="h4 mt-0 title">About</div>
            <p>Hello! I am <?php echo $name; ?>.</p>
			      <p><?php echo $skills; ?>.</p>
          </div>       
        </div>
      </div>
    </div>

    <div class="section" id="about">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <div class="h4 mt-0 title">Basic Informations</div>
              <div class="row">
                <div class="col-sm-5">
                  <div class="col-sm-6"><strong class="text-uppercase">Name:</strong></div>
                  <div class="col-sm-6"><?php echo $name; ?></div>
                  <div class="col-sm-6"><strong class="text-uppercase">Father's Name:</strong></div>
                  <div class="col-sm-6"><?php echo $father_name; ?></div>
                   <div class="col-sm-6"><strong class="text-uppercase">Mother's Name:</strong></div>
                  <div class="col-sm-6"><?php echo $mother_name; ?></div>
                  <div class="col-sm-6"><strong class="text-uppercase">Date of Birth:</strong></div>
                  <div class="col-sm-6"><?php echo $dateofbirth; ?></div>
                  <div class="col-sm-6"><strong class="text-uppercase">Address:</strong></div>
                  <div class="col-sm-6"><?php echo $address; ?></div>
                </div>
                <div class="col-sm-1" style="border-left: 3px solid green; height: 100px;"></div>
                <div class="col-sm-5">
                  <div class="col-sm-6"><strong class="text-uppercase">Email:</strong></div>
                  <div class="col-sm-6"><?php echo $email; ?></div>
                  <div class="col-sm-6"><strong class="text-uppercase">Phone:</strong></div>
                  <div class="col-sm-6"><?php echo $phone; ?></div>
                  <div class="col-sm-6"><strong class="text-uppercase">NID:</strong></div>
                  <div class="col-sm-6"><?php echo $nid; ?></div>
                </div> 
              </div>
          </div>       
        </div>
      </div>
    </div>

    <div class="section" id="experience">
      <div class="container cc-experience">
        <div class="h4 text-center mb-4 title">Job History</div>
        <?php 
          $jhSQL = "SELECT * FROM `jobsapplied` where sid = '$sid' AND status = 'Accepted';";
          $jhresult = $conn->query($jhSQL);
          foreach ($jhresult as $jhr) {
            $postId = $jhr['pid'];
        ?>
        <div class="card">
          <div class="row">
            <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
              <?php 
                $pSQL = "SELECT * FROM `post` where id = '$postId';";
                $presult = $conn->query($pSQL);
                foreach ($presult as $pr) {
                  $postName = $pr['name'];
                  $role = $pr['role'];
                  $duration = $pr['duration'];
				  $employmentType = $pr['employmentType'];
                  $employerId = $pr['eid'];
                }
              ?>
              <div class="card-body cc-experience-header">
                <p style="color: #fff;">Applied Date: <?php echo $jhr['date']; ?></p>
                <?php 
                $empSQL = "SELECT distinct * FROM `employer` where id = '$employerId';";
                $empresult = $conn->query($empSQL);
                foreach ($empresult as $empr) { ?>
                <div class="h5"><?php echo $empr['name']; ?></div>
                <?php } ?>
              </div>
            </div>
            <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
              <div class="card-body">
                <div class="h5"><strong><?php echo $postName; ?></strong></div>
                <div class="row">
                  <div class="col-sm-4"><span class="text-uppercase">Role:</span></div>
                  <div class="col-sm-8"><?php echo $role; ?></div>       
                </div>
                <div class="row">
                  <div class="col-sm-4"><span class="text-uppercase">Job Duration:</span></div>
                  <div class="col-sm-8"><?php echo $duration; ?></div>        
                </div>
				<div class="row">
                  <div class="col-sm-4"><span class="text-uppercase">Employment Type:</span></div>
                  <div class="col-sm-8"><?php echo $employmentType; ?></div>        
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>

    <div class="section" id="education">
      <div class="container">
        <div class="h4 text-center mb-4 title">Accomplishments</div>
        <?php 
          $acpSQL = "SELECT * FROM `seeker_accomplishments` where sid = '$sid';";
          $acpresult = $conn->query($acpSQL);
          foreach ($acpresult as $acpr) { ?>
        <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
          <div class="row">
    	      <div class="col-lg-6 col-md-12">
              <div class="card-body">
                <div class="h4 mt-0 title"><?php echo $acpr['title']; ?></div>
                  <p>Instuate: <?php echo $acpr['institute']; ?> </p>
    				      <p> Concentration: <?php echo $acpr['concentration']; ?> </p>
    				      <p> Result: <?php echo $acpr['result']; ?> </p>
                  <p> Passing year: <?php echo $acpr['passing_year']; ?> </p>
              </div>
            </div>
    	    </div>
        </div>
        <?php  } ?>
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
