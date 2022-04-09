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

<head>
    <style>
        .card-header{
            background: dodgerblue;
        }
        .msg-title {
            color: white;
        }
        .msg-title:hover {
            color: white;
        }
        .alert {
            border-radius: 30px;
            width: auto;
            margin: 15px 150px;
        }
		.alert-primary {
            margin-left: -5px;
        }
        .alert-dark {
            margin-right: -10px;
        }
		.conversation {
			padding: 20px;
			border: 1px solid;
			border-radius: 15px;
			min-height: 50vh;
		}
		.convo-names {
			border-right: 1px solid;
		}
        
    </style>
</head>


<div class="container full-height mt-5">
    <h1>Messages</h1>
    <small class="form-text text-muted" id="no_msg">  </small>

    <div class="getmsg mt-5">
                <h5>Start a New Conversation</h5>
                <form class="form-inline" action="message.php" method="post">
                <input style="display: none;" name="from" value="<?php echo $username; ?>">
                    <div class="form-group mb-2">
                        <label for="staticEmail2" class="sr-only">Username</label>
                        <input type="text" class="form-control" id="staticEmail2" name="to" placeholder="Username" required>
                    </div>

                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Message</label>
                        <input type="text" class="form-control" id="inputPassword2" required name="message" placeholder="Type Message ..">
                    </div>

                    <button type="submit" name="submit" value="submit" class="btn btn-primary mb-2"><i class="fa-solid fa-arrow-right"></i></button>
                </form><br><br>

        <?php 	
                    echo '<h5>Recent Conversations</h5> 
					
					<div class="row conversation">
						<div class="col-3 convo-names">
							<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">';

					$unique_users = "SELECT DISTINCT message_from FROM `messages` WHERE message_to='$username' ORDER BY time DESC";
					$unique_res = $conn->query($unique_users);

					if(mysqli_num_rows($unique_res) > 0) {
						while($row = mysqli_fetch_assoc($unique_res)){

							$distinct_user = $row['message_from'];
							echo '<a class="nav-link" id="'.$distinct_user.'-tab" data-toggle="pill" href="#'.$distinct_user.'" role="tab" aria-controls="v-pills-settings" aria-selected="false">
								'.$distinct_user.'
								</a>';
						}

						echo '</div></div>
						<div class="col-9">
							<div class="tab-content" id="v-pills-tabContent">'; }
						
							$unique_res1 = $conn->query($unique_users);
						if(mysqli_num_rows($unique_res1) > 0) {
							while($row = mysqli_fetch_assoc($unique_res1)){
	
								$distinct_user = $row['message_from'];

								$sql="SELECT * FROM messages WHERE (message_from='$distinct_user' AND message_to='$username') OR (message_to='$distinct_user' AND message_from='$username') ORDER BY time DESC LIMIT 5";
								$result=$conn->query($sql);

								echo '<div class="tab-pane fade" id="'.$distinct_user.'" role="tabpanel" aria-labelledby="'.$distinct_user.'-tab">';


								echo '<form class="form-inline" action="message.php" method="post">
											<input type="hidden" name="to" value="' . $distinct_user .'">
											
											<input class="form-control col-md-10" type="text" name="message" placeholder="Send a reply" required>
										    <button class="btn btn-primary mx-2" type="submit" name="submit" value="Send">Send</button>
										</form> <br>';

								if(mysqli_num_rows($result) > 0){

									while($row = mysqli_fetch_assoc($result)){
                                        if($row['message_from'] == $distinct_user) {
                                            echo '<div class="alert alert-primary col-md-12" role="alert" data-toggle="tooltip" data-placement="left" title="'.$row['time'].'">
                                                    '.$row['message'].'
                                                  </div>';
                                        }else {
                                            echo '<div class="alert alert-dark text-right col-md-12" role="alert" data-toggle="tooltip" data-placement="left" title="'.$row['time'].'">
                                                    '.$row['message'].'
                                                  </div>';
                                        }
									}
									
								}
								
								echo '</div>';
						}echo '</div></div></div>';
						

					}
                    else if (mysqli_num_rows($unique_res) < 1){

                        $unique_users = "SELECT DISTINCT message_to FROM `messages` WHERE message_from='$username'";
					    $unique_res = $conn->query($unique_users);

					    if(mysqli_num_rows($unique_res) > 0) {
							while($row = mysqli_fetch_assoc($unique_res)){
	
								$distinct_user = $row['message_to'];
								echo '<a class="nav-link" id="'.$distinct_user.'-tab" data-toggle="pill" href="#'.$distinct_user.'" role="tab" aria-controls="v-pills-settings" aria-selected="false">
									'.$distinct_user.'
									</a>';
							}}
	
							echo '</div></div>
							<div class="col-9">
								<div class="tab-content" id="v-pills-tabContent">';
							
								$unique_res1 = $conn->query($unique_users);
							if(mysqli_num_rows($unique_res1) > 0) {
								while($row = mysqli_fetch_assoc($unique_res1)){
		
									$distinct_user = $row['message_to'];
	
									$sql="SELECT * FROM messages WHERE (message_from='$distinct_user' AND message_to='$username') OR (message_to='$distinct_user' AND message_from='$username') ORDER BY time DESC LIMIT 5";
									$result=$conn->query($sql);
	
									echo '<div class="tab-pane fade" id="'.$distinct_user.'" role="tabpanel" aria-labelledby="'.$distinct_user.'-tab">';
	
	
									echo '<form class="form-inline" action="message.php" method="post">
												<input type="hidden" name="to" value="' . $distinct_user .'">
												
												<input class="form-control col-md-10" type="text" name="message" placeholder="Send a reply" required>
												<button class="btn btn-primary mx-2" type="submit" name="submit" value="Send">Send</button>
											</form> <br>';
	
									if(mysqli_num_rows($result) > 0){
	
										while($row = mysqli_fetch_assoc($result)){
											if($row['message_from'] == $distinct_user) {
												echo '<div class="alert alert-primary col-md-12" role="alert" data-toggle="tooltip" data-placement="left" title="'.$row['time'].'">
														'.$row['message'].'
													  </div>';
											}else {
												echo '<div class="alert alert-dark text-right col-md-12" role="alert" data-toggle="tooltip" data-placement="left" title="'.$row['time'].'">
														'.$row['message'].'
													  </div>';
											}
										}
										
									}
									
									
							}echo '</div>';

						    
                        }
                    }echo '</div></div></div>';

					
					?>
		</div>



</div>



<?php 
	include './partials/footer.php';
?>
 	