<?php
include 'dbh.php';
// Live search code

$output='';

// subject query
if(isset($_POST["subject"])){
	$search=mysqli_real_escape_string($conn, $_POST["subject"]);
	$query="SELECT * FROM tuitionoffers WHERE subjects LIKE '%".$search."%'";
}
else{
	$query="SELECT * FROM tuitionoffers";
}


$result= mysqli_query($conn, $query);

if(mysqli_num_rows($result)>0){

	$output .='<div class="row row-cols-1 row-cols-md-3 mt-5">';

	while($row=mysqli_fetch_array($result)){
		
		$output .="<div class=\"col mb-5\">
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

	$output .= '</div>';

	echo $output;
		
}
else{
	echo nl2br("\nNo Such Offers");
}



?>