<?php

$conn=mysqli_connect("localhost", "root", "", "knowledgehub");

if(mysqli_connect_errno())
	die("Database connection failed: ".mysqli_connect_error()."(".mysqli_connect_errno().")");
		
?>