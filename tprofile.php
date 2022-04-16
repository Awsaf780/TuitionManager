<?php 

include 'partials/header-teacher.php';

if(isset($_COOKIE['logged_in_user'])) {

	$username=$_COOKIE['logged_in_user'];

	$sql="SELECT * FROM teacher WHERE username='$username'";
	$result=$conn->query($sql);
	$retrive=mysqli_fetch_array($result);

	$firstname=$retrive['firstname'];
	$lastname=$retrive['lastname'];
	$phone=$retrive['phone'];
	$nid=$retrive['nid'];
	$institution=$retrive['institution'];
	$address=$retrive['address'];

	
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
		background-color:  rgb(25 18 65);
		color: white;
	}
	body {
		background-color: #215a80;
	}
	.card-title {
		color: grey;
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

	<div class="container full-height profileinfo">
		<div class="card border border-dark shadow-0 text-center">
			<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
				<img src="images/dains.png" style="width: 50%;" class="img-fluid" />
			</div> <br>

			<div class="card-header"><?php echo "@".$username; ?></div>
			

			<div class="card-body">
				<h5 class="card-title"><?php echo $firstname." ".$lastname; ?></h5><hr>

				<p class="card-text"><?php echo "Phone: ".$phone;?></p><hr>

				<p class="card-text"><?php echo "NID: ".$nid;?></p><hr>

				<p class="card-text"><?php echo "Address: ".$address."<br>"; ?></p><hr>

				<p class="card-text"><?php echo "Institution: ".$institution."<br>"; ?></p>
			</div>

			<div class="card-footer"><a class="btn btn-danger" href="teditprofile.php">Edit Profile</a></div>

		</div>
	</div>


	<?php 
		include 'partials/footer.php';
	?>