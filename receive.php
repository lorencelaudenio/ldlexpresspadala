<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");
include("verify_login.php");
include("scripts.php");

$txn_no = "";

$txn_no=$_POST['txn_no'] ?? null;
$readonly = "";
$message = "";


$status = "Claimed";
$current_status = $_POST['status'] ?? null;



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
            
            if($db_status=="Claimed"){
              $readonly = "disabled";
              $message = "Transaction is already claimed.";
            }elseif($db_status=="Unlaim"){
              $readonly = "";
              $message = "";
            }

                  
            
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
        echo '<center><div class="alert alert-success fade in alert-dismissible show"><a data-toggle="tooltip" data-placement="right" title="Click to print receipt!" href="claimreceipt.php" target="_BLANK" class="printlink"><b>' .$txn_no. '</b></a> claimed successfully!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div></center>';

        }
}
?>


<title>Receive | <?php echo $comp_name; ?></title>
<h2>Receive</h2>
<div class="form">

<form method="POST" action="receive.php" >
<div class="input-group mb-3">
<input placeholder="<?php $code = initials($string); echo $code.'XXXXXXXXXXXX';?>" class="form-control" type="text" name="txn_no" value="<?php echo $db_txn_no ?? null; ?>" autofocus required>
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
    <input type="text" class="form-control" name="sender" value="<?php echo ucfirst($db_sender  ?? null); ?>" readonly>
	<div class="input-group-prepend">
      <span class="input-group-text">Mobile No.:</span>
    </div>
    <input type="text" class="form-control" name="sender_cp_no" value="<?php echo $db_sender_cp_no  ?? null; ?>" readonly>
  </div>
	<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Receiver:</span>
    </div>
    <input type="text" class="form-control" name="receiver" value="<?php echo $db_receiver  ?? null; ?>" readonly >
	<div class="input-group-prepend">
      <span class="input-group-text">Mobile No.:</span>
    </div>
    <input type="text" class="form-control" name="receiver_cp_no" value="<?php echo $db_receiver_cp_no  ?? null; ?>"readonly>
  </div>
</div>  

<div class="container p-3 my-3 border">
		<div class="form-group">
		<label for="name">Destination Branch:</label>
		<input type="text" class="form-control"  name="dest" value="<?php echo ucfirst($db_dest  ?? null); ?>"  readonly>
	</div>
	<div class="form-group">
		<label for="name">Amount:</label>
		<input type="text" class="form-control"  name="amt" value="<?php echo $db_amt  ?? null; ?>"  readonly>
	</div>
	<div class="form-group">
		<label for="name">Purpose of Transaction:</label>
		<input type="text" class="form-control"  name="purp" value="<?php echo $db_purp  ?? null; ?>"  readonly>
	</div>
	<div class="form-group">
		<label for="name">Relationship to Receiver:</label>
		<input type="text" class="form-control"  name="relship" value="<?php echo $db_relship  ?? null; ?>"  readonly>
	</div>
</div>

	<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Processed by:</span>
    </div>
    <input type="text" class="form-control" name="processed_by" value="<?php echo $db_processed_by  ?? null; ?>"  readonly>
    <input type="text" class="form-control" name="date_time_sent"  value="<?php echo $db_date_time_sent  ?? null; ?>"  readonly>
  </div>
  <input data-toggle="tooltip" data-placement="right" title="<?php echo $message; ?>" <?php echo $readonly;?> class="btn btn-success mb-2" type="submit" name="receive" value="Release" onclick="return confirm('I confirm the identity of the receiver.')">
</form>

<form method="POST" action="claimreceipt.php">
<?php


session_start();
$_SESSION['r_txn_no'] = $_POST['txn_no'] ?? null;
$_SESSION['r_sender'] = $_POST['sender'] ?? null;
$_SESSION['r_sender_cp_no']=$_POST['sender_cp_no'] ?? null;
$_SESSION['r_dest']=ucfirst($_POST['dest'] ?? null) ?? null;
$_SESSION['r_amt']=$_POST['amt'] ?? null;
$_SESSION['r_receiver'] = $_POST['receiver'] ?? null;
$_SESSION['r_receiver_cp_no']=$_POST['receiver_cp_no'] ?? null;
$_SESSION['r_relship']=$_POST['relship'] ?? null;
$_SESSION['r_purp']=$_POST['purp'] ?? null; 

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
