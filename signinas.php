<?php 
	include './partials/header.php';
?>

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
						<a href="signin.php" class="btn btn-success" style="width: 100%;">Student Sign In</a>
					</div>
					</div>
				</div>

				<div class="col mb-5">
					<div class="card" style="max-width: 400px;">
						<img src="images/sign-in-teacher.jpg" class="card-img-top" alt="..." style="height: 300px; object-fit: cover;">
					<div class="card-body">
						<a href="tsignin.php" class="btn btn-danger" style="width: 100%;">Teacher Sign In</a>
					</div>
					</div>
				</div>
			

		</div>
		
	</div>

	

</div>


	
<?php 
	include './partials/footer.php';
?>