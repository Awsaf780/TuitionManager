<?php 
	include './partials/header.php';
?>


<!-- 
<!DOCTYPE html>
<html>
<head>
	<title>Teacher Login</title>
</head>
<link rel="stylesheet" href="signin.css">
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
			<a href="index.html">Home</a>
		</form>
	</div>


</body>
</html> -->


<?php
	if (isset($_POST["submit"])){
		echo $_POST['t_user'];

		$username=$_POST['t_user'];
		$password=$_POST['t_pass'];

		$sql="SELECT * FROM teacher WHERE username='$username' AND password ='$password'";
		$result=$conn->query($sql);

		if(!$row=$result->fetch_assoc()){
			echo '<script>document.getElementById("invalid_teacher").innerHTML = "Invalid Credentials"; </script>';
		}
		else{
			$_COOKIE['teacher']=$_POST['username'];
			header("Location:thome.php");
		}
	}
?>