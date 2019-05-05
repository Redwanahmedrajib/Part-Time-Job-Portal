<!doctype html>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="icon" href="images/homepage/favicon.ico" type="image/x-icon">
<title> Part Time Job Portal </title>
<link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/Animate.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/Animate.css" rel="stylesheet" type="text/css">
<link href="css/animate.min.css" rel="stylesheet" type="text/css">
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
include 'signinEmployerModals.php';
?>
    
<div class="container-fluid" style=" background-image: url('img/mainBackg.jpg'); background-position: center; background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
	
    <div class="hero" style=" color:whitesmoke;" >
	   <h1 style="padding:50px; font-size: 100px;"><strong>Part Time Job PORTAL</strong></h1>
		<div style="width: 100%" class="row" >
		
			<div class="col-md-9"  >
        <div style=" margin-top: 30px;">
          <h1>Find jobs</h1>
            <form class="example" action="index.php">
              <input style="color:#000" type="text" placeholder="Search.." name="q">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
                            
        <div class="container row">
          <?php  
		  $name=$category=$minexp=$salary=$desc=$role=$eType=$status=$msg="";
          include 'connect.php';
          $sql = "select *,(select name from employer where id=post.eid)as ename from post where status = 'open' order by date DESC";  
            if(isset($_GET['q'])){
              $sql = "select *,(select name from employer where id=post.eid)as ename from post where name LIKE '%".$_GET['q']."%' and status = 'open' order by date DESC";
            }      
          if(isset($_GET['category'])){
            $sql = "select *,(select name from employer where id=post.eid)as ename from post where category='".$_GET['category']."' and status = 'open' order by date DESC";
          }
          $result = $conn->query($sql);
          if($result->num_rows>0){
          while(  $row=$result->fetch_assoc()){
                $pid= $row['id'];
                $jobtitle= $row['name'];
                $category=$row['category'];
                $minexp=$row['minexp'];
                $salary=$row['salary'];
                $desc=$row['desc'];
                $role=$row['role'];
                $ename =$row['ename'];
                $status=$row['status'];
          ?>
          <div class="col-md-10" style="margin: 20px; background: rgba(0,0,0,0.5);padding: 5px;box-shadow: 0px 0px 5px #003333">
            <a href="post-details.php?post_id=<?php echo $pid; ?>"><h3 style="color: #2196F3"><?php echo $jobtitle;?></h3></a>
            <h5>By <?php echo $ename;?></h5>
            <div class="rating" style="color: #f91818;">
                <?php 
                $eid = $row['eid'];
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
			  <h5>Rating Out of 5 </h5>
            </div>
            
            <h4>Job Description:
            <h5><?php echo $desc;?></h5></h4>
            <h5>Experiance required: <?php echo $minexp;?>  </h5>
            <h5>Salary:<?php echo $salary;?> </h5>
            <a href="applyJob.php?id=<?php echo $pid;?>" class="pull-right" ><h3>Apply</h3></a>
          </div>                      
          <?php }
          }else{
             echo "No results found";
          } ?>
        </div>                          
      </div>
    		
      <div style=" height: 100vh; " class="col-md-3">
          <br><br> 
          <div style='padding:10px'>
              <h3>Jobs by Category</h3>
               <form>
              <div> 
                 
              <select class="form-control" name='category'>
                  <?php include "categoryOptions.php";?>
              </select><br>
                  <input class="btn btn-success pull-right" type="submit" value="Search"/>
                  </div>
              </form>
          </div>
		  <br><br>  
          <div style='padding:10px'>
            <h3>Seekers</h3>  
            <div class="col-md-12" data-spy="scroll"  data-target="#myScrollspy" data-offset="20">
              <?php 
                $sSQL = "SELECT * FROM seeker;";
                $sresult = $conn->query($sSQL);
                foreach ($sresult as $sr ) {
                  $sid = $sr['id'];
              ?>
              <div class="row" style="background: #fff; margin-bottom: 5px;" id="myScrollspy">
                <div class="col-md-4" style="padding: 5px;">
                   <a href="seekerAccounttest.php?sid=<?php echo $sid; ?>"><img src="uploads/<?php echo $sr['profile_image']; ?>" style="width: 80px; height: 80px;border: 1px solid gray;border-radius: 50%;"></a>
                </div> 
                <div class="col-md-8">
                    <h5 class="text text-uppercase" style="color: black; font-weight: 700;">
                      <a href="seekerAccounttest.php?sid=<?php echo $sid; ?>"><?php echo $sr['name']; ?></a>
                      </h5>
                    <p>Skill on: <?php echo $sr['skills']; ?></p>
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
              <?php } ?>
            </div>
          </div>      
      </div>   
		</div>                       
</div>
</div>
 
<script src="js/tilt.jquery.min.js"></script>
<script src="js/signinModal.js"></script>

  	<?php include 'footer.php';?>

<button  style="display:none;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#msgModal" id="msgModalBtn">Open Modal</button>
<div id="msgModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <?php if(isset($_GET['msg'])){
          $msg= $_GET['msg'];
          if($msg=='success'){
            
       echo  "<h4 class='modal-title'>Job Applied Successfully!</h4>";
          }else if($msg=='error'){
      echo  "<h4 class='modal-title'>Some Error occured Pls try again later!</h4>";
          }else if($msg=='dup'){
        echo "<h4 class='modal-title'>You have already applied for this job.\n "
              . "Check your application status in 'Jobs Applied' section</h4>";
          }       
      }?>
      </div>    
    </div>
  </div>
</div>
<?php 
if(isset($_GET['msg'])){
    if($_GET['msg']=='login'){
?>
    <script>
        $('#loginAnchor').trigger( "click" );
    </script>    
    <?php }else{
      ?>
    <script>
    $('#msgModalBtn').trigger( "click" );
    </script>    
          
   <?php  
    }    
    }?> 
</body>
</html>
