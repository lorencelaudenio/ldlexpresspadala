<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");
include("verify_if_admin.php");


if(isset($_POST['deleteall'])){
    $sqldeleteall = mysqli_query($conn,"truncate table tbl_ldlpadalaexpress");
    echo '<center><div class="notification">All records deleted!</div></center>';
}

?>

<?php include('scripts.php');?>




<title>Admin Panel | <?php echo $comp_name; ?></title>



<div class="container p-3 bg-primary text-white">
<h2>Admin Panel</h2>
    <div class="container p-3 my-3 border">
	<form method="POST" action="admin.php">
		<a class="btn btn-success mb-2" href="adduser.php">User Management</a><br>
		<a class="btn btn-success mb-2" href="deletesingletxn.php">Delete Single Transaction</a><br>
		<a class="btn btn-success mb-2" href="config.php">Configuration</a><br>
		<input class="btn btn-success mb-2" type="submit" name="deleteall" value="Delete All Transactions" onclick="return deleteallrecords()">
    </form>
    </div>
</div>
</div>
<?php include ('footer.php');?>


