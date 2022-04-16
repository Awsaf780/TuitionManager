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

	if(isset($_POST["submit"]))
	{
		$student=$username;
		$teacher=$_POST['search_text'];

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

		echo '<script type="text/javascript"> alert("Tutor added");window.location="currenttutor.php";</script>';
	}
?>


<head>
<link rel="stylesheet" href="css/signin.css">
	<title>Add Tutor</title>
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

	 
			<!-- adding tutor -->
			<div class="loginbox">
			<form action="addtutor.php" method="post">
				<h1>Add Tutor</h1>
				<br><br>
				<p>Teacher Username</p>
				<input type="text" list="result_t" name="search_text" id="search_text" placeholder="Enter teacher username" required="">
				<div id="result">
				</div>
				<br>
				<input type="submit" name="submit" value="submit">
				<br>
				<center><a href="home.php">Home</a></center>
			</form>
			</div>

	</div>


<?php

	// Live search code

	$output='';

	if(isset($_POST["query"])){
		$search=mysqli_real_escape_string($conn, $_POST["query"]);
		// $query="SELECT * FROM customerdetails WHERE name LIKE '%".$search."%'";
		$query="SELECT username FROM teacher WHERE username LIKE '%".$search."%'";
		
	}
	else{
		$query="SELECT username FROM teacher ORDER BY username";
	}
	$result= mysqli_query($conn, $query);
	if(mysqli_num_rows($result)>0){

		$output .='<datalist id="result_t">';
		while($row=mysqli_fetch_array($result)){
			
			$output .='<option value="'.$row['username'].'">'.$row['username'].'</option>';
		}
		$output .='</datalist>';

		echo $output;
			
	}
	else{
		echo nl2br("\nNo Such Teacher");
	}



?>


<script>
$(document).ready(function(){
	//load_data();
	function load_data(query){
		$.ajax({
			
			method:"post",
			data:{query:query},
			success:function (data)
			{
				$('#result').html(data);
			},
			url:"addtutor.php"
		});
	}

	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != ''){
			load_data(search);
		}
		else{
			load_data();
		}
	});


});
</script>

<?php
	include 'partials/footer.php';
?>