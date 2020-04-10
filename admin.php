<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
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
if(isset($_POST['deleteall'])){
    $sqldeleteall = mysqli_query($conn,"truncate table tbl_ldlpadalaexpress");
    echo '<center><div class="notification">All records deleted!</div></center>';
}

?>
<script>
function deleteconfig(){

var del=confirm("Are you sure you want to delete all the records?");
if (del==true){
   alert ("All records are deleted!")
}else{
    alert("No records were affected.")
}
return del;
}
</script>


<title>Admin Panel</title>


<b><div class="intitle"><center>Admin Panel</center></div></b>
<div class="form">
    <form method="POST" action="admin.php">
    <a href="adduser.php">User Management</a><br>
        
    <input type="submit" name="deleteall" value="Delete All" onclick="return deleteconfig()">
    </form>
    
</div>
</div>
<?php include ('footer.php');?>


