<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");

//redirect to login if no variable set for empid
if(!isset($g_username) || empty($g_username)){
	header("location: login.php");
}

$txn_no = $status = $amt = $sender = $sender_cp_no = $dest = $receiver = $receiver_cp_no = $relship = $purp = $date_time_sent = $date_time_claimed = $processed_by = $released_by = $send_receipt = $receive_receipt =  "";

$origin_code = strtoupper(substr($g_branch,0,3));
$dest_code = $_POST['destcode'];
$new_txn_code = $origin_code . "-" . date("mdyhis") . "-" . $dest_code;
$txn_no=$new_txn_code;
$status="Unclaim";
$amt=$_POST['amt'];
$sender=$_POST['sender'];
$sender_cp_no=$_POST['sender_cp_no'];
$dest=$_POST['dest'];
$receiver=$_POST['receiver'];
$receiver_cp_no=$_POST['receiver_cp_no'];
$relship=$_POST['relship'];
$purp=$_POST['purp'];
$date_time_sent=$g_date_time;
$date_time_claimed="";
$processed_by=$g_logged_info;
$released_by=$_POST['released_by'];
$send_receipt ="";
$receive_receipt ="";

echo '<div class="container p-3 bg-primary text-white">';
if(isset($_POST['send'])){
    $supernew_txn_code = $new_txn_code;
    $sql = mysqli_query($conn, "INSERT INTO tbl_ldlpadalaexpress(txn_no, status, amt, sender, sender_cp_no, dest, receiver, receiver_cp_no, relship, purp, date_time_sent, date_time_claimed, processed_by, released_by, send_receipt, receive_receipt) VALUES('$supernew_txn_code', '$status', '$amt', '$sender', '$sender_cp_no', '$dest', '$receiver', '$receiver_cp_no', '$relship', '$purp', '$date_time_sent', '$date_time_claimed', '$g_logged_info', '$released_by', '$send_receipt', '$receive_receipt')");

    //echo "Money has been sent. Please note the transaction code is <b>" . $supernew_txn_code . ".</b>" ;
    echo '<center><div class="alert alert-info fade in alert-dismissible show">Money has been sent. Please note the transaction code is <b><a href="print.php" target="_BLANK" class="printlink">' . $supernew_txn_code. '</a></b>!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div></center>';
    $_SESSION['s_txn_no'] = $txn_no;
}

 
?>

<script>
function getfee(){	
	//document.getElementById("fee").value = Number(document.getElementById("amt").value) * 0.02;
    document.getElementById("fee").value = Number(document.getElementById("amt").value) * <?php echo json_encode($g_fees); ?>;
	document.getElementById("total").value = Number(document.getElementById("amt").value) + Number(document.getElementById("fee").value);
}

function getdestcode(){	
	var str = document.getElementById('dest').value;
    var res = str.substring(0,3);
    document.getElementById('destcode').value = res.toUpperCase();
}
</script>

<title>Send<?php echo $g_title; ?></title>
<h2>Send</h2>

<form method="POST" action="send.php">


<div class="container p-3 my-3 border">
	<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Sender:</span>
    </div>
    <input type="text" class="form-control" name="sender" value="<?php echo $sender; ?>" required autofocus>
	<div class="input-group-prepend">
      <span class="input-group-text">Mobile No.:</span>
    </div>
    <input type="text" class="form-control" name="sender_cp_no" value="<?php echo $sender_cp_no; ?>"required>
  </div>
	<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Receiver:</span>
    </div>
    <input type="text" class="form-control" name="receiver" value="<?php echo $receiver; ?>" required >
	<div class="input-group-prepend">
      <span class="input-group-text">Mobile No.:</span>
    </div>
    <input type="text" class="form-control" name="receiver_cp_no" value="<?php echo $receiver_cp_no; ?>"required>
  </div>
</div>  
  <div class="container p-3 my-3 border">
		<div class="form-group">
		<label for="name">Destination Branch:</label>
		<input type="text" class="form-control"  onchange="getdestcode()" name="dest" id="dest" value="<?php echo $dest; ?>" required>
		<input type="hidden" id="destcode" name="destcode">
	</div>
	
		<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Amount:</span>
    </div>
    <input type="text" class="form-control"  onchange="getfee()" name="amt" id="amt" value="<?php echo $amt; ?>" required>
	<div class="input-group-prepend">
      <span class="input-group-text">Fee:</span>
    </div>
    <input type="text" name="fee"  class="number" id="fee">
	<div class="input-group-prepend">
      <span class="input-group-text">Total:</span>
    </div>
    <input type="text"  class="number" name="total" id="total">
  </div>

	
	<div class="form-group">
		<label for="name">Purpose of Transaction:</label>
		<input type="text"  class="form-control" name="purp" value="<?php echo $purp; ?>" required>
	</div>
	<div class="form-group">
		<label for="name">Relationship to Receiver:</label>
		<input type="text"  class="form-control" name="relship" value="<?php echo $relship; ?>" required>
	</div>
	
</div>
<input type="submit" onclick="doSomething();" class="btn btn-success mb-2" name="send" value="Send">


</form>

<form method="POST" action="print.php">
<?php
session_start();
$p_txn_no=$supernew_txn_code;
$_SESSION['s_txn_no'] = $p_txn_no;
$_SESSION['s_sender'] = ucfirst($sender);
$_SESSION['s_sender_cp_no']=$sender_cp_no;
$_SESSION['s_dest']=ucfirst($dest);
$_SESSION['s_amt']=$amt;
$_SESSION['s_receiver'] = ucfirst($receiver);
$_SESSION['s_receiver_cp_no']=$receiver_cp_no;
$_SESSION['s_relship']=ucfirst($relship);
$_SESSION['s_purp']=$purp;


$c_receipttitle = $g_receipttitle;
$c_tagline = $g_tagline;
$c_address = $g_address;
$c_date_time = $g_date_time;
$c_logged_info = $g_logged_info;
$c_contactinfo = $g_contactinfo;
$c_logo = $g_logo;


$_SESSION['s_title'] = $c_receipttitle;
$_SESSION['s_tagline'] = $c_tagline;
$_SESSION['s_address'] = $c_address;
$_SESSION['s_date_time'] = $c_date_time;
$_SESSION['s_logged_info'] = $c_logged_info;
$_SESSION['s_contactinfo'] = $c_contactinfo;
$_SESSION['s_logo'] = $c_logo;


?>
<input type="hidden" class="loginbtn" name="print" value="Print">
</form>
</div>
<br>
<?php include ('footer.php');?>
<script type="text/javascript"> 
function doSomething() { 
    $.get("print.php"); 
    return false; 
} 
</script>
