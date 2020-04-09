<?php
include("conn.php");
include("nav.php");


session_start();
$logged_info = $_SESSION['s_username'] . " - " . $_SESSION['s_branch'];
$s_username = $_SESSION['s_username'];

//redirect to login if no variable set for empid
if(!isset($_SESSION['s_username']) || empty($_SESSION['s_username'])){
	header("location: login.php");
}

$txn_no = $status = $amt = $sender = $sender_cp_no = $dest = $receiver = $receiver_cp_no = $relship = $purp = $date_time_sent = $date_time_claimed = $processed_by = $released_by = "";

$origin_code = strtoupper(substr($_SESSION['s_branch'],0,3));
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
$date_time_sent=date("m/d/y h:i:s");
$date_time_claimed="";
$processed_by=$logged_info;
$released_by=$_POST['released_by'];

if(isset($_POST['send'])){
    $supernew_txn_code = $new_txn_code;
    $sql = mysqli_query($conn, "INSERT INTO tbl_ldlpadalaexpress(txn_no, status, amt, sender, sender_cp_no, dest, receiver, receiver_cp_no, relship, purp, date_time_sent, date_time_claimed, processed_by, released_by) VALUES('$supernew_txn_code', '$status', '$amt', '$sender', '$sender_cp_no', '$dest', '$receiver', '$receiver_cp_no', '$relship', '$purp', '$date_time_sent', '$date_time_claimed', '$processed_by', '$released_by')");

    //echo "Money has been sent. Please note the transaction code is <b>" . $supernew_txn_code . ".</b>" ;
    echo '<center><div class="notification">Money has been sent. Please note the transaction code is <b><a href="print.php" target="_BLANK" class="printlink">' . $supernew_txn_code. '</a></b>!</div></center>';
    $_SESSION['s_txn_no'] = $txn_no;
}

 
?>

<script>
function getfee(){	
	document.getElementById("fee").value = Number(document.getElementById("amt").value) * 0.02;
	document.getElementById("total").value = Number(document.getElementById("amt").value) + Number(document.getElementById("fee").value);
}

function getdestcode(){	
	var str = document.getElementById('dest').value;
    var res = str.substring(0,3);
    document.getElementById('destcode').value = res.toUpperCase();
}
</script>

<title>Send</title>
<b><div class="intitle"><center>Send</center></div></b>
<div class="form">

<form method="POST" action="send.php">

<table>
<tr>
    <td><b>Sender</b></td>
</tr>
<tr>
    <td>Name:</td><td><input type="text"  class="logintext" name="sender" value="<?php echo $sender; ?>" required autofocus></td>
</tr> 
<tr>
    <td>Mobile No.:</td><td><input type="text"  class="logintext" name="sender_cp_no" value="<?php echo $sender_cp_no; ?>"required></td>
</tr>
 
<tr>
    <td><b>Receiver</b></td>
</tr>
<tr>
    <td>Name:</td><td><input type="text"  class="logintext" name="receiver" value="<?php echo $receiver; ?>"required></td>
</tr>
 
<tr>
    <td>Mobile No.:</td><td><input type="text"  class="logintext" name="receiver_cp_no" value="<?php echo $receiver_cp_no; ?>" required></td>
</tr>
 
<tr>
    <td>Destination Branch:</td><td><input type="text"  onkeyup="getdestcode()" class="logintext" name="dest" id="dest" value="<?php echo $dest; ?>" required><input type="hidden" id="destcode" name="destcode"></td>
</tr>
 
<tr>
    <td>Amount:</td><td><input type="text" onkeyup="getfee()"  class="logintext" id="amt" name="amt" value="<?php echo $amt; ?>" required></td><td>Fee:</td><td><input type="text" name="fee"  class="number" id="fee"></td><td>Total:</td><td> <input type="text"  class="number" name="total" id="total"></td>
</tr>
     
<tr>
    <td>Purpose of Transaction:</td><td><input type="text"  class="logintext" name="purp" value="<?php echo $purp; ?>" required></td>
</tr>

<tr>
    <td>Relationship to Receiver:</td><td> <input type="text"  class="logintext" name="relship" value="<?php echo $relship; ?>" required></td>
</tr>
<tr>
    <td><input type="submit" class="loginbtn" name="send" value="Send"></td>
</tr>


</table>
</form>

<form method="POST" action="print.php">
<?php
session_start();
$p_txn_no=$supernew_txn_code;
$_SESSION['s_txn_no'] = $p_txn_no;
$p_date_time=date("m/d/y h:i:s");
$_SESSION['s_date_time']=$p_date_time;
$_SESSION['s_sender'] = ucfirst($sender);
$_SESSION['s_sender_cp_no']=$sender_cp_no;
$_SESSION['s_dest']=ucfirst($dest);
$_SESSION['s_amt']=$amt;
$_SESSION['s_receiver'] = ucfirst($receiver);
$_SESSION['s_receiver_cp_no']=$receiver_cp_no;
$_SESSION['s_relship']=ucfirst($relship);
$_SESSION['s_purp']=$purp;
$p_date_time_sent = date("m/d/y h:i:s");
$_SESSION['s_date_time_sent']=$p_date_time_sent;
$_SESSION['s_processed_by']=ucfirst($logged_info);
$_SESSION['s_processor_name'] = $s_username; 


?>
<input type="hidden" class="loginbtn" name="print" value="Print">
</form>
</div>
<br>
<?php include ('footer.php');?>
