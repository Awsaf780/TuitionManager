<?php 

	include 'partials/header-teacher.php';

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

<div class="full-height">

	<div class="container">
		<a href="searchstudent.php">Search</a>
	</div>

	<div class="container tuition-offers mt-5">
		<h1>Tuituion Offers</h1>
		<div class="row row-cols-1 row-cols-md-3 mt-5">
		<?php 
				// include 'dbh.php';
				$sql="SELECT * FROM `tuitionoffers`";
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
									
									<button type=\"button\" class=\"btn btn-primary\">Accept Offer</button>
								</div>

								<div class=\"card-footer\">".$row['days']." days a week</div>

							</div>
							</div>";
				}
			?>
		
			</div>



	</div>

		


</div>


<?php
	include 'partials/footer.php';
?>