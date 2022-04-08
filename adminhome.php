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

<div class="full-height">
	
	<div class="jumbotron jumbotron-fluid jumbotron-admin">
      <div class="container admin-member-title">
		  <h1 style="color: white;"><center>Welcome, <b><?php echo $firstname." ".$lastname; ?></b></center></h1>
      </div>
    </div>

	<div class="container">
		<h1>Data</h1>
		<p>Add SQL Data, like number of teacher etc ?</p>
	</div>
	
</div>


<?php 
	include './partials/footer.php';
?>