
<?php 
 include 'connect.php';
	if (isset($_POST['addaccomplishment'])) {
		$eid = $_POST['eid'];
		$title = $_POST['title'];
		$institute = $_POST['institute'];
		$concentration = $_POST['concentration'];
		$result = $_POST['result'];
		$passing_year = $_POST['passing_year'];

		$iquery="INSERT INTO `seeker_accomplishments`(`sid`, `title`, `institute`, `concentration`, `result`, `passing_year`)
			VALUES ('$eid','$title','$institute','$concentration','$result','$passing_year')";
		if ($conn->query($iquery) === TRUE) {
			
			echo '<script>alert("Accomplishment Details Added!")</script>';
			echo '<script>window.location="seekerAccount.php"</script>';
		}else{
			echo "Error: " . $iquery . "<br>" . $conn->error;
		}
	}

	if (isset($_POST['updateinfo'])) {
		$sid = $_POST['sid'];
		$update_name = $_POST['update_name'];
		$update_email = $_POST['update_email'];
		$update_fathername = $_POST['update_fathername'];
		$update_mothername = $_POST['update_mothername'];
		$update_dob = $_POST['update_dob'];
		$update_address = $_POST['update_address'];
		$update_phone = $_POST['update_phone'];
		$update_nid = $_POST['update_nid'];
		//$update_qualification = $_POST['update_qualification'];
		$update_skills = $_POST['update_skills'];
		
		$updateSQL= "UPDATE `seeker` SET `name`='$update_name',`email`='$update_email',`dob`='$update_dob',`skills`='$update_skills',`father_name`='$update_fathername',`mother_name`='$update_mothername',`phone`='$update_phone',`nid`='$update_nid',`address`='$update_address' WHERE id = '$sid';";
		if ($conn->query($updateSQL) === TRUE) {
			echo '<script>alert("Your Details Updated!")</script>';
			echo '<script>window.location="seekerAccount.php"</script>';
		}else{
			echo "Error: " . $updateSQL . "<br>" . $conn->error;
		}
	}

	if (isset($_POST['updateaccomplishment'])) {
		$sid = $_POST['sid'];
		$title = $_POST['title'];
		$institute = $_POST['institute'];
		$concentration = $_POST['concentration'];
		$result = $_POST['result'];
		$passing_year = $_POST['passing_year'];
		
		$updateSQL= "UPDATE `seeker_accomplishments` SET `title`='$title',`institute`='$institute',`concentration`='$concentration',`result`='$result',`passing_year`='$passing_year' WHERE id = '$sid';";
		if ($conn->query($updateSQL) === TRUE) {
			echo '<script>alert("Accomplishment Details Updated!")</script>';
			echo '<script>window.location="seekerAccount.php"</script>';
		}else{
			echo "Error: " . $updateSQL . "<br>" . $conn->error;
		}
	}

?>