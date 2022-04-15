<?php 

	include 'partials/header-student.php';

	if( isset($_COOKIE['logged_in_as']) && isset($_COOKIE['logged_in_user']) ){

		$type = $_COOKIE['logged_in_as'];
		$username = $_COOKIE['logged_in_user'];

		$sql = "SELECT * FROM $type WHERE username='$username'";
		$result = $conn->query($sql);
		$row = mysqli_fetch_array($result);

		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		
	}else {
		header("Location:signinas.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<body>

	
	<div class="statusabox">
		<div class="resigninas">
			<a href="addtutor.php">Add tutor</a>
			<a href="currenttutor.php">Current Tutors</a>
			<a href="deletetutor.php">Delete Tutors</a>
          
		</div>
		<div class="home">
			<br>
			<center><a href="youroffers.php" style="font-size: 15px;">Your Offers</a></center>
			<center><a href="home.php">Home</a></center>
		</div>
		
	</div>


	
<?php
	include 'partials/footer.php';
?>