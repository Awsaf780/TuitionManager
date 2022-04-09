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


<head>
	<style>
		.row {
			display: flex;
			justify-content: center;
		}
	</style>
</head>

<div class="full-height">
	
	<div class="jumbotron jumbotron-fluid jumbotron-admin">
      <div class="container admin-member-title">
		  <h1 style="color: white;"><center>Welcome to Knowledge Hub, <br> <b style="font-size: 3rem;"><?php echo $firstname." ".$lastname; ?></b></center></h1>
      </div>
    </div>

	<div class="container quotes">
		<small class="form-text text-muted text-center"> "Education is the most powerful weapon which you can use to change the world" - Nelson Mandela </small>
	</div>

	<div class="container menu text-center mt-5">
		<h2>Quick Navigation</h2><br>
	<div class="row row-cols-2 row-cols-md-2 text-center">

		<div class="card text-white bg-info mb-5 mx-5" style="max-width: 18rem;">
		<div class="card-header"><a href="findteacher.php" class="stretched-link" style="text-decoration: none; color: white">Find Teachers</a></div>
			<div class="card-body">
			<i class="fa-solid fa-magnifying-glass" style="font-size: 24px;"></i> <i class="fa-solid fa-people-group"  style="font-size: 24px;"></i>
			</div>
		</div>		
		
		<div class="card text-white bg-info mb-5 mx-5" style="max-width: 18rem;">
			<div class="card-header"><a href="tprofile.php" class="stretched-link" style="text-decoration: none; color: white">Profile</a></div>
			<div class="card-body">
			<i class="fa-solid fa-user"  style="font-size: 24px;"></i>
			</div>
		</div>

		<div class="card text-white bg-info mb-5 mx-5" style="max-width: 18rem;">
		<div class="card-header"><a href="message.php" class="stretched-link" style="text-decoration: none; color: white">Messages</a></div>
			<div class="card-body">
				<i class="fa-solid fa-message" style="font-size: 24px;"></i>
			</div>
		</div>		
		
		<div class="card text-white bg-danger mb-5 mx-5" style="max-width: 18rem;">
		<div class="card-header"><a href="logout.php" class="stretched-link" style="text-decoration: none; color: white">Logout</a></div>
			<div class="card-body">
				<i class="fa-solid fa-arrow-right-from-bracket" style="font-size: 24px;"></i>
			</div>
		</div>

</div>
	</div>
	
</div>

	

<?php
	include 'partials/footer.php';
?>