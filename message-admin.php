<?php 
	include 'dbh.php';
	

	if(isset($_COOKIE['admin_username'])) {

		$username = $_COOKIE['admin_username'];

		$sql = "SELECT * FROM admin WHERE username='$username'";
		$result = $conn -> query($sql);
		$retrive = mysqli_fetch_assoc($result);

		$firstname = $retrive['firstname'];
		$lastname = $retrive['lastname'];

		include './partials/header-admin.php';
	}
	else {
		header("Location:adminlogin.php");
	}
?>


<?php 
    error_reporting(0);
    if(isset($_POST["submit"]))
    {

        $to=$_POST['to'];
        $message=$_POST['message'];
        $from=$_COOKIE['admin_username'];

        $sql ="INSERT INTO `messages` (`message_to`, `message_from`, `message`) VALUES ('$to','$from','$message')";
        $result=$conn->query($sql);
    }
?>

<div class="container full-height mt-5">
    <h1>Messages</h1>
    <small class="form-text text-muted" id="no_msg">  </small>

    <div class="getmsg mt-5">
            <?php 
                    $sql="SELECT * FROM messages WHERE message_to='$username'";
                    $result=$conn->query($sql);

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_assoc($result)){

                        // echo "<tr><td>" . $row['message_from']."<br>" . "</td><td>" . $row['message']."<br>". "</td><td>" .$row['time']. "</td></tr>"."<br><br>" ;
                        echo "<div class=\"card\">
                                <div class=\"card-header\" style=\"background: linear-gradient(90deg, #4b6cb7 0%, #182848 100%); color: white;\">"
                                . $row['message_from'] . "
                            </div>
                            <div class=\"card-body\">
                                <p class=\"card-text\">". $row['message'] ."</p>
                            </div>
                            <div class=\"card-footer\">
                                <p class=\"card-text\">". $row['time'] ."</p>
                            </div>
                            <div class=\"card-footer\">
                                <form action=\"message-admin.php\" method=\"post\">
                                    <input type=\"hidden\" name=\"to\" value=\"" . $row['message_from'] ."\">
                                    <input type=\"text\" name=\"message\" placeholder=\"Send a reply\" required>
                                
                                <input type=\"submit\" name=\"submit\" value=\"Send\">
                                </form>
                            </div>
                            

                            </div>
                            <br><br>";
                        }
                    }
                    else{
                        echo "<div class=\"sendmsg\">
                        <h5>Start a New Conversation</h5>
                         <form action=\"message-admin.php\" method=\"post\">
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



<?php 
	include './partials/footer.php';
?>
 	
