<?php
  include 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Teacher | Home</title>




	<link rel="preconnect" href="https://fonts.googleapis.com">
  <script src="https://kit.fontawesome.com/aa300de56c.js" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&family=Lora:ital,wght@1,400;1,500;1,600;1,700&family=Nunito:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Varela&family=Varela+Round&display=swap"
    rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
</head>



<body>

	<div class="container-fluid navbar-style py-3">
    <div class="row">
      <div class="col-md-10 col-12 mx-auto">



        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" id="logo" href="thome.php">Home</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="tprofile.php">Profile<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="findstudent.php">Find Students</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tstatus.php">Status</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="message.php">Messages</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>

            </ul>

          </div>
        </nav>


      </div>
    </div>
  </div>