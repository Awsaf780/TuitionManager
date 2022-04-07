<?php 
include 'dbh.php';

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
 	<div class="tables">
 		<div class="studenttable">
 			<!--**************************Students************************* -->
 	<table>
 		<caption><p>Student</p></caption>
 		<tr>
 			<th>Uesername</th>
 			<th>Password</th>
 			<th>First Name</th>
 			<th>Last Name</th>
 			<th>Phone</th>
 			<th>Region</th>
 			<th>Address</th>
 			<th>Cirruculum</th>
 			<th>class</th>
 		</tr>
 	 	
		<?php 
			$sql="SELECT * FROM `student`";
			$result=$conn->query($sql);

			while($row = mysqli_fetch_assoc($result))
			{   //Creates a loop to loop through results
			echo 
			"<tr>
				<td>" . $row['username'] . "</td>
				<td>" . $row['password']. "</td>
				<td>" .$row['firstname']. "</td>
				<td>" .$row['lastname']."</td>
				<td>" .$row['phone']. "</td>
				<td>" .$row['region']. "</td>
				<td>" .$row['address']. "</td>
				<td>" .$row['curriculum']. "</td>
				<td>" .$row['class']. "</td>
			</tr>" ; 
		}

	 	?>
	</table>
 		</div>
 		
	<br><br>

		<div class="teachertable">
			<!--************************Teachers************************ -->
 	<table>
 		<caption><p>Teacher</p></caption>
 		<tr>
 			<th>Uesername</th>
 			<th>Password</th>
 			<th>First Name</th>
 			<th>Last Name</th>
 			<th>Phone</th>
 			<th>Institution</th>
 			<th>Address</th>
 		</tr>

 		<?php 
 			$sql1="SELECT * FROM `teacher`";
			$result1=$conn->query($sql1);

 			while($row = mysqli_fetch_assoc($result1))
 			{   //Creates a loop to loop through results
			echo 
			"<tr>
				<td>" . $row['username'] . "</td>
				<td>" . $row['password']. "</td>
				<td>" .$row['firstname']. "</td>
				<td>" .$row['lastname']."</td>
				<td>" .$row['phone']. "</td>
				<td>" .$row['institution']. "</td>
				<td>" .$row['address']. "</td>
			</tr>" ; 
		}
 		 ?>
 	</table>
 	</div>
		</div>

 
 
 </body>
 </html>