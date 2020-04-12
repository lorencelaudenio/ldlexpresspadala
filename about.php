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


<!--<link rel="stylesheet" type="text/css" href="style.css">-->
<title>About<?php echo $g_title; ?></title>

<form method="POST" action="index.php">
<b><div class="intitle"><center>About</center></div></b>



<div class="about">
<center><img class="loginlogo" src="<?php echo $g_logo;?>"/></center><br>
<b><center><div class=""><small><font color="#e60000"><?php echo $g_receipttitle;?></font></small></div></center></b><br>
<p>Actually, there's nothing more in here. LDL Express Padala simulates the sending/receiving of money that is being done by most of the remittance centers here in our country. This system being developed is just a part of my Project NOGAWA ("Walang Magawa") which eventually happened during the pandemic #COVID19 on 1st quarter of 2020 to fight boredom. Since I have nothing to do rather than sleeping and staring on my smartphone the whole day that is for sure will end me up unproductive after. Tried to entertain myself with different streaming, like watching "Raffy Tulfo in Action" haha but after watching specific topic nothing interesting follows but to do coding.</p>

<p>What's in a logo? Obviously, it's a bird flying with the money as it's wings (Char!). The logo signifies the fast transactions through technology innovations. It streamlined the process of sending money On-The-Fly by pushing and pulling the records out from the cloud.</p>

<p>How do I come up with the name "LDL Express Padala"? That was my abbreviated name - Lorence D. Laudenio. How about ALREJJ Group of Companies by the way? It's just the first letter of my siblings name, Amel (Eldest), Lorence(Your's Truly), Ryan, Ervel, Jessa and Jesavel.</p>

<p>"<i>Do something everyday that will challenge you to be a PRODUCTIVE YOU!</i>" Sooner or later it will benefits you. <br>

Email me at: <b>laudeniolorence@gmail.com</b><br>
Facebook: <b><a href="http://www.facebook.com/renzthegeek" target="_BLANK">Lorence D. Laudenio</a></b>
</p>
</div>

<?php include ('footer.php');?>
