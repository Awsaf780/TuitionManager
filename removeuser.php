<?php 
	include 'dbh.php';
	

	if(isset($_COOKIE['admin_username'])) {

		$username = $_COOKIE['admin_username'];

		$sql = "SELECT * FROM admin WHERE username='$username'";
		$result = $conn -> query($sql);
		$retrive = mysqli_fetch_assoc($result);

		$firstname = $retrive['firstname'];
		$lastname = $retrive['lastname'];

		include './partials/header-admin.php';
	}
	else {
		header("Location:adminlogin.php");
	}
?>



<div class="full-height">

<div class="container mt-5 full-height">
	<div class="container-fluid admin-login">
		<form class="col-md-6" action="removeuser.php" method="post" name="remove_user_form">
			<div class="form-group">
				<label for="adminuser">Enter Username</label>
				<input type="text" class="form-control" id="adminuser" name="user" required required>
			</div>
			<div class="form-group">
				<label for="inputState">Select User Type</label>
				<select id="inputState" class="form-control" name="usertype" required>
					<option value="student">Student</option>
                	<option value="teacher">Teacher</option>
				</select>
			</div>
			
			<div class="form-group">
				<button name="submit" type="submit" class="btn btn-danger admin-submit w-100 mt-2" value="Login">Remove</button>
			</div>
			<small class="form-text text-muted text-center" id="invalid_user">  </small>
		</form>
	</div>
</div>


</div>

<?php 
	if (isset($_POST["submit"])){

		$username_r = $_POST['user'];
		$usertype = $_POST['usertype'];

		$sql = "SELECT * FROM $usertype WHERE username='$username_r' ";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			$retrive = mysqli_fetch_assoc($result);
			$sql_del = "DELETE FROM $usertype WHERE username = '$username_r'";

			$result_del = $conn->query($sql_del);
			echo '<script>document.getElementById("invalid_user").innerHTML = "User Successfully Removed"; </script>';
		}
		else {
			echo '<script>document.getElementById("invalid_user").innerHTML = "User Not Found"; </script>';
		}

	}
 ?>


<?php 
	include './partials/footer.php';
?>