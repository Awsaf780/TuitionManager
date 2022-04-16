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

<head>
	<style>
		body {
			background-color: #215a80;
		}
		.bg-primary {
			background: rgb(25 18 65)!important;
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


<div class="full-height">

	<!-- <div class="container">
		<a href="searchstudent.php">Search</a>
	</div> -->

	<div class="container tuition-offers mt-5">
		<h1 style="color: white; text-align: center;">Tuition Offers</h1><br>

		<!-- <form action="findstudent.php"> -->
			<div class="input-group mb-3">
				<input type="text" class="form-control" placeholder="Search by Subject" name="search_subject" id="search_subject">
				<div class="input-group-append">
					<span class="input-group-text">Subject</span>
				</div>
			</div>

			
		<!-- </form> -->


		<div id="result">

		<div class="row row-cols-1 row-cols-md-3 mt-5">
		<?php 
				// include 'dbh.php';
				$sql="SELECT * FROM tuitionoffers";
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

									<form action=\"message.php\" method=\"post\" class=\"form-inline\">
										<div class=\"form-group mb-2\">
										<label for=\"staticEmail2\" class=\"sr-only\">Username</label>
										<input type=\"text\" class=\"form-control\" id=\"staticEmail2\" name=\"to\" value=\"".$row['username']."\" disabled>
										<input type=\"hidden\" class=\"form-control\" id=\"staticEmail2\" name=\"to\" value=\"".$row['username']."\">
										
										</div>

										<div class=\"form-group mx-sm-3 mb-2\">
										<label for=\"inputPassword2\" class=\"sr-only\">Message</label>
										<input type=\"text\" class=\"form-control\" id=\"inputPassword2\" required name=\"message\" placeholder=\"Start Conversation ..\">
										</div>

										<button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary mb-2\"><i class=\"fa-solid fa-arrow-right\"></i></button>
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







<?php
	include 'partials/footer.php';
?>


<script>
$(document).ready(function(){
	//load_data();
	function load_data(query){
		$.ajax({
			
			method:"post",
			data:{subject:query},
			success:function (data)
			{
				$('#result').html(data);
			},
			url:"findstudent_live.php"
		});
	}

	$('#search_subject').keyup(function(){
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
