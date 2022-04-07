<!-- <?php 
// include 'dbh.php';
 ?> -->

 <?php 
if (isset($_POST["submit"]))
{
	include 'dbh.php';
	include 'session.php';

$subjects=$_POST['subjects'];
$days=$_POST['days'];
$prefferedinstitution=$_POST['prefferedinstitution'];
$fee=$_POST['fee'];

$username=$_SESSION['username'];


$sql="SELECT * FROM student WHERE username='$username'";
$result=$conn->query($sql);
$retrive=mysqli_fetch_array($result);

$firstname=$retrive['firstname'];
$lastname=$retrive['lastname'];
$phone=$retrive['phone'];
$region=$retrive['region'];
$address=$retrive['address'];
$curriculum=$retrive['curriculum'];
$class=$retrive['class'];


$sql1="INSERT INTO tuitionoffers (username,firstname,lastname,subjects,days,prefferedinstitution,fee,address,class) VALUES ('$username','$firstname','$lastname','$subjects','$days','$prefferedinstitution','$fee','$address','$class')";

$result1=$conn->query($sql1);

// header("Location:home.php");

echo '<script type="text/javascript"> alert("Offer posted sucessfully.");window.location="home.php";</script>';

}


 ?>

<html>
<head>
	<title>Post Add</title>
</head>
<link rel="stylesheet" href="profilestyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
    <header>
        <div class="container">
        <div class="icon-bar">
            <nav>
                <ul>    
                    <li><a href="home.php"><i class="fa fa-home"><br>Home</i></a></li>
                    <li><a href="profile.php"><i class="fa fa-user-circle"><br>Profile</i></a></li>
                    <li><a href="findteacher.php"><i class="fa fa-search"><br>Find Teachers</i></a></li>
                    <li><a href="status.php"><i class="fa fa-users"><br>Status</i></a></li>
                    <li><a href="message.php"><i class="fa fa-telegram"><br>Messages</i></a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"><br>Logout</i></a></li>
                </ul>
            </nav>
        </div>
    </div>
    </header>
    <div class="registrationbox">
	<center><h1>Post Add</h1></center>
	<form action="findteacher.php" method="post">
		<p>Subjects</p>
		<input type="text" name="subjects" placeholder="Enter Subjects" required="">
		<p>Days per week</p>
		<input type="number" name="days" placeholder="Number of days" required="" min="1" max="7">
		<p>Fee(Tk.)</p>
		<input type="number" name="fee" placeholder="Enter fee" required="" min="1">
		<p>Preffered Institution</p>
            <br>
            <select name="prefferedinstitution">
                <option value="Any">Any</option>
                <option value="BUET">BUET</option>
                <option value="DU">DU</option>
                <option value="NSU">NSU</option>
                <option value="BRAC">BRAC</option>
                <option value="DMC">DMC</option>
                <option value="AUST">AUST</option>
            </select>
            <br>
        <input type="submit" name="submit" value="submit">
	</form>
    </div>
</body>
</html>
