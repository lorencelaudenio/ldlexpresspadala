<?php
include("conn.php");
include("nav.php");

session_start();
$logged_info = $_SESSION['s_username'] . " - " . $_SESSION['s_branch'];


//redirect to login if no variable set for empid and not admin beg
if(!isset($_SESSION['s_username']) || empty($_SESSION['s_username'])){
	header("location: login.php");
}else{
    if($_SESSION['s_type'] != "admin"){
       
        header("location: index.php");
    }
}
//redirect to login if no variable set for empid and not admin end


?>



<title>Admin Panel</title>


<b><div class="intitle"><center>Admin Panel</center></div></b>
<div class="form">
    
    <a href="adduser.php">User Management</a>
    
</div>
</div>
<?php include ('footer.php');?>
