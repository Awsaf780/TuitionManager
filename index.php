<?php 
	include './partials/header.php';
  include 'session.php';
  
?>

<div class="full-height">


<div class="container-fluid landing-carousel">

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

        <div class="carousel-item active">
          <img src="images/landing2.jpg" class="d-block w-100 landing-carousel-img">
          <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="images/landing1.jpg" class="d-block w-100 landing-carousel-img">
          <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="images/landing3.jpg" class="d-block w-100 landing-carousel-img">
          <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>

    </div>


    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>

  </div>

</div>

<br><br>

<div class="container mt-5 landing">

<blockquote class="blockquote text-center" >
  <h1 class="mb-0"><b>Share The Light Of Knowledge</b></h1>
</blockquote>

<p class="landing-desc" style="text-align: center;"> A platform to connect tutors and students </p>

</div>


</div>

<?php 
	include './partials/footer.php';
?>

</body>
</html>
