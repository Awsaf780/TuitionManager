<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="profilestyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
	<header>
		<div class="container">
		<div class="icon-bar">
			<nav>
				<ul>	
					<li><a href="adminhome.php"><i class="fa fa-home"><br>Home</i></a></li>
					<li><a href="users.php"><i class="fa fa-users"><br>Users</i></a></li>
					<li><a href="removeuser.php"><i class="fa fa-user-times"><br>Remove Users</i></a></li>
					<li><a href="message.php"><i class="fa fa-telegram"><br>Messages</i></a></li>
					<li><a href="logout.php"><i class="fa fa-sign-out"><br>Logout</i></a></li>
				</ul>
			</nav>
		</div>
	</header>
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