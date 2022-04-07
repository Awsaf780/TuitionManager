<?php 



 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="review.css">
<body>
	<center><h3 style="color: white;">Your Offers</h3></center>
	<div class="tables">
	<table>
		<tr>
			<th>ID</th>
			<th>Subjects</th>
			<th>Days</th>
			<th>Preffered Institution</th>
			<th>Fee(Tk.)</th>
		</tr>
		
		<?php
include 'dbh.php';
include 'session.php';

// $username=$_SESSION['$username'];

$sql="SELECT * FROM tuitionoffers WHERE username='$username'";
$result=$conn->query($sql);
while($row = mysqli_fetch_assoc($result))
{
	echo 
		"<tr>
			<td>" .$row['id']."</td>
			<td>" .$row['subjects']."</td>
			<td>" .$row['days']."</td>
			<td>" .$row['prefferedinstitution']."</td>
			<td>" .$row['fee']."</td>
		</tr>";
}


 ?>



	</table>
	</div>
	<br><br>
	<div class="deloff">
		<center><p>Delete Offer</p></center>
	</div>
	
	<div class="searchbar">
	<form action="youroffers.php" method="post">
		
		<input type="text" name="id" placeholder="Enter offer ID" required="">
		<input type="submit" name="submit" value="delete">
	</form>
	</div>

	<?php 

	// $sql="SELECT * FROM tuitionoffers WHERE username='$username'";
	// 	$result=$conn->query($sql);
	// 	$retrive=mysqli_fetch_array($result);
	// 	$username1=$retrive['username'];
	// 	echo $username1;


	if(isset($_POST["submit"])){
		$id=mysqli_real_escape_string($conn,$_POST['id']);

		$sql = "SELECT * FROM `tuitionoffers` WHERE id='$id'";
		$result=$conn->query($sql);
		$retrive=mysqli_fetch_array($result);
		$username1=$retrive['username'];
		// echo $username1;

		
		if($username1==$username){
			$sql = "DELETE FROM `tuitionoffers` WHERE `tuitionoffers`.`id` = $id";
			$result=$conn->query($sql);

			// header("Location:youroffers.php");
			echo '<script type="text/javascript"> alert("Deleted");window.location="youroffers.php";</script>';
		}
		else{
			echo '<script type="text/javascript"> alert("Error : Invalid id") </script>';
		}
	}



	 ?>



	<br>
	<div class="homebtn">
		<center><a href="home.php">Home</a></center>
	</div>
	
</body>
</html>
