<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");



$txn_no = "";

$txn_no=$_POST['txn_no'];


$status = "Claimed";
$current_status = $_POST['status'];




//search
if(isset($_POST['search'])){
    
	$query = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE txn_no='$txn_no'"); 
	$count = mysqli_num_rows($query);
	    if($count == "0"){
		    echo '<center><div class="notification">' . $txn_no. ' was not found!</div></center>';
            
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
         echo '<center><div class="notification"><b>'.$txn_no.'</b> already claimed! Please track.</div></center>';
    }else{
        $sql = mysqli_query($conn,"UPDATE tbl_ldlpadalaexpress SET status='$status', date_time_claimed='$g_date_time', released_by='$g_logged_info' WHERE txn_no='$txn_no'");

       //echo "Money claimed succesfully!";
        echo '<center><div class="notification"><a a href="claimreceipt.php" target="_BLANK" class="printlink"><b>' .$txn_no. '</b></a> claimed successfully!</div></center>';

        }
}
?>


<link rel="stylesheet" type="text/css" href="style.css">
<title>Receive<?php echo $g_title; ?></title>
<b><div class="intitle"><center>Receive</center></div></b>
<div class="form">

<form method="POST" action="receive.php">

<table>
<tr>
    <td>Transaction No.:</td><td><input type="text"  placeholder="Enter Transaction Number" class="logintext" name="txn_no" value="<?php echo $db_txn_no; ?>" autofocus required></td><td><input type="submit"  class="loginbtn" name="search" value="Search"><input type="hidden"  class="logintext" name="status" value="<?php echo $db_status; ?>" ></td>
</tr>

<tr>
    <td><b>Sender</b></td>
</tr>
<tr>
    <td>Name:</td><td><input type="text"  class="logintext" name="sender" value="<?php echo ucfirst($db_sender); ?>" readonly></td>
</tr>
<tr>
    <td>Mobile No.:</td><td><input type="text"  class="logintext" name="sender_cp_no" value="<?php echo $db_sender_cp_no; ?>" readonly></td>
</tr>
<tr>
    <td><b>Receiver</b></td>
</tr>
<tr>
    <td>Name:</td><td><input type="text"  class="logintext" name="receiver" value="<?php echo ucfirst($db_receiver); ?>" readonly></td>
</tr>
 
<tr>
   <td>Mobile No.:</td><td><input type="text"  class="logintext" name="receiver_cp_no" value="<?php echo $db_receiver_cp_no; ?>" readonly></td>
</tr>
 
<tr>
    <td>Destination Branch:</td><td><input type="text"  class="logintext" name="dest" value="<?php echo ucfirst($db_dest); ?>" readonly></td>
</tr>

<tr>
    <td>Amount: </td><td><input type="text" name="amt"  class="logintext" value="<?php echo $db_amt; ?>" readonly></td>
</tr>
 
<tr>
    <td>Purpose of Transaction:</td><td><input type="text" name="purp"  class="logintext" value="<?php echo ucfirst($db_purp); ?>" readonly></td>
</tr>
 
<tr>
    <td>Relationship to Receiver:</td><td><input type="text" name="relship"  class="logintext" value="<?php echo ucfirst($db_relship); ?>" readonly></td>
</tr>

<tr>
    <td>Processed by:</td><td><input type="text" name="processed_by"  class="logintext" value="<?php echo ucfirst($db_processed_by); ?>" readonly></td><td>Date/Time:</td><td><input type="text" name="date_time_sent"  class="logintext" value="<?php echo $db_date_time_sent; ?>" readonly></td>
</tr>
   
<tr>
    <td><input type="submit" name="receive"  class="loginbtn" value="Release"></td>
</tr>
</table>
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


?>
<input type="hidden" class="loginbtn" name="print" value="Print">
</form>

</div>
<?php include ('footer.php');?>
