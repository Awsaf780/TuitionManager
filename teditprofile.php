<?php

	include 'partials/header-teacher.php';

	if(isset($_POST["submit"])){
		$username=$_COOKIE['logged_in_user'];
		
		
		$firstName=mysqli_real_escape_string($conn,$_POST['firstName']);
		$lastName=mysqli_real_escape_string($conn,$_POST['lastName']);
		$phone=mysqli_real_escape_string($conn,$_POST['phone']);
		$institution=mysqli_real_escape_string($conn,$_POST['institution']);
		$address=mysqli_real_escape_string($conn,$_POST['address']);

		$sql1 = "UPDATE `currenttuitions` SET `teacherphone` = '$phone' WHERE `currenttuitions`.`teacher` = '$username'";
		$result1=$conn->query($sql1);
	
	
		$sql = "UPDATE `teacher` SET `firstname` = '$firstName',`lastname` = '$lastName',`phone` = '$phone',`institution`='$institution',`address` = '$address' WHERE `teacher`.`username` = '$username'";
		$result=$conn->query($sql);
	
	
		header("Location:tprofile.php");

	}

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
 <link rel="stylesheet" href="css/signin.css">
<head>
	<title>Teacher Profile Edit</title>
	<style>
		body {
			background: #215a80;
		}
		.registrationbox {
				background: rgb(25 18 65);
		}
		.registrationbox input[type="submit"] {
			background: #0e7a85;
		}
		@media only screen and (max-width: 600px) {
			.registrationbox {
				width: 100%;
			}
		}
	</style>
</head>


<body>
	<div class="container mt-5 full-height">


		<div class="registrationbox">
			<h1>Edit Profile</h1>
			<form action="teditprofile.php" method="post">
				<p>First Name</p>
				<input type="text" name="firstName" value="<?php echo $firstname ?>" required="">
				<p>Last Name</p>
				<input type="text" name="lastName" value="<?php echo $lastname ?>" required="">
				<p>Phone</p>
				<!-- <input type="number" name="phone" placeholder="Phone" required=""> -->
				<input type="tel" name="phone" value="<?php echo $phone ?>" pattern="[01]{2}[0-9]{9}" required="">

				<p>Institution</p>
				<br>

				<select name="institution">
					<?php if($institution == 'BUET') { echo '<option selected value="BUET">BUET</option>'; }
												else { echo '<option value="BUET">BUET</option>'; } ?>
					<?php if($institution == 'DU') { echo '<option selected value="DU">DU</option>'; }
												else { echo '<option value="DU">DU</option>'; } ?>
					<?php if($institution == 'NSU') { echo '<option selected value="NSU">NSU</option>'; }
												else { echo '<option value="NSU">NSU</option>'; } ?>
					<?php if($institution == 'BRAC') { echo '<option selected value="BRAC">BRAC</option>'; }
												else { echo '<option value="BRAC">BRAC</option>'; } ?>
					<?php if($institution == 'DMC') { echo '<option selected value="DMC">DMC</option>'; }
												else { echo '<option value="DMC">DMC</option>'; } ?>
					<?php if($institution == 'AUST') { echo '<option selected value="AUST">AUST</option>'; }
												else { echo '<option value="AUST">AUST</option>'; } ?>

				</select>
				<br>

				<p>Address</p>
				<input type="text" name="address" value="<?php echo $address ?>" required="">
				<br>
				<input type="submit" name="submit" value="Save Changes"><br>
				
				<center><a href="tprofile.php">Back</a></center>
				

			</form>
		</div>
	</div>
</body>

<?php 
	include 'partials/footer.php';
?>