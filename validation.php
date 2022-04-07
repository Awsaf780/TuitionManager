
<?php 
if (isset($_POST["submit"])){

include 'dbh.php';

$username=$_POST['username'];
$password=$_POST['password'];
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$phone=$_POST['phone'];
$region=$_POST['region'];
$address=$_POST['address'];
$curriculum=$_POST['curriculum'];
$class=$_POST['class'];


$sql = "SELECT * FROM student WHERE username='$username'";


$result=$conn->query($sql);



if(!$row = mysqli_fetch_array($result)){
	echo "ok";
}
else{
	// header("Location:validation.php?username=exists");
	// echo "username exists";
	
}

}
 ?>