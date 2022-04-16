<?php 
    include 'partials/header-student.php';

    if( isset($_COOKIE['logged_in_as']) && isset($_COOKIE['logged_in_user']) ){

		$type = $_COOKIE['logged_in_as'];
		$username = $_COOKIE['logged_in_user'];

		$sql = "SELECT * FROM $type WHERE username='$username'";
		$result = $conn->query($sql);
		$row = mysqli_fetch_array($result);

		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		
	}else {
		header("Location:signinas.php");
	}


    if (isset($_POST["submit"])){

        $subjects=$_POST['subjects'];
        $days=$_POST['days'];
        $prefferedinstitution=$_POST['prefferedinstitution'];
        $fee=$_POST['fee'];
        



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

        echo '<script type="text/javascript"> alert("Offer posted sucessfully.");window.location="youroffers.php";</script>';

    }


 ?>

<html>
<head>
<link rel="stylesheet" href="css/signin.css">
	<title>Post Tuition Offer</title>
	<style>
		body {
			background-color: #1c6860;
		}
		@media only screen and (max-width: 600px) {
			.registrationbox{
                width: 100%;
            }
		}
	</style>
</head>


<body>

<div class="full-height">


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

    </div>
</body>


<?php 
    include 'partials/footer.php';
?>