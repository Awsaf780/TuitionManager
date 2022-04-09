<?php 
	include 'dbh.php';

	if(isset($_COOKIE['logged_in_user'])) {

		$username = $_COOKIE['logged_in_user'];
		$type = $_COOKIE['logged_in_as'];

		$sql = "SELECT * FROM $type WHERE username='$username'";
		$result = $conn -> query($sql);
		$retrive = mysqli_fetch_assoc($result);

		$firstname = $retrive['firstname'];
		$lastname = $retrive['lastname'];

		if($type == 'admin') {
			include './partials/header-admin.php';
		  }else if ($type == 'teacher') {
			include './partials/header-teacher.php';
		  }else if ($type == 'student') {
			include './partials/header-student.php';
		  }
	}
	else {
		header("Location:signinas.php");
	}
?>


<?php 
    error_reporting(0);
    if(isset($_POST["submit"]))
    {

        $to = $_POST['to'];
        $message = $_POST['message'];
        $from = $_COOKIE['logged_in_user'];

        $sql ="INSERT INTO `messages` (`message_to`, `message_from`, `message`) VALUES ('$to','$from','$message')";
        $result=$conn->query($sql);
    }
?>

<div class="container full-height mt-5">
    <h1>Messages</h1>
    <small class="form-text text-muted" id="no_msg">  </small>

    <div class="getmsg mt-5">
		<div class="accordion" id="accordionExample">
        <?php 	
					$unique_users = "SELECT DISTINCT message_from FROM `messages` WHERE message_to='$username'";
					$unique_res = $conn->query($unique_users);
					if(mysqli_num_rows($unique_res) > 0) {
						while($row = mysqli_fetch_assoc($unique_res)){
							$distinct_user = $row['message_from'];

							echo '
							<div class="card">
								<div class="card-header" id="headingOne">
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										'. $distinct_user .'
									</button>
								</h2>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">';

								echo '<form action="message.php" method="post">
											<input type="hidden" name="to" value="' . $distinct_user .'">
											
											<input type="text\" name="message" placeholder="Send a reply" required>
										
										<input type="submit" name="submit" value="Send">
										</form>';
									
								$sql="SELECT * FROM messages WHERE (message_from='$distinct_user' AND message_to='$username') OR (message_to='$distinct_user' AND message_from='$username') ORDER BY time DESC LIMIT 10";
								$result=$conn->query($sql);

								if(mysqli_num_rows($result) > 0){

									while($row = mysqli_fetch_assoc($result)){
										echo '<p>'.$row['message'].'</p>';
									}}

							echo '
								</div>
								</div>
							</div>';
						}
					}
						else {
							echo "<div class=\"sendmsg\">
									<h5>Start a New Conversation</h5>
									<form action=\"message.php\" method=\"post\">
										<input type=\"hidden\" name=\"from\" value=\"".$_COOKIE['logged_in_user']."\">
										<p>Send To</p>
										<input type=\"text\" name=\"to\" placeholder=\"Enter recipient username\" required>
										<p>Message</p>
										<input type=\"text\" name=\"message\" placeholder=\"Type message\" required>
										<input type=\"submit\" name=\"submit\" value=\"Send\">
									</form>
								</div>";
						}
					?>
		</div>

    </div>




</div>



<?php 
	include './partials/footer.php';
?>
 	
