<link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">

<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" style="box-shadow: 0px 3px 4px rgba(225, 225, 225, .6); font-family: 'Kodchasan', sans-serif;">
  <div class="container-fluid"> 
  
    <div class="collapse navbar-collapse" id="defaultNavbar1">
 
    <ul class="nav navbar-nav navbar-right ">
        <li><a href="index.php">Home</a></li>
        	<?php 
                
               if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
                if(isset($_SESSION['login_user']))                           
 {
                    $myusername = $_SESSION['login_user'];
   echo ' <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$myusername.'<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="seekerAccount.php">My Profile</a></li>
             <li><a href="AppliedJobs.php">Jobs Applied</a></li>
             <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>';
 }
 
 if(isset($_SESSION['login_employer']))
 {
                    $myusername = $_SESSION['login_employer'];
   echo ' <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$myusername.'<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="employerAccount.php">My Account</a></li>
             <li><a href="postjob.php">Post a Job</a></li>
              <li><a href="ViewApplicants.php">View Applications</a></li>
            <li><a href="logout.php">Logout</a></li>
       
          </ul>
        </li>';
 }
 elseif(!isset($_SESSION['login_employer']) && !isset($_SESSION['login_user']))
     {
   
    echo '<li><a id="loginAnchor" href="#" data-toggle="modal" data-target="#myEmployerModal"> SignIn/SignUp </a></li>';
     
 }  ?>
       
         <li><a href="#contactus">Contact Us</a></li>
      </ul>
          
    </div>
  </div>
</nav>