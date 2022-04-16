<?php 

include 'partials/header-student.php';

if(isset($_COOKIE['logged_in_user'])) {

	$username=$_COOKIE['logged_in_user'];

	$sql="SELECT * FROM student WHERE username='$username'";
	$result=$conn->query($sql);
	$retrive=mysqli_fetch_array($result);

	$firstname=$retrive['firstname'];
	$lastname=$retrive['lastname'];
	$phone=$retrive['phone'];
	$region=$retrive['region'];
	$address=$retrive['address'];
	$curriculum=$retrive['curriculum'];
	$class=$retrive['class'];
 
	
}
else {
	header("Location:signinas.php");
}

 ?>

<head>
	<title>Profile</title>
	<style> 
	img {
		display: block;
		margin: 0 auto;
	}
	.card-header {
		background-color: rgb(1 86 86);
		color: white;
	}
	body {
		background: #1c6860;
	}
	.card {
		width: 60%;
		border-radius: 30px;
	}
	.profileinfo {
		display: flex;
		align-items: center;
		justify-content: center;
	}

	@media only screen and (max-width: 600px) {
		.card{
			width: 100%;
		}
	}
</style>
</head>


<body>

	<div class="container mt-5 full-height profileinfo">
		<div class="card border border-dark shadow-0 text-center">
			<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
				<img src="images/kazuha.png" style="width: 50%;" class="img-fluid" />
			</div>

			<div class="card-header"><?php echo "@".$username; ?></div>
			

			<div class="card-body">
				<h5 class="card-title"><?php echo $firstname." ".$lastname; ?></h5><hr>

				<p class="card-text"><?php echo "Phone: ".$phone;?></p><hr>

				<p class="card-text"><?php echo "Region: ".$region;?></p><hr>

				<p class="card-text"><?php echo "Address: ".$address."<br>"; ?></p><hr>

				<p class="card-text"><?php echo "Curriculum: ".$curriculum."<br>"; ?></p><hr>

				<p class="card-text"><?php echo "Class: ".$class."<br>"; ?></p>
			</div>

			<div class="card-footer"><a class="btn btn-danger" href="editprofile.php">Edit Profile</a></div>

		</div>
	</div>


	<?php 
		include 'partials/footer.php';
	?>