<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
</head>
<link rel="stylesheet" href="signin.css">
<body>
	<div class="loginbox">
		<h1>Admin Login</h1>
		<form action="adminlogin.php" method="post">
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Username" required="">
			<p>Password</p>
			<input type="Password" name="password" placeholder="Enter Password" required="">
			<input type="submit" name="submit" value="Login"><br>
			<br>
			<center><a href="index.html">Home</a></center>
		</form>
	</div>


</body>
</html>


<?php
if (isset($_POST["submit"]) ){
session_start();
include 'dbh.php';
// include 'session.php';

$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT * FROM admin WHERE username='$username' AND password ='$password'";
$result=$conn->query($sql);

if(!$row=$result->fetch_assoc()){
	header("Location:error.php");
}
else{
	$_SESSION['username']=$_POST['username'];
	header("Location:adminhome.php");
}
}
?>
