<?php 
	include './partials/header.php';

	if (isset($_POST["submit"])){
		
		$username=mysqli_real_escape_string($conn,$_POST['username']);
		$password=mysqli_real_escape_string($conn,$_POST['password']);
		$firstName=mysqli_real_escape_string($conn,$_POST['firstName']);
		$lastName=mysqli_real_escape_string($conn,$_POST['lastName']);
		$phone=mysqli_real_escape_string($conn,$_POST['phone']);
		$nid=mysqli_real_escape_string($conn,$_POST['nid']);
		$region=mysqli_real_escape_string($conn,$_POST['region']);
		$address=mysqli_real_escape_string($conn,$_POST['address']);
		$curriculum=mysqli_real_escape_string($conn,$_POST['curriculum']);
		$class=mysqli_real_escape_string($conn,$_POST['class']);
		
		
		$sql = "SELECT * FROM student WHERE username='$username'";
		$result=$conn->query($sql);
		
		
		if(!$row = mysqli_fetch_array($result))
		{
			$password_enc = password_hash($password, PASSWORD_BCRYPT);
			$sql= "INSERT INTO `student` (`username`, `password`, `firstname`, `lastname`, `phone`, `nid`, `region`, `address`, `curriculum`, `class`) VALUES ('$username','$password_enc','$firstName','$lastName','$phone','$nid','$region','$address','$curriculum','$class')";
		
			$result=$conn->query($sql);
		
			header("Location:signin.php");
		}
		else
		{
			echo '<script type="text/javascript"> alert("Error : Username already exists") </script>';
		
			// header("Location:signup.html");
		}
		
		}
?>


<link rel="stylesheet" href="css/signin.css">


<head>
	<title>Student Register</title>
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
	<div class="registrationbox mt-5">
		<h1>Student Register</h1>
		<form action="signup.php" method="post" enctype="multipart/form-data">
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Username" required="">
			<p>Password</p>
			<input type="Password" name="password" placeholder="Enter 6 digit password" minlength="6" required="">
			<p>First Name</p>
			<input type="text" name="firstName" placeholder="First Name" required="">
			<p>Last Name</p>
			<input type="text" name="lastName" placeholder="Last Name" required="">
			<p>Phone</p>
			<input type="tel" name="phone" placeholder="Enter 11 digit phone number. Eg:01XXXXXXXXX" pattern="[01]{2}[0-9]{9}" required="">
			<!-- <input type="number" name="phone" placeholder="Phone" required=""> -->
					
			<p>Region</p>
            <br>
            <select name="region">
                <!-- <option value="">Select</option> -->
                <option value="Dhanmondi">Dhanmondi</option>
                <option value="Gulshan">Gulshan</option>
                <option value="Farmgate">Farmgate</option>
                <option value="Lalmatia">Lalmatia</option>
                <option value="Mohammadpur">Mohammadpur</option>
                <option value="Moghbazar">Moghbazar</option>
            </select>
            <br>
            <p>Address</p>
			<input type="text" name="address" placeholder="Address" required="">
			<p>Curriculum</p>
            <br>
            <select name="curriculum">
                <option value="English Version">English Version</option>
                <option value="English Medium">English Medium</option>
                <option value="Bangla Medium">Bangla Medium</option>
            </select>
            <br>
			<p>Class</p>
			<input type="text" name="class" placeholder="Class" required="">
			
			<div class="pos-relative">
				<fieldset>
					<legend>Upload Nid</legend>
					<input type="file" id='files' name="files" style="margin-bottom: 5px !important">
					<img class="loader" src="img/loader.gif">
					
					<div>
						<small>Allowed only files with extension (jpg, jpeg, png, gif) <br>				
						Maximum allowed file size 500 KB</small>
					</div>
				</fieldset>
			</div>
			<br>
			<div class="nid_wrapper">
				<p>Nid </p>
				<input type="text" id="nid" name="nid" placeholder="NID" required readonly>
			</div>
			
			<input type="submit" name="submit" value="Sign Up"><br>
			
			<p style="text-align: center;">Already have an account? <a href="signinas.php">Sign In</a></p>

		</form>
	</div>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/custom.js"></script>	



<?php 
	include './partials/footer.php';
?>