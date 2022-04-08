
<?php
	include 'dbh.php';
	if (isset($_POST["t_submit"])){

		$username=$_POST['t_user'];
		$password=$_POST['t_pass'];

		$sql="SELECT * FROM teacher WHERE username='$username' AND password ='$password'";
		$result=$conn->query($sql);

		if(!$row=$result->fetch_assoc()){
			echo '<script>document.getElementById("invalid_teacher").innerHTML = "Invalid Credentials"; </script>';
			// echo "\$(window).load(function(){\$('#teacher').modal('show')}) ";
		}
		else{
			$_COOKIE['teacher']=$_POST['username'];
			header("Location:thome.php");
		}
	}

	if (isset($_POST["s_submit"])){

		$username=$_POST['s_user'];
		$password=$_POST['s_pass'];

		$sql="SELECT * FROM student WHERE username='$username' AND password ='$password'";
		$result=$conn->query($sql);

		if(!$row=$result->fetch_assoc()){
			echo '<script>document.getElementById("invalid_teacher").innerHTML = "Invalid Credentials"; </script>';
			// echo "\$(window).load(function(){\$('#teacher').modal('show')}) ";
		}
		else{
			$_COOKIE['student']=$_POST['username'];
			header("Location:home.php");
		}
	}

	
?>


<?php 
	include './partials/header.php';
?>
<head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}


span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
	padding: 25px 15px;
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 600px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
  .modal-content {
	  width: 80%;
  }
}
</style>
</head>



<div class="container mt-5 full-height">
	<div class="sign-in">
		<div class="sign-in-title">
			<h1>Sign In</h1>
		</div>

		<div class="sign-in-cards">

				<div class="col mb-5">
					<div class="card" style="max-width: 400px;">
						<img src="images/sign-in-student.jpg" class="card-img-top" alt="..." style="height: 300px; object-fit: cover;">
					<div class="card-body">
						<!-- <a href="signin.php" class="btn btn-success" style="width: 100%;">Student Sign In</a> -->
						<a class="btn btn-success" style="width: 100%;" onclick="document.getElementById('student').style.display='block'" style="width:auto;">Student Sign In</a>
					</div>
					</div>
				</div>

				<div class="col mb-5">
					<div class="card" style="max-width: 400px;">
						<img src="images/sign-in-teacher.jpg" class="card-img-top" alt="..." style="height: 300px; object-fit: cover;">
					<div class="card-body">
						<!-- <a href="tsignin.php" class="btn btn-danger" style="width: 100%;">Teacher Sign In</a> -->
						<a class="btn btn-danger" style="width: 100%;" onclick="document.getElementById('teacher').style.display='block'" style="width:auto;">Teacher Sign In</a>
					</div>
					</div>
				</div>
			

		</div>
		
	</div>

	

</div>


<div id="teacher" class="modal">
  
  <form class="modal-content animate" action="signinas.php" method="post">
    <div class="imgcontainer">
	
      <span onclick="document.getElementById('teacher').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
	<h3>Teacher Sign In</h3>
      <label for="t_user"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="t_user" required>

      <label for="t_pass"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="t_pass" required>
        
      <button value="t_submit" name="t_submit" type="submit">Login</button>
	  <small class="form-text text-muted text-center" id="invalid_teacher">  </small>
    </div>

  </form>
</div>
	

<div id="student" class="modal">

  <form class="modal-content animate" action="signinas.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('student').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
	<h3>Student Sign In</h3>
      <label for="s_user"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="s_user" required>

      <label for="s_pass"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="s_pass" required>
        
      <button value="s_submit" name="s_submit" type="submit">Login</button>
	  <small class="form-text text-muted text-center" id="invalid_student">  </small>
    </div>

  </form>
</div>
	




<script>
// Get the modal
var tmodal = document.getElementById('teacher');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == tmodal) {
        tmodal.style.display = "none";
    }
}
</script>

<script>
// Get the modal
var smodal = document.getElementById('student');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == smodal) {
        smodal.style.display = "none";
    }
}
</script>






<?php 
	include './partials/footer.php';
?>