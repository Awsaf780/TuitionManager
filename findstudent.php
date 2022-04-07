<?php 
	include 'dbh.php';
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

<div class="searchstudentbutton">
	<br><br>
	<a href="searchstudent.php">Search</a>
	<br><br>
</div>

	<div class="tables">
		<center><p style="font-weight: bold;">Tuition Offers</p></center>
		<table>
			<tr>
				<th>Name</th>
				<th>Username</th>
				<th>Subjects</th>
				<th>Days</th>
				<th>Preffered Institution</th>
				<th>Address</th>
				<th>Fee (Tk.)</th>
			</tr>
			<?php 
			include 'dbh.php';
			$sql="SELECT * FROM `tuitionoffers`";
			$result=$conn->query($sql);
			while($row = mysqli_fetch_assoc($result))
			{
				echo 
				"<tr>
					<td>" .$row['firstname']." ".$row['lastname']. "</td>
					<td>" .$row['username']. "</td>
					<td>" .$row['subjects']. "</td>
					<td>" .$row['days']. "</td>
					<td>" .$row['prefferedinstitution']."</td>
					<td>" .$row['address']."</td>
					<td>" .$row['fee']."</td>
				</tr>";
			}
			 ?>
		</table>
	</div>

</body>
</html>

