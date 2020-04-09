<?php 
ob_start();//important para no header error
include('conn.php');
session_start();

$var_type = $_SESSION['s_type'];
?>


<link rel="stylesheet" type="text/css" href="style.css">
<link rel="shortcut icon" type="image/png" href="img/logo.png">

<a href="index.php" ><img class="logo" src="img/logo.png"><label class="ldl-logo">LDL Express Padala</label></a><br>
<small><i><div class="under_logo">Money On-The-Fly!</div></i></small>

<br>

<ul>
  <li><a href="index.php">Track</a></li>
  <li><a href="send.php">Send</a></li>
  <li><a href="receive.php">Receive</a></li>
  <li><a href="about.php">About</a></li>
   <li><?php if ($var_type == 'admin'){echo '<a href="admin.php">Admin</a>';}?></li>
  <li style="float:right"><a class="active" href="logout.php">Logout</a></li>
</ul>


