<?php 
 include 'dbh.php';
 include 'session.php';
error_reporting(0);
if(isset($_POST["submit"]))
{

	$to=$_POST['to'];
	$message=$_POST['message'];
	$from=$_SESSION['username'];

	$sql ="INSERT INTO `messages` (`message_to`, `message_from`, `message`) VALUES ('$to','$from','$message')";
	$result=$conn->query($sql);
}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <link rel="stylesheet" href="message.css">
 <body>

 	<div class="msgbox">
 		<div class="container">
 		<center><p>Messages</p></center>
 		</div>

 		<?php 
 		include 'dbh.php';
 		include 'session.php';


		$sql="SELECT * FROM messages WHERE message_to='$username'";
		$result=$conn->query($sql);

		while($row = mysqli_fetch_assoc($result)){

		echo "<tr><td>" . $row['message_from']."<br>" . "</td><td>" . $row['message']."<br>". "</td><td>" .$row['time']. "</td></tr>"."<br><br>" ;

}

 		 ?>
 	</div>
 	<div class="sendmsg">
 		<form action="message.php" method="post">
 		<p>Send To</p>
 		<input type="text" name="to" placeholder="Enter recipient username" required="">
 		<p>Message</p>
 		<input type="text" name="message" placeholder="Type message" required="">
 		<input type="submit" name="submit" value="Send">
 	</form>
 
 	</div>

 	
 </body>
 </html>
