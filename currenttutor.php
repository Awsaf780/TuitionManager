<?php 



 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
 <link rel="stylesheet" href="profilestyle.css">
<body>
	<center><h1 style="color: white">Your tutors</h1></center>
	<div class="tables">
	<table>
		<tr>
 			<th>Teacher Name</th>
 			<th>Phone</th>
	
	<?php 
	include 'dbh.php';
	include 'session.php';

	$username=$_SESSION['username'];

	$sql="SELECT * FROM currenttuitions WHERE student='$username'";
	$result=$conn->query($sql);
	// $retrive=mysqli_fetch_array($result);

	while($row = mysqli_fetch_assoc($result)){
	echo 
			"<tr>
				<td>" . $row['teacher'] . "</td>
				<td>" . $row['teacherphone']. "</td>
			</tr>" ;
	}
	 ?>
	 </table>
	 <br>
	</div>
	<div class="checkreview">
	<a href="checkreview.php">Check Review</a>
	</div>
	<br><br>
	<div class="homebtn">
		<center><a href="home.php">Home</a></center>
	</div>
	
</body>
</html>