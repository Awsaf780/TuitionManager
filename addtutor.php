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
 	<!-- adding tutor -->
 	<div class="loginbox">
	<form action="addtutor.php" method="post">
		<h1>Add tutor</h1>
		<br><br>
		<p>Teacher username</p>
		<input type="text" name="tusername" placeholder="Enter teacher username" required="">
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

		// teacher's phone
		$teacherphone="SELECT phone FROM teacher WHERE username='$teacher'";
		$result=$conn->query($teacherphone);
		$retrive=mysqli_fetch_array($result);
		$phone=$retrive['phone'];

		//student phone
		// teacher's phone
		$studentphone="SELECT phone FROM student WHERE username='$student'";
		$result=$conn->query($studentphone);
		$retrive=mysqli_fetch_array($result);
		$sphone=$retrive['phone'];

		$sql1="INSERT INTO currenttuitions (student,teacher,teacherphone,studentphone) VALUES ('$student','$teacher','$phone','$sphone')";
		$result=$conn->query($sql1);

		echo '<script type="text/javascript"> alert("Tutor added");window.location="home.php";</script>';
	}


	 ?>
 
 </body>
 </html>