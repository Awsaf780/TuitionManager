<?php 

	include 'partials/header-teacher.php';

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
		$teacher=$username;
		$student=$_POST['student_name'];

		$sql1="DELETE FROM currenttuitions WHERE student='$student' AND teacher='$teacher'";
		$result=$conn->query($sql1);
		// header("Location:currenttutor.php");
		if($result){
			echo '<script type="text/javascript"> alert("Tutor deleted");window.location="tstatus.php";</script>';
		}
		else {
			echo '<script type="text/javascript"> alert("Could Not Delete");</script>';
		}

		
	}
?>


<head>
<link rel="stylesheet" href="css/signin.css">
	<style>
		body {
			background-color: #215a80;
		}
		.bg-primary {
			background: rgb(25 18 65)!important;
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
	<h1 style="color: white; text-center">Current Students</h1>
	<div class="row row-cols-1 row-cols-md-2">
	
	<?php 

	$sql="SELECT * FROM currenttuitions WHERE teacher='$username'";
	$result=$conn->query($sql);
	// $retrive=mysqli_fetch_array($result);

	while($row = mysqli_fetch_assoc($result))
				{

					echo "<div class=\"col mb-4\">
							<div class=\"card text-center \">
								<div class=\"card-header bg-primary text-white \">".$row['student']."</div>

								<div class=\"card-body\">
									<h5 class=\"card-title\">".$row['studentphone']."</h5><hr>
									
									<form action=\"tstatus.php\" method=\"post\">
									<input type=\"hidden\" name=\"student_name\" value=\"".$row['student']."\">
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