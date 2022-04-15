<?php
	include './partials/header.php';

	if (isset($_POST["submit"])){

		$username=mysqli_real_escape_string($conn,$_POST['username']);
		$password=mysqli_real_escape_string($conn,$_POST['password']);

		$sql="SELECT * FROM student WHERE username='$username'";
		$result=$conn->query($sql);

		if( $row = $result->fetch_assoc() ){
			$db_password = $row['password'];

			if( password_verify($password, $db_password) ){
				// echo 'Password Matches';
				setcookie("logged_in_user", $username, time()+ 60*60*24*5,'/');
				setcookie("logged_in_as", 'student', time()+ 60*60*24*5,'/');
				header("Location:home.php");
				

				// header("Location:adminhome.php");
			}
			else {
				echo '<script>alert("Password Does Not Match")</script>';
			}
		}else{
			
			echo '<script>alert("No such user")</script>';
		}
	}
?>

<link rel="stylesheet" href="css/signin.css">

<head>
	<title>Student Login</title>
	<style>
		body {
			background-color: #1c6860;
		}
		@media only screen and (max-width: 600px) {
			
		}
	</style>
</head>


<body>
	<div class="container full-height">
	<div class="loginbox">
		<h1>Student Login</h1>
		<form action="signin.php" method="post">
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Username" required="">
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password" required="">
			<input type="submit" name="submit" value="Login"><br>

			<small class="form-text text-muted" style="color: white" id="invalid_signin">  </small> <br><br>
			<!-- <a href="#">Forgot password ?</a><br> -->
			<span>
				<a href="signup.php">Create new account</a><hr><a href="index.php">Home</a>
			</span>
		</form>
	</div>
	</div>
	

</body>




<?php
	include './partials/footer.php';
?>