<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");

//redirect to login if no variable set for empid and not admin beg
if(!isset($g_username) || empty($g_username)){
	header("location: login.php");
}else{
    if($g_type != "admin"){
       
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


<title>Admin Panel<?php echo $g_title; ?></title>



<div class="container p-3 bg-primary text-white">
<h2>Admin Panel</h2>
    <div class="container p-3 my-3 border">
	<form method="POST" action="admin.php">
		<a class="btn btn-success mb-2" href="adduser.php">User Management</a><br>
		<a class="btn btn-success mb-2" href="deletesingletxn.php">Delete Single Transaction</a><br>
		<input class="btn btn-success mb-2" type="submit" name="deleteall" value="Delete All Transactions" onclick="return deleteconfig()">
    </form>
    </div>
</div>
</div>
<?php include ('footer.php');?>


