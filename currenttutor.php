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


	if(isset($_POST["delete"]))
	{
		$student=$username;
		$teacher=$_POST['teacher_name'];

		$sql1="DELETE FROM currenttuitions WHERE student='$student' AND teacher='$teacher'";
		$result=$conn->query($sql1);
		// header("Location:currenttutor.php");
		if($result){
			echo '<script type="text/javascript"> alert("Tutor deleted");window.location="currenttutor.php";</script>';
		}
		else {
			echo '<script type="text/javascript"> alert("Could Not Delete");</script>';
		}

		
	}

?>

<head>
<link rel="stylesheet" href="css/signin.css">
	<title>Add Tutor</title>
	<style>
		body {
			background-color: #1c6860;
		}
		.bg-primary {
			background: rgb(1 86 86)!important;
		}
		.card-title {
			color: grey;
		}


@media only screen and (max-width: 600px) {
	.registrationbox{
		width: 100%;
	}
}
	</style>
</head>

<body>
	
	<div class="container full-height mt-5">
	<h1 style="color: white; text-center">Current Tutors</h1>
	<div class="row row-cols-1 row-cols-md-2">
	
	<?php 

	$sql="SELECT * FROM currenttuitions WHERE student='$username'";
	$result=$conn->query($sql);
	// $retrive=mysqli_fetch_array($result);

	while($row = mysqli_fetch_assoc($result))
				{

					echo "<div class=\"col mb-4\">
							<div class=\"card text-center \">
								<div class=\"card-header bg-primary text-white \">".$row['teacher']."</div>

								<div class=\"card-body\">
									<h5 class=\"card-title\">".$row['teacherphone']."</h5><hr>
									
									<form action=\"currenttutor.php\" method=\"post\">
									<input type=\"hidden\" name=\"teacher_name\" value=\"".$row['teacher']."\">
									<input class=\"btn btn-danger\" type=\"submit\" name=\"delete\" value=\"delete\">
									</form>
									
								</div>

							</div>
							</div>";


				}

	 ?>
	</div>
	</div>

	<!-- <div class="checkreview">
	<a href="checkreview.php">Check Review</a>
	</div> -->

	

<?php
	include 'partials/footer.php';
?>