<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");
include("headers.php");


//redirect to login if no variable set for empid
if(!isset($g_username) || empty($g_username)){
	header("location: login.php");
}

$txn_no = $_POST['txn_no'];
echo '<div class="container p-3 bg-primary text-white">';
//search
if(isset($_POST['search'])){
	//$query = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE (`txn_no` LIKE '%".$txn_no."%')"); 
    $query = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE txn_no = '$txn_no'");
	$count = mysqli_num_rows($query);
	    if($count == "0"){
		    echo '<center>
			<div class="alert alert-warning fade in alert-dismissible show">'.$txn_no.' not found.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div>
			</center>';
	    }else{		
		    while($row = mysqli_fetch_array($query)){
			
		    $db_txn_no = $row['txn_no'];
		    $db_sender = $row['sender'];
            $db_sender_cp_no = $row['sender_cp_no'];
            $db_receiver = $row['receiver'];
		    $db_receiver_cp_no = $row['receiver_cp_no'];
		    $db_dest = $row['dest'];
            $db_amt = $row['amt'];
            $db_purp = $row['purp'];
		    $db_relship = $row['relship'];
		    $db_processed_by = $row['processed_by'];
            $db_date_time_sent = $row['date_time_sent'];

            $db_status = $row['status'];
            $db_released_by = $row['released_by'];
            $db_date_time_claimed = $row['date_time_claimed'];

            }
		}
}
?>


<!--<link rel="stylesheet" type="text/css" href="style.css">-->
<title>Track<?php echo $g_title; ?></title>

<h2>Track</h2>
<form method="POST" action="index.php" class="was-validated">
<div class="input-group mb-3">
<input placeholder="Enter Transaction Number" class="form-control" type="text" name="txn_no" value="<?php echo $db_txn_no; ?>" autofocus required>
<div class="input-group-append">
<input class="btn btn-success mb-2" type="submit" name="search" value="Search">
</div>
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
  <span class="input-group-text">Status:</span>
</div>
<input type="text" class="form-control"  name="status" value="<?php echo ucfirst($db_status); ?>" readonly>
</div>

	<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Sender:</span>
    </div>
    <input type="text" class="form-control" name="sender" value="<?php echo $db_sender; ?>"  readonly>
	<div class="input-group-prepend">
      <span class="input-group-text">Mobile No.:</span>
    </div>
    <input type="text" class="form-control" name="sender_cp_no" value="<?php echo $db_sender_cp_no; ?>" readonly>
  </div>
	<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Receiver:</span>
    </div>
    <input type="text" class="form-control" name="receiver" value="<?php echo $db_receiver; ?>"  readonly>
	<div class="input-group-prepend">
      <span class="input-group-text">Mobile No.:</span>
    </div>
    <input type="text" class="form-control" name="receiver_cp_no" value="<?php echo $db_receiver_cp_no; ?>" readonly>
  </div>

<div class="container p-3 my-3 border">
		<div class="form-group">
		<label for="name">Destination Branch:</label>
		<input type="text" class="form-control"  name="dest" value="<?php echo ucfirst($db_dest); ?>"  readonly>
	</div>
	<div class="form-group">
		<label for="name">Amount:</label>
		<input type="text" class="form-control"  name="amt" value="<?php echo $db_amt; ?>"  readonly>
	</div>
	<div class="form-group">
		<label for="name">Purpose of Transaction:</label>
		<input type="text" class="form-control"  name="purp" value="<?php echo $db_purp; ?>"  readonly>
	</div>
	<div class="form-group">
		<label for="name">Relationship to Receiver:</label>
		<input type="text" class="form-control"  name="relship" value="<?php echo $db_relship; ?>"  readonly>
	</div>
</div>

<div class="container p-3 my-3 border">
	<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Processed by:</span>
    </div>
    <input type="text" class="form-control" name="processed_by" value="<?php echo $db_processed_by; ?>"  readonly>
    <input type="text" class="form-control" name="date_time_sent"  value="<?php echo $db_date_time_sent; ?>"  readonly>
  </div>
	<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Released by:</span>
    </div>
    <input type="text" class="form-control" name="processed_by" value="<?php echo $db_released_by; ?>"  readonly>
    <input type="text" class="form-control" name="date_time_sent"  value="<?php echo $db_date_time_claimed; ?>"  readonly>
  </div>

</div>
</form>
</div>
<?php include ('footer.php');?>