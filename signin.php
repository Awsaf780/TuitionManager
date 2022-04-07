<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
</head>
<link rel="stylesheet" href="signin.css">
<body>
	<div class="loginbox">
		<h1>Student Login</h1>
		<form action="signin.php" method="post">
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Username" required="">
			<p>Password</p>
			<input type="Password" name="password" placeholder="Enter Password" required="">
			<input type="submit" name="submit" value="Login"><br>
			<!-- <a href="#">Forgot password ?</a><br> -->
			<a href="signup.php">Create new account</a><br>
			<a href="index.html">Home</a>
		</form>
	</div>

</body>
</html>


<?php
if (isset($_POST["submit"])){
session_start();
include 'dbh.php';

$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=mysqli_real_escape_string($conn,$_POST['password']);

$sql="SELECT * FROM student WHERE username='$username' AND password ='$password'";
$result=$conn->query($sql);

if(!$row=$result->fetch_array()){
	// header("Location:error.php");
	echo '<script type="text/javascript"> alert("Error : Username or password incorrect.") </script>';
}
else{
	$_SESSION['username']=$_POST['username'];
	header("Location:home.php");
}
}
?>