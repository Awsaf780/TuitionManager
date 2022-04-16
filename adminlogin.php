<?php
	include 'dbh.php';

	// Check if admin username exists in cookie
	// if exists, send to admin home.
	// else, proceed to login as admin
	
	if(isset($_COOKIE['admin_username'])) {

		$username = $_COOKIE['admin_username'];
		$sql = "SELECT * FROM admin WHERE username='$username'";
		$result = $conn -> query($sql);

		if( $row = $result -> fetch_assoc() ){
			header("Location:adminhome.php");
		}
	}
	else {
		include './partials/header.php';
	}
	
?>


<?php
	if (isset($_POST["submit"]) ){

		$username=$_POST['username'];
		$password=$_POST['password'];

		// Check if username exists
			// If exists, get encrypted password for given username
				// decrypt the password from DB and match with password from POST
					// If same, save username to session/cookies and redirect
					// If not same, print password error msg
			// If username doesnot exist, display no such user
			
		$sql="SELECT * FROM admin WHERE username='$username'";
		
		$result=$conn->query($sql);

		if( $row = $result->fetch_assoc() ){
			$db_password = $row['password'];

			if( password_verify($password, $db_password) ){
				echo '<script>document.getElementById("invalid_admin").innerHTML = "Password Matches"; </script>';
				$_SESSION['admin_username'] = $_POST['username'];
				setcookie("admin_username", $_SESSION['admin_username'], time()+ 60*60*24*5,'/'); // valid for 5 days
				setcookie("logged_in_as", 'admin', time()+ 60*60*24*5,'/'); // valid for 5 days
				

				header("Location:adminhome.php");
			}
			else {
				echo '<script>alert("Password Does Not Match")</script>';
			}
		}else{
			
			echo '<script>alert("No Such User")</script>';

			// $_SESSION['admin_username'] = $_POST['username'];
			// setcookie("admin_username", $_SESSION['admin_username'], time()+ 60*60*24*5,'/'); // valid for 5 days
			// print_r($_SESSION);
			
			// header("Location:adminhome.php");
		}


	}
?>




<div class="container mt-5 full-height">
	<div class="container-fluid admin-login">
		<form class="col-md-6" action="adminlogin.php" method="post" name="admin_form">
			<div class="form-group">
				<label for="adminuser">Username</label>
				<input type="text" class="form-control" id="adminuser" name="username" required>
			</div>
			<div class="form-group">
				<label for="adminpass">Password</label>
				<input type="password" class="form-control" id="adminpass" name="password" required>
			</div>
			
			<div class="form-group">
				<button name="submit" type="submit" class="btn btn-primary admin-submit w-100 mt-2" value="Login">Submit</button>
			</div>
			<small class="form-text text-muted" id="invalid_admin">  </small>
		</form>
	</div>
</div>


<?php 
	include './partials/footer.php';
?>
