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

<div class="container full-height mt-5">

<h1>Registered Students</h1>
<div class="teacher-table table-responsive">
		

		<table class="table table-striped">
			<thead class="thead-dark">
				<tr>
				<th scope="col">#</th>
				<th scope="col">Username</th>
				<th scope="col">First Name</th>
				<th scope="col">Last Name</th>
				<th scope="col">Phone</th>
				<th scope="col">Region</th>
				<th scope="col">Address</th>
				<th scope="col">Curriculum</th>
				<th scope="col">Class</th>
				
				</tr>
			</thead>
			<tbody>
			<?php 
				$sql="SELECT * FROM `student`";
				$result=$conn->query($sql);

				while($row = mysqli_fetch_assoc($result))
				{   //Creates a loop to loop through results
				echo 
				"<tr>
					<th>0</th>
					<td>" . $row['username'] . "</td>
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
			</tbody>


		</table>
	</div>

				<br><br>

	<h1>Registered Teachers</h1>
	<div class="teacher-table  table-responsive">
		

		<table class="table table-striped">
			<thead class="thead-dark">
				<tr>
				<th scope="col">#</th>
				<th scope="col">Username</th>
				<th scope="col">First Name</th>
				<th scope="col">Last Name</th>
				<th scope="col">Phone</th>
				<th scope="col">Institution</th>
				<th scope="col">Address</th>
				
				</tr>
			</thead>
			<tbody>
			<?php 
				$sql="SELECT * FROM `teacher`";
				$result=$conn->query($sql);

				while($row = mysqli_fetch_assoc($result))
				{   //Creates a loop to loop through results
				echo 
				"<tr>
					<th>0</th>
					<td>" . $row['username'] . "</td>
					<td>" .$row['firstname']. "</td>
					<td>" .$row['lastname']."</td>
					<td>" .$row['phone']. "</td>
					<td>" .$row['institution']. "</td>
					<td>" .$row['address']. "</td>
				</tr>" ; 
				}

	 		?>
			</tbody>


		</table>
		</div>
		</div>


	
<?php 
	include './partials/footer.php';
?>