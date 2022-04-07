
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="review.css">
<body>
	<div class="registrationbox">
	<form action="postreview.php" method="post">
		<h1>Review Teacher</h1>
		<p>Enter Teacher Username</p>
		<input type="text" name="tusername" placeholder="Teacher Username" required="">
		<p>Rate (Stars)</p>
		<input type="number" name="rate" required="" min="1" max="5">
		<p>Review</p>
		<!-- <input type="text" name="review" placeholder="Write your review here . . . ." cols="30" rows="10"> -->
		<textarea name="review" placeholder="Write your review here ...." cols="30" rows="3"></textarea>
		<input type="submit" name="submit" value="Submit">
	</form>
	</div>
	<div class="home">
		<br><br><br>
		<center><a href="status.php">Back</a></center>
	</div>
</body>
</html>

<?php 
if(isset($_POST["submit"])){
include 'dbh.php';
include 'session.php';



$tusername=$_POST['tusername'];
$rate=$_POST['rate'];
$review=$_POST['review'];

$sql1="SELECT * FROM  reviews WHERE student='$username' AND teacher='$tusername'";
$result1=$conn->query($sql1);

if(!$row=$result1->fetch_array()){
	$sql="INSERT INTO reviews (student,teacher,star,review) VALUES ('$username','$tusername','$rate','$review')";
	$result=$conn->query($sql);

}
else{
	echo '<script type="text/javascript"> alert("You have already reviewed this teacher.") </script>';
}



}

 ?>
