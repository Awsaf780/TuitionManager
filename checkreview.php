<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="review.css">
<body>
	<div class="searchbar">
	<form action="checkreview.php" method="post">
		<br><br>
		<input type="text" name="tname" placeholder="Enter teacher name" required="">
		<input type="submit" name="submit" value="submit">
	</form>
	</div>
	<br>
	<center><h3 style="color: white;">Teacher Username : <?php if(isset($_POST["submit"])){ echo $_POST['tname'];} ?></h3></center>
	<div class="tables">
	<table>
		<tr>
			<th>Username</th>
			<th>Reviews</th>
			<th>Rating</th>
		</tr>
		
		<?php
if(isset($_POST["submit"])){
include 'dbh.php';

$tname=$_POST['tname'];

$sql="SELECT * FROM reviews WHERE teacher='$tname'";
$result=$conn->query($sql);
while($row = mysqli_fetch_assoc($result))
{
	echo 
		"<tr>
			<td>" .$row['student']."</td>
			<td>" .$row['review']."</td>
			<td>" .$row['star']."</td>
		</tr>";
}

}
 ?>



	</table>
	</div>
	<br><br>
	
	<?php 
	$avg=0;
	if(isset($_POST["submit"])){
	$tname=$_POST['tname'];
	$sql = "SELECT star FROM `reviews` WHERE teacher='$tname'";
	$result=$conn->query($sql);

	$sum=0;
	$count=0;
	while($row = mysqli_fetch_assoc($result))
	{
		$a=$row['star'];
		$sum=$sum+$a;
		$count=$count+1;
	}
	$avg=$sum/$count;

	// echo $avg;
}
	 ?>
	 <center><p style="color: white; font-size: 20px;">Total rating : <?php echo $avg; ?> </p></center>

	<div class="home">
		<br><br><br>
		<center><a href="status.php">Back</a></center>
	</div>
</body>
</html>
