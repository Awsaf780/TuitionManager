<?php 
include 'session.php';

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="review.css">
<body>
	<div class="loginbox">
	<form action="deletetutor.php" method="post">
		<h1>Delete tutor</h1>
		<br><br>
		<p>Teacher username</p>
		<input type="text" name="tusername" placeholder="Enter teacher username">
		<br><br><br>
		<input type="submit" name="submit" value="submit">
		<br>
		<center><a href="home.php">Home</a></center>
	</form>
	</div>
	<?php 
	if(isset($_POST["submit"]))
	{
		include 'dbh.php';
		$student=$_SESSION['username'];
		$teacher=$_POST['tusername'];

		$sql1="DELETE FROM currenttuitions WHERE student='$student' AND teacher='$teacher'";
		$result=$conn->query($sql1);
		// header("Location:currenttutor.php");

		echo '<script type="text/javascript"> alert("Tutor deleted");window.location="currenttutor.php";</script>';
	}
	 ?>

</body>
</html>