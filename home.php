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

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
	<div class="welcome">
		<h4 class="serif">Welcome to Knowledge Hub <?php echo $firstname." ".$lastname."!"; ?></h4>
		</div>

	<div class="quotes">
		<h6 class="serif">"Education is the most powerful weapon which you can use to change the world" - Nelson Mandela</h6>
		
	</div>

</body>
</html>