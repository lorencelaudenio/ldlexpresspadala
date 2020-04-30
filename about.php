<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");


//redirect to login if no variable set for empid
if(!isset($g_username) || empty($g_username)){
	header("location: login.php");
}


?>


<div class="container p-3 bg-primary text-white">
<title>About<?php echo $g_title; ?></title>

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
		<h3 class="text-dark">Vision & Mission</h3>
		<p class="text-dark text-justify"><?php echo $g_receipttitle;?>'s vision is to transform the lives of filipino families by providing the most trusted financial remittance across the planet. Focus has always been a key part of our strategy and our initial laser focus is on transforming the global remittance industry. Over time, we will leverage our trusted financial services brand and our global network to extend into other financial services.

</p>

		<p class="text-dark text-justify">
		We, Team <?php echo $g_receipttitle;?>, are united through our mission - to tirelessly deliver on our promise to filipinos sending money across the world.
		</p>
		<p class="text-dark text-justify">
		We accomplish our vision and mission by relentlessly focusing on culture. We’ve created <?php echo $g_receipttitle;?>’s Cultural Values, which embody how an exemplary <?php echo $g_receipttitle;?> team member and the overall <?php echo $g_receipttitle;?> team works to deliver on promises to customers everyday. That starts with putting customers at the center of everything we do.
		</p>
	  </div>
    </div>
    <div class="carousel-item">
	<img src="img/happy-family2.jpg" width="1100" height="500">	
	<div class="carousel-caption">
      
	  <p >
		<h1 class="text-dark">Our Vision, Mission, and Values</h1>
						<h2 class="text-dark">We're passionate about what we do – impacting lives across continents</h2>
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
