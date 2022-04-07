<?php 


 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
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
	<h1 style="text-align: center; color: white;">Your Students</h1>
	<div class="tables">
	<table>
		<tr>
 			<th>Student Name</th>
 			<th>Phone</th>
	
	<?php 
	include 'dbh.php';
	include 'session.php';

	$username=$_SESSION['username'];

	$sql="SELECT * FROM currenttuitions WHERE teacher='$username'";
	$result=$conn->query($sql);
	// $retrive=mysqli_fetch_array($result);

	while($row = mysqli_fetch_assoc($result)){
	echo 
			"<tr>
				<td>" . $row['student'] . "</td>
				<td>" . $row['studentphone']. "</td>
			</tr>" ;
	}
	 ?>
	 </table>
	</div>
</body>
</html>