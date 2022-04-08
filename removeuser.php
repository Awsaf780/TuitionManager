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



	<div class="loginbox">
	<!-- <div class="profileinfo"> -->
	<form action="removeuser.php" method="post">
		<p>Enter Username</p>
		<input type="text" name="user" placeholder="Enter Username" required=""><br><br><br>
		<p>Select User Type</p>
		<br>
            <select name="usertype">
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>
            <br><br><br>
        <input type="submit" name="submit" value="Submit">
	</form>
    </div>
	<!-- </div> -->
</body>
</html>

<?php 
if (isset($_POST["submit"])){

include 'dbh.php';

$username=$_POST['user'];
$usertype=$_POST['usertype'];


$sql = "DELETE FROM $usertype WHERE username = '$username'";

$result=$conn->query($sql);

// header("Location:removeuser.php");

echo '<script type="text/javascript"> alert("User removed");window.location="removeuser.php";</script>';

}
 ?>