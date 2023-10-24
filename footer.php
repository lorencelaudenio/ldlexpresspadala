<?php 
include("global_variables.php");
include("headers.php");
require("conn.php");
?>
<div class="container">
<footer class="page-footer font-small blue">
<div class="row">
  <div class="col footer-copyright text-left py-3"><small><p>Need assistance? Call <?php echo $comp_name ." Hotline at ". $comp_contact ;?></small></p></div>
  <div class="col footer-copyright text-right py-3"><small>Copyright &copy; <?php echo date("Y");?> <a href="about.php"><?php echo $comp_name;?></a> <a href="<?php echo $g_fb;?>" target="_blank">Facebook</a></small></div>
  </div>
 </footer>
</div>


