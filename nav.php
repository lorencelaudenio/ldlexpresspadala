<?php 
ob_start();//important para no header error
include('conn.php');
include('global_variables.php');
?>


<link rel="stylesheet" type="text/css" href="style.css">
<link rel="shortcut icon" type="image/png" href="<?php echo $g_logo;?>">

<a href="index.php" ><img class="logo" src="<?php echo $g_logo;?>"><label class="ldl-logo"><?php echo $g_receipttitle;?></label></a><br>
<small><i><div class="under_logo"><?php echo $g_tagline;?></div></i></small>

<br>

<ul>
  <li><a href="index.php">Track</a></li>
  <li><a href="send.php">Send</a></li>
  <li><a href="receive.php">Receive</a></li>
      <li><a href="view.php">View</a></li>
<li><?php if ($g_type == 'admin'){echo '<a href="admin.php">Admin</a>';}?></li>
  <li><a href="about.php">About</a></li>
   
  <li style="float:right"><a class="active" href="logout.php">Logout</a></li>
</ul>


