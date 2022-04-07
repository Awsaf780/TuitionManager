<?php 
// session_start();
 include 'dbh.php';
 include 'session.php';

// $username=$_SESSION['username'];

$sql="SELECT * FROM student WHERE username='$username'";
$result=$conn->query($sql);
$retrive=mysqli_fetch_array($result);
//print_r($retrive);

$firstname=$retrive['firstname'];
$lastname=$retrive['lastname'];
$phone=$retrive['phone'];
$region=$retrive['region'];
$address=$retrive['address'];
$curriculum=$retrive['curriculum'];
$class=$retrive['class'];

// echo "Name: ".$firstname." ".$lastname."<br>";
// echo "Phone: ".$phone."<br>";
// echo "Region: ".$region."<br>";
// echo "Address: ".$address."<br>";
// echo "Curriculum: ".$curriculum."<br>";
// echo "Class: ".$class."<br>";
// echo "Username: ".$username;

$_SESSION['$username']=$retrive['username'];

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
					<li><a href="home.php"><i class="fa fa-home"><br>Home</i></a></li>
					<li><a href="profile.php"><i class="fa fa-user-circle"><br>Profile</i></a></li>
					<li><a href="findteacher.php"><i class="fa fa-search"><br>Find Teachers</i></a></li>
					<li><a href="status.php"><i class="fa fa-users"><br>Status</i></a></li>
					<li><a href="message.php"><i class="fa fa-telegram"><br>Messages</i></a></li>
					<li><a href="logout.php"><i class="fa fa-sign-out"><br>Logout</i></a></li>
				</ul>
			</nav>
		</div>
	</div>
	</header>
	<div class="profileinfo">
		<p><?php  if($image = " "){
			echo "<img width = '125' height = '125' src ='uploads/default.jpg' alt = 'default profile picture'>";

		} ?><p>
		<p><?php echo "Name: ".$firstname." ".$lastname."<br>"; ?></p>
		<p><?php echo "Username: ".$username; ?></p>
		<p><?php echo "Phone: ".$phone."<br>";?></p>
		<p><?php echo "Region: ".$region."<br>"; ?></p>
		<p><?php echo "Address: ".$address."<br>"; ?></p>
		<p><?php echo "Curriculum: ".$curriculum."<br>"; ?></p>
		<p><?php echo "Class: ".$class."<br>"; ?></p>
	</div>
	
	<div class="editprofilebtn">
		<a href="editprofile.php">Edit Profile</a>
	</div>
	

</body>
</html>
