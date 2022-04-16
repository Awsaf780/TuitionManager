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

?>



	<?php 

	if(isset($_POST["Delete"])){
		$id=mysqli_real_escape_string($conn,$_POST['offer_id']);

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

<head>
	<title>Your Offers</title>
	<style>
		body {
			background-color: #1c6860;
		}
		.bg-primary {
			background: rgb(1 86 86)!important;
		}
		.card-title {
			color: grey;
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

	<div class="container tuition-offers mt-5">
		<h3 style="color: white; text-align: center">Offers Posted by You</h3>
		<div class="row row-cols-1 row-cols-md-3 mt-5">
		<?php 
				// include 'dbh.php';
				$sql="SELECT * FROM tuitionoffers WHERE username='$username'";
				$result=$conn->query($sql);


				while($row = mysqli_fetch_assoc($result))
				{

					echo "<div class=\"col mb-5\">
							<div class=\"card text-center \">
								<div class=\"card-header bg-primary text-white \">".$row['firstname']." ".$row['lastname']."</div>

								<div class=\"card-body\">
									<h5 class=\"card-title\">".$row['subjects']."</h5><hr>
									<p class=\"card-text\">Preferred Instituion: ". $row['prefferedinstitution'] ."</p>
									<p class=\"card-text\">Location: ".$row['address']." </p>
									<p class=\"card-text\">Fee: ". $row['fee'] ." /= BDT</p><hr>

									<form action=\"youroffers.php\" method=\"post\">
									<input type=\"hidden\" name=\"offer_id\" value=\"".$row['id']."\">
									<input class=\"btn btn-danger\" type=\"submit\" name=\"Delete\" value=\"Delete\">
									</form>
									
								</div>

								<div class=\"card-footer\">".$row['days']." days a week</div>

							</div>
							</div>";
				}
			?>
		
			</div>
	</div>
</div>

</body>
<?php
	include 'partials/footer.php';
?>