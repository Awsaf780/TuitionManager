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