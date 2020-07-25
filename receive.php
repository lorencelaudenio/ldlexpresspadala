<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");

//redirect to login if no variable set for empid
if(!isset($g_username) || empty($g_username)){
	header("location: login.php");
}

$txn_no = "";

$txn_no=$_POST['txn_no'];


$status = "Claimed";
$current_status = $_POST['status'];



echo '<div class="container p-3 bg-primary text-white">';
//search
if(isset($_POST['search'])){
    
	$query = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE txn_no='$txn_no'"); 
	$count = mysqli_num_rows($query);
	    if($count == "0"){
		    echo '<center><div class="alert alert-danger fade in alert-dismissible show">'.$txn_no.' not found.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div></center>';
            
	    }else{
            session_start();		
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

                  
            
            }
		}
}

//update
if(isset($_POST['receive'])){
    if ($current_status == "Claimed"){
        //echo $txn_no ." already claimed! Please track.";
         echo '<center><div class="alert alert-warning fade in alert-dismissible show"><b>'.$txn_no.'</b> already claimed! Please track.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div></center>';
    }else{
        $sql = mysqli_query($conn,"UPDATE tbl_ldlpadalaexpress SET status='$status', date_time_claimed='$g_date_time', released_by='$g_logged_info' WHERE txn_no='$txn_no'");

       //echo "Money claimed succesfully!";
        echo '<center><div class="alert alert-success fade in alert-dismissible show"><a a href="claimreceipt.php" target="_BLANK" class="printlink"><b>' .$txn_no. '</b></a> claimed successfully!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div></center>';

        }
}
?>


<title>Receive<?php echo $g_title; ?></title>
<h2>Receive</h2>
<div class="form">

<form method="POST" action="receive.php">
<div class="input-group mb-3">
<input placeholder="Enter Transaction Number" class="form-control" type="text" name="txn_no" value="<?php echo $db_txn_no; ?>" autofocus required>
<div class="input-group-append">
<input class="btn btn-success mb-2" type="submit" name="search" value="Search">
<input type="hidden"   name="status" value="<?php echo $db_status; ?>" >
</div>
</div>


<div class="container p-3 my-3 border">
	<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Sender:</span>
    </div>
    <input type="text" class="form-control" name="sender" value="<?php echo ucfirst($db_sender); ?>" readonly>
	<div class="input-group-prepend">
      <span class="input-group-text">Mobile No.:</span>
    </div>
    <input type="text" class="form-control" name="sender_cp_no" value="<?php echo $db_sender_cp_no; ?>" readonly>
  </div>
	<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Receiver:</span>
    </div>
    <input type="text" class="form-control" name="receiver" value="<?php echo $db_receiver; ?>" readonly >
	<div class="input-group-prepend">
      <span class="input-group-text">Mobile No.:</span>
    </div>
    <input type="text" class="form-control" name="receiver_cp_no" value="<?php echo $db_receiver_cp_no; ?>"readonly>
  </div>
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

	<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Processed by:</span>
    </div>
    <input type="text" class="form-control" name="processed_by" value="<?php echo $db_processed_by; ?>"  readonly>
    <input type="text" class="form-control" name="date_time_sent"  value="<?php echo $db_date_time_sent; ?>"  readonly>
  </div>
  <input class="btn btn-success mb-2" onclick="doReceive();" type="submit" name="receive" value="Release">
</form>

<form method="POST" action="claimreceipt.php">
<?php


session_start();
$_SESSION['r_txn_no'] = $_POST['txn_no'];
$_SESSION['r_sender'] = $_POST['sender'];
$_SESSION['r_sender_cp_no']=$_POST['sender_cp_no'];
$_SESSION['r_dest']=ucfirst($_POST['dest']);
$_SESSION['r_amt']=$_POST['amt'];
$_SESSION['r_receiver'] = $_POST['receiver'];
$_SESSION['r_receiver_cp_no']=$_POST['receiver_cp_no'];
$_SESSION['r_relship']=$_POST['relship'];
$_SESSION['r_purp']=$_POST['purp']; 

$b_receipttitle = $g_receipttitle;
$b_tagline = $g_tagline;
$b_address = $g_address;
$b_date_time = $g_date_time;
$b_logged_info = $g_logged_info;
$b_contactinfo = $g_contactinfo;
$b_logo = $g_logo;



$_SESSION['r_title'] = $b_receipttitle;
$_SESSION['r_tagline'] = $b_tagline;
$_SESSION['r_address'] = $b_address;
$_SESSION['r_date_time'] = $b_date_time;
$_SESSION['r_logged_info'] = $b_logged_info;
$_SESSION['r_contactinfo'] = $b_contactinfo;
$_SESSION['r_logo'] = $b_logo;

?>

<input type="hidden" class="loginbtn" name="print" value="Print">
</form>

</div>
</div>
<?php include ('footer.php');?>
<script type="text/javascript"> 
function doReceive() { 
    $.get("claimreceipt.php"); 
    return false; 
} 
</script>

