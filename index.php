<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");

session_start();
$logged_info = $_SESSION['s_username'] . " - " . $_SESSION['s_branch'];


//redirect to login if no variable set for empid
if(!isset($_SESSION['s_username']) || empty($_SESSION['s_username'])){
	header("location: login.php");
}

//$txn_no = "";
$txn_no = $_POST['txn_no'];

//search
if(isset($_POST['search'])){
	//$query = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE (`txn_no` LIKE '%".$txn_no."%')"); 
    $query = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE txn_no = '$txn_no'");
	$count = mysqli_num_rows($query);
	    if($count == "0"){
		    echo '<center><div class="notification">' . $txn_no. ' was not found!</div></center>';
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
<title>Track</title>

<form method="POST" action="index.php">
<b><div class="intitle"><center>Track</center></div></b>
<div class="form">



<table border="0">
<tr>
<td>Transaction No.:</td><td><input placeholder="Enter Transaction Number" class="logintext" type="text" name="txn_no" value="<?php echo $db_txn_no; ?>" autofocus required></td><td><input class="loginbtn" type="submit" name="search" value="Search"></td>
</tr>
<tr>
<td>Status:</td><td><input class="logintext" type="text" name="status" value="<?php echo ucfirst($db_status); ?>" readonly></td>
</tr>
<tr>
    <td><b>Sender</b></td>
</tr>
<tr>
    <td>Name: </td><td><input type="text" class="logintext" name="sender" value="<?php echo ucfirst($db_sender); ?>"  readonly></td>
</tr>
<tr>
    <td>Mobile No.:</td><td><input type="text" class="logintext" name="sender_cp_no" value="<?php echo $db_sender_cp_no; ?>" readonly></td>
</tr>

<tr>
    <td><b>Receiver</b></td>
</tr>
<tr>
    <td>Name: </td><td><input type="text" class="logintext" name="receiver" value="<?php echo ucfirst($db_receiver); ?>" readonly></td>
</tr>
<tr>
    <td>Mobile No.:</td><td><input type="text" class="logintext" name="receiver_cp_no" value="<?php echo $db_receiver_cp_no; ?>"  readonly></td>
</tr>
<tr>
    <td>Destination Branch:</td><td><input type="text" class="logintext" name="dest" value="<?php echo ucfirst($db_dest); ?>"  readonly></td>
</tr>
<tr>
    <td>Amount:</td><td><input type="text" name="amt" class="logintext" value="<?php echo $db_amt; ?>"  readonly></td>
</tr>
<tr>
    <td>Purpose of Transaction:</td><td><input type="text" name="purp" class="logintext" value="<?php echo ucfirst($db_purp); ?>"  readonly></td>
</tr>
<tr>
    <td>Relationship to Receiver:</td><td><input type="text" name="relship" class="logintext" value="<?php echo ucfirst($db_relship); ?>"  readonly></td>
</tr>
<tr>
    <td>Processed by:</td><td><input type="text" class="logintext" name="processed_by" value="<?php echo ucfirst($db_processed_by); ?>"  readonly></td><td>Date/Time:</td><td><input type="text" name="date_time_sent" class="logintext" value="<?php echo $db_date_time_sent; ?>"  readonly></td>
</tr>
<tr>
    <td>Released by:</td><td><input type="text" class="logintext" name="released_by" value="<?php echo ucfirst($db_released_by); ?>"  readonly></td><td>Date/Time:</td><td><input type="text" class="logintext" name="date_time_claimed" value="<?php echo $db_date_time_claimed; ?>"  readonly></td>
</tr>
</table>
</form>
</div>
<?php include ('footer.php');?>
