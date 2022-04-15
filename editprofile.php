<?php

	include 'partials/header-student.php';

	if(isset($_POST["submit"])){
		$username=$_COOKIE['logged_in_user'];
		
		// $password=mysqli_real_escape_string($conn,$_POST['password']);
		$firstName=mysqli_real_escape_string($conn,$_POST['firstName']);
		$lastName=mysqli_real_escape_string($conn,$_POST['lastName']);
		$phone=mysqli_real_escape_string($conn,$_POST['phone']);
		$region=mysqli_real_escape_string($conn,$_POST['region']);
		$address=mysqli_real_escape_string($conn,$_POST['address']);
		$curriculum=mysqli_real_escape_string($conn,$_POST['curriculum']);
		$class=mysqli_real_escape_string($conn,$_POST['class']);

		$sql = "UPDATE `student` SET `firstname` = '$firstName',`lastname` = '$lastName',`phone` = '$phone',`region` = '$region',`address` = '$address',`curriculum` = '$curriculum', `class` = '$class' WHERE `student`.`username` = '$username'";

		$result=$conn->query($sql);

		$sql1 = "UPDATE `currenttuitions` SET `studentphone` = '$phone' WHERE `currenttuitions`.`student` = '$username'";
		$result1=$conn->query($sql1);

		header("Location:profile.php");

	}

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
 <link rel="stylesheet" href="css/signin.css">
<head>
	<title>Student Profile Edit</title>
	<style>
		body {
			background-color: #a2ebe3;
		}
		@media only screen and (max-width: 600px) {
			.registrationbox {
				width: 100%;
			}
		}
	</style>
</head>


<body>
	<div class="registrationbox">
		<h1>Edit Profile</h1>
		<form action="editprofile.php" method="post">

			<p>First Name</p>
			<input type="text" name="firstName" value="<?php echo $firstname ?>" required="">
			<p>Last Name</p>
			<input type="text" name="lastName" value="<?php echo $lastname ?>" required="">
			<p>Phone</p>
			<!-- <input type="number" name="phone" placeholder="Phone" required=""> -->
			<input type="tel" name="phone" value="<?php echo $phone ?>" pattern="[01]{2}[0-9]{9}" required="">
			<p>Region</p>
            <br>
            <select name="region">
				<?php if($region == 'Dhanmondi') { echo '<option selected value="Dhanmondi">Dhanmondi</option>'; }
											else { echo '<option value="Gulshan">Gulshan</option>'; } ?>
				<?php if($region == 'Gulshan') { echo '<option selected value="Gulshan">Gulshan</option>'; }
											else { echo '<option value="Dhanmondi">Dhanmondi</option>'; } ?>
				<?php if($region == 'Farmgate') { echo '<option selected value="Farmgate">Farmgate</option>'; }
											else { echo '<option value="Farmgate">Farmgate</option>'; } ?>
				<?php if($region == 'Lalmatia') { echo '<option selected value="Lalmatia">Lalmatia</option>'; }
											else { echo '<option value="Lalmatia">Lalmatia</option>'; } ?>
				<?php if($region == 'Mohammadpur') { echo '<option selected value="Mohammadpur">Mohammadpur</option>'; }
											else { echo '<option value="Mohammadpur">Mohammadpur</option>'; } ?>
				<?php if($region == 'Moghbazar') { echo '<option selected value="Moghbazar">Moghbazar</option>'; }
											else { echo '<option value="Moghbazar">Moghbazar</option>'; } ?>

            </select>
            <br>
            <p>Address</p>
			<input type="text" name="address" value="<?php echo $address ?>" required="">
			<p>Curriculum</p>
            <br>
            <select name="curriculum">
			<?php if($curriculum == 'English Version') { echo '<option selected value="English Version">English Version</option>'; }
											else { echo '<option value="English Version">English Version</option>'; } ?>
			<?php if($curriculum == 'English Medium') { echo '<option selected value="English Medium">English Medium</option>'; }
											else { echo '<option value="English Medium">English Medium</option>'; } ?>
			<?php if($curriculum == 'Bangla Medium') { echo '<option selected value="Bangla Medium">Bangla Medium</option>'; }
											else { echo '<option value="Bangla Medium">Bangla Medium</option>'; } ?>

            </select>
            <br>
			<p>Class</p>
			<input type="text" name="class"  value="<?php echo $class ?>" required="">
			<br>
			<input type="submit" name="submit" value="submit"><br>
			
			<center><a href="profile.php">Back</a></center>
			

		</form>
	</div>

</body>
</html>

