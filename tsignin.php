<?php
	include './partials/header.php';

	if (isset($_POST["submit"])){

		$username=mysqli_real_escape_string($conn,$_POST['username']);
		$password=mysqli_real_escape_string($conn,$_POST['password']);

		$sql="SELECT * FROM teacher WHERE username='$username'";
		$result=$conn->query($sql);

		if( $row = $result->fetch_assoc() ){
			$db_password = $row['password'];

			if( password_verify($password, $db_password) ){
				// echo 'Password Matches';
				setcookie("logged_in_user", $username, time()+ 60*60*24*5,'/');
				setcookie("logged_in_as", 'teacher', time()+ 60*60*24*5,'/');
				header("Location:thome.php");
				

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
	<title>Teacher Login</title>
	<style>
		body {
			background-color: #1c6860;
		}
		@media only screen and (max-width: 600px) {
			
		}
	</style>
</head>

<body>
	<div class="loginbox">
		<h1>Teacher Login</h1>
		<form action="tsignin.php" method="post">
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Username" required="">
			<p>Password</p>
			<input type="Password" name="password" placeholder="Enter Password" required="">
			<input type="submit" name="submit" value="Login"><br>
			<a href="tsignup.php">Create new account</a><br>
			<a href="index.php">Home</a>
		</form>
	</div>


</body>
