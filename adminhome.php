<?php 
// session_start();
include 'session.php';
include 'dbh.php';


$username=$_SESSION['username'];

$sql="SELECT * FROM admin WHERE username='$username'";
$result=$conn->query($sql);
$retrive=mysqli_fetch_assoc($result);
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
					<li><a href="adminhome.php"><i class="fa fa-home"><br>Home</i></a></li>
					<li><a href="users.php"><i class="fa fa-users"><br>Users</i></a></li>
					<li><a href="removeuser.php"><i class="fa fa-user-times"><br>Remove Users</i></a></li>
					<li><a href="message.php"><i class="fa fa-telegram"><br>Messages</i></a></li>
					<li><a href="logout.php"><i class="fa fa-sign-out"><br>Logout</i></a></li>
				</ul>
			</nav>
		</div>
	</header>
	<div class="welcome">
		<h1><center>Welcome</center></h1>
		<h2><center><?php echo $firstname." ".$lastname; ?></center></h2>
	</div>

</body>
</html>