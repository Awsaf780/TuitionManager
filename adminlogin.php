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
	if (isset($_POST["submit"]) ){

		$username=$_POST['username'];
		$password=$_POST['password'];

		$sql="SELECT * FROM admin WHERE username='$username' AND password ='$password'";
		$result=$conn->query($sql);

		if(!$row=$result->fetch_assoc()){
			echo '<script>document.getElementById("invalid_admin").innerHTML = "Invalid Credentials"; </script>';
		}else{
			$_SESSION['admin_username'] = $_POST['username'];
			setcookie("admin_username", $_SESSION['admin_username'], time()+ 60*60*24*5,'/'); // valid for 5 days
			print_r($_SESSION);
			
			header("Location:adminhome.php");
		}
	}
?>


<?php 
	include './partials/footer.php';
?>
