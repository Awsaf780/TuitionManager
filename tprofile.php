<?php 
session_start();
include 'dbh.php';

$username=$_SESSION['username'];

$sql="SELECT * FROM teacher WHERE username='$username'";
$result=$conn->query($sql);
$retrive=mysqli_fetch_array($result);
//print_r($retrive);

$firstname=$retrive['firstname'];
$lastname=$retrive['lastname'];
$phone=$retrive['phone'];
$institution=$retrive['institution'];
$address=$retrive['address'];

// echo "Name: ".$firstname." ".$lastname."<br>";
// echo "Phone: ".$phone."<br>";
// echo "Institution: ".$institution."<br>";
// echo "Address: ".$address."<br>";
// echo "Username: ".$username;

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style> 
	img {
		display: block;
		margin: 0 auto;
		border-radius: 50%;
	}
</style>
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
					<li><a href="thome.php"><i class="fa fa-home"><br>Home</i></a></li>
					<li><a href="tprofile.php"><i class="fa fa-user-circle"><br>Profile</i></a></li>
					<li><a href="findstudent.php"><i class="fa fa-search"><br>Find Students</i></a></li>
					<li><a href="tstatus.php"><i class="fa fa-users"><br>Status</i></a></li>
					<li><a href="message.php"><i class="fa fa-telegram"><br>Messages</i></a></li>
					<li><a href="logout.php"><i class="fa fa-sign-out"><br>Logout</i></a></li>
				</ul>
			</nav>
		</div>
	</div>
	</header>
		<div class="tprofileinfo">
		<p><?php  if($image = " "){
			echo "<img width = '125' height = '125' src ='uploads/default.jpg' alt = 'default profile picture'>";

		} ?><p>
		<p><?php echo "Name: ".$firstname." ".$lastname."<br>"; ?></p>
		<p><?php echo "Username: ".$username; ?></p>
		<p><?php echo "Phone: ".$phone."<br>";?></p>
		<p><?php echo "Institution: ".$institution."<br>"; ?></p>
		<p><?php echo "Address: ".$address."<br>"; ?></p>
	</div>

	<div class="editprofilebtn">
		<a href="teditprofile.php">Edit Profile</a>
	</div>

</body>
</html>