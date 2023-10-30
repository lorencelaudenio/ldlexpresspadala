<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");
include("verify_if_admin.php");



$txn_no = $_POST['txn_no'] ?? null;


echo '<div class="container p-3 bg-primary text-white">';
if(isset($_POST['delete'])){
    $searchdeletequery = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE txn_no = '$txn_no'");
	$searchdeletecount = mysqli_num_rows($searchdeletequery);
	    if($searchdeletecount == "0"){
		    echo '<center>
			<div class="alert alert-warning fade in alert-dismissible show">' . $txn_no. ' was not found!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div>
			</center>';
	    }else{
            		
            if($g_type != "admin"){
                echo "You dont have the right to execute this transaction.";            
            }elseif($g_type == "admin"){
                $deletequery = mysqli_query($conn,"DELETE FROM tbl_ldlpadalaexpress WHERE txn_no = '$txn_no'");
                echo '<center>
			<div class="alert alert-success fade in alert-dismissible show">' . $txn_no. ' deleted successfully!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div>
			</center>';
            }
        }
}



?>

<?php include ('scripts.php');?>

<title>Delete Single Transaction | <?php echo $comp_name; ?></title>


<h2>Delete Single Transaction</h2>
    <div class="container p-3 my-3 border" >
	
	<form method="POST" action="deletesingletxn.php">
	<label for="txn_no">Transaction No.:</label>
	<div class="input-group mb-3">
    <input type="text" name="txn_no" class="form-control" value="<?php echo $_POST['txn_no'] ?? null; ?>" required>
	<div class="input-group-prepend">
      <input type="submit" name="delete" class="btn btn-danger my-2 my-sm-0" value="Delete" onclick="return deleterec()">
    </div>
	</form>
  </div>
	
	
    </div>
    </div>
<?php include ('footer.php');?>
