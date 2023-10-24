<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");
include("verify_login.php");





?>


<div class="container p-3 bg-primary text-white">
<title>About | <?php echo $comp_name; ?></title>

<form method="POST" action="index.php">
<h2>About</center></h2>




<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/happy-family.jpg" width="1100" height="500">
	  <div class="carousel-caption">
		<h3 class="text-dark">Mission</h3>
		<p class="text-dark text-justify"><?php echo $g_mission;?></p>
	  </div>
    </div>
    <div class="carousel-item">
	<img src="img/happy-family2.jpg" width="1100" height="500">	
	<div class="carousel-caption">
      
	  <p >
		<h3 class="text-dark">Vision</h3>
			<p class="text-dark text-justify"><?php echo $g_vision;?></p>
	  </p>
	</div>
    </div>
    <div class="carousel-item">
	<img src="img/happy-family3.jpg" width="1100" height="500">	
	<div class="carousel-caption">
      
	  <p >
		<h1 class="text-dark">Celebrate</h1>
						<h2 class="text-dark">We celebrate how lucky we are to serve our customers and mission, to solve fascinating problems, and to work and have fun with talented colleagues.</h2>
	  </p>
	</div>
    </div>
  </div>



  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>

</div>

<?php include ('footer.php');?>
