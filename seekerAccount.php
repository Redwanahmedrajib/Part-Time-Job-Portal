
<html>
<head>
  
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="icon" href="images/homepage/favicon.ico" type="image/x-icon">
<title> Part Timae Job Portal </title>
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
    $sid = $_SESSION["sid"];
    $sqlE = "select * from seeker where id = '$sid' ;";
         
      $resultE = $conn->query($sqlE);
      if ($resultE->num_rows > 0) {
           if($rowE = $resultE->fetch_assoc()) { 
              $name=  $rowE["name"];
              $email =  $rowE["email"];
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
    <button type="button" class="btn btn-info " data-toggle="modal" data-target="#uploadImage" style="margin-left: 13%;"> Update Profile Image</button>

    <div class="section" id="about">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <div class="h4 mt-0 title">About</div>
            <p>Hello! I am <?php echo $name; ?>.</p>
            <p>Exprienced on <?php echo $skills; ?>.</p>
          </div>       
        </div>
      </div>
    </div>

    <div class="section" id="about">
      <div class="container">
          <button type="button" class="btn btn-info " data-toggle="modal" data-target="#updateInfo"> Update Info</button>
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
                  <div class="col-sm-6"><strong class="text-uppercase">Skills:</strong></div>
                  <div class="col-sm-6"><?php echo $skills; ?></div>
                  
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#accomplishmentsadd"> Add</button>
        <?php 
          $acpSQL = "SELECT * FROM `seeker_accomplishments` where sid = '$sid';";
          $acpresult = $conn->query($acpSQL);
          foreach ($acpresult as $acpr) { ?>
        <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
          <div class="row">
            <div class="col-lg-8 col-md-10">
              <div class="card-body">
                <div class="h4 mt-0 title"><?php echo $acpr['title']; ?></div>
                  <p>Instuate: <?php echo $acpr['institute']; ?> </p>
                  <p> Concentration: <?php echo $acpr['concentration']; ?> </p>
                  <p> Result: <?php echo $acpr['result']; ?> </p>
                  <p> Passing year: <?php echo $acpr['passing_year']; ?> </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-2" style="text-align: right;">
              <a href="seekerUpdate.php?said=<?php echo $acpr['id']; ?>" class="btn btn-info">Update</a>
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

<div class="modal fade" id="accomplishmentsadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="manage-insert.php" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Accomplishment Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <div class="form-group">
              <label >Academic Qualification</label>
              <select class="form-control" name="title" required="">
                <option selected> <- Select -> </option>
                <option value="Secondary School certificate (SSC)">Secondary School certificate (SSC)</option>
                <option value="Higher Secondary School certificate (HSC)">Higher Secondary School certificate (HSC)</option>
                <option value="Bachelor or Equivalence">Bachelor or Equivalence</option>
                <option value="Master or Equivalence">Master or Equivalence</option>
              </select>
          </div>
          <div class="form-group">
              <label >Instutute</label>
              <input type="test" class="form-control" name="institute" placeholder="Instutute Name" required="">
          </div>
           <div class="form-group">
              <label >Concentration</label>
              <input type="test" class="form-control" name="concentration" placeholder="Science / Software Engineering / ..." required="">
          </div>
          <div class="form-group">
              <label >Result</label>
              <input type="test" class="form-control" name="result" placeholder="GPA 4.40 out of 5.00" required="">
          </div>
          <div class="form-group">
              <label >Passing Year</label>
              <input type="test" class="form-control" name="passing_year" placeholder="2019" required="">
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="eid" value="<?php echo $sid = $_SESSION["sid"]; ?>">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="addaccomplishment" value="Submit">
        </div>
      </div>
    </form>  
  </div>
</div>
 
<div class="modal fade" id="updateInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="manage-insert.php" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Your Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <div class="form-group">
              <label >Your Name</label>
              <input type="test" class="form-control" name="update_name" value="<?php echo $name; ?>">
          </div>
          <div class="form-group">
              <label >Email</label>
              <input type="email" class="form-control" name="update_email" value="<?php echo $email; ?>">
          </div>
          <div class="form-group">
              <label >Father Name</label>
              <input type="test" class="form-control" name="update_fathername" value="<?php echo $father_name; ?>">
          </div>
          <div class="form-group">
              <label >Mother Name</label>
              <input type="text" class="form-control" name="update_mothername" value="<?php echo $mother_name; ?>">
          </div>
          <div class="form-group">
              <label >Date Of Birth</label>
              <input type="date" class="form-control" name="update_dob" value="<?php echo $dateofbirth; ?>">
          </div>
          <div class="form-group">
              <label >Address</label>
              <input type="text" class="form-control" name="update_address" value="<?php echo $address; ?>">
          </div>
          <div class="form-group">
              <label >Phone</label>
              <input type="test" class="form-control" name="update_phone" value="<?php echo $phone; ?>">
          </div>
          <div class="form-group">
              <label >NID</label>
              <input type="text" class="form-control" name="update_nid" value="<?php echo $nid; ?>">
          </div>
          
          <div class="form-group">
              <label >Skills</label>
              <input type="text" class="form-control" name="update_skills" value="<?php echo $skills; ?>">
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="sid" value="<?php echo $sid = $_SESSION["sid"]; ?>">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="updateinfo" value="Update">
        </div>
      </div>
    </form>  
  </div>
</div>

<div class="modal fade" id="uploadImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="change-image.php" method="POST" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Profile Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label >Chose Image</label>
              <input type="file"  name="image">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="uploadImage" value="Update">
        </div>
      </div>
    </form>  
  </div>
</div>
</body>
</html>
