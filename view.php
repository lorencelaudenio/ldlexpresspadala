<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");

$v_from_date = $_POST['from_date'];
$v_to_date = $_POST['to_date'];
$status = $_POST['status'];
$count = 0;


//page load
    if($g_type != "admin"){
    $ito_dapat = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE processed_by='$g_logged_info' ORDER BY date_time_sent DESC");
$count = mysqli_num_rows($ito_dapat);
}elseif($g_type == "admin"){
    $ito_dapat = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress ORDER BY date_time_sent DESC");
$count = mysqli_num_rows($ito_dapat);
}









//filterv2
if(isset($_POST['filter'])){
    //reset
    if(empty($v_from_date) && empty($v_to_date) && empty($status)){
       if($g_type != "admin"){
            $ito_dapat = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE processed_by='$g_logged_info' ORDER BY date_time_sent DESC");
            $count = mysqli_num_rows($ito_dapat);
        }elseif($g_type == "admin"){
            $ito_dapat = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress ORDER BY date_time_sent DESC");
            $count = mysqli_num_rows($ito_dapat);
        }
    //may laman lahat     
    }elseif(!empty($v_from_date) && !empty($v_to_date) && !empty($status)){
        if($g_type == "admin"){
            $ito_dapat = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE LEFT(date_time_sent,10) >= '$v_from_date' AND LEFT(date_time_sent,10) <= '$v_to_date' AND status='$status' ORDER BY date_time_sent DESC");
            $count = mysqli_num_rows($ito_dapat);
        }elseif($g_type == "emp"){
            $ito_dapat = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE processed_by='$g_logged_info' AND LEFT(date_time_sent,10) >= '$v_from_date' AND LEFT(date_time_sent,10) <= '$v_to_date' AND status='$status' ORDER BY date_time_sent DESC");
            $count = mysqli_num_rows($ito_dapat);
        }
    //may date pero walang status
    }elseif(!empty($v_from_date) && !empty($v_to_date)){
        if($g_type != "admin"){
            $ito_dapat = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE processed_by='$g_logged_info' AND LEFT(date_time_sent,10) >= '$v_from_date' AND LEFT(date_time_sent,10) <= '$v_to_date' ORDER BY date_time_sent DESC");
            $count = mysqli_num_rows($ito_dapat);
        }elseif($g_type == "admin"){
            $ito_dapat = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE LEFT(date_time_sent,10) >= '$v_from_date' AND LEFT(date_time_sent,10) <= '$v_to_date' ORDER BY date_time_sent DESC");
            $count = mysqli_num_rows($ito_dapat);
        }       
    //may status pero walang date  
    }elseif(!empty($status)){
        if($g_type != "admin"){
            $ito_dapat = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE processed_by='$g_logged_info' AND status='$status' ORDER BY date_time_sent DESC");
            $count = mysqli_num_rows($ito_dapat);
        }elseif($g_type == "admin"){
            $ito_dapat = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE status='$status' ORDER BY date_time_sent DESC");
            $count = mysqli_num_rows($ito_dapat);
        } 
    }
}

    
    




 echo '
<center><div class="notification">Total: '.$count.' record(s).</div></center>
<b><div class="intitle"><center>View</center></div></b><div class="form">
<form method="POST" action="view.php">
From: <input type="date" id="from_date" class="inputtextsearch"  name="from_date" >&nbsp;To: <input   type="date" class="inputtextsearch" id="to_date" name="to_date" >&nbsp;



Status:&nbsp;
<select name="status" id="status" value="" class="inputtextsearch">
    <option name="status" value=""></option>
    <option name="status" value="Claimed">Claimed</option>
    <option name="status" value="Unclaim">Unclaim</option>
</select>
&nbsp;
<input type="submit" class="loginbtn" value="Filter" name="filter" >
</form>
'; 

	echo "<table border='1' width='100%'";
	echo "<tr>
		<td align='center'><b>Txn No</b></td>
		<td align='center'><b>Amount</b></td>
		<td align='center'><b>Sender</b></td>
        <td align='center'><b>Receiver</b></td>
        <td align='center'><b>Date</b></td>
        <td align='center'><b>Processed by</b></td>
        <td align='center'><b>Status</b></td>
		</tr>";
	
	//while($row = mysqli_fetch_assoc($view_query)) {
   
    if($ito_dapat){//important ito to fix mysqli_fetch_assoc() expects parameter 1 to be
    while($row = mysqli_fetch_assoc($ito_dapat)) {
		
		$db_txn_no = $row["txn_no"];
		$db_amt = $row["amt"];
        $db_sender = $row["sender"];
		$db_receiver = $row["receiver"];		
        $db_date_time_sent = $row["date_time_sent"];
        $db_processed_by = $row["processed_by"];
        $db_status = $row["status"];
		echo "<tr>
		<td>$db_txn_no</td>
		<td>$db_amt</td>
        <td>$db_sender</td>
		<td>$db_receiver</td>
        <td>$db_date_time_sent</td>
        <td>$db_processed_by</td>
        <td>$db_status</td>
		</tr>";
	
        
    }
    }
	
	echo "</table><br>

</div> ";   



?>



<title>View <?php echo $g_title; ?></title>

<?php include ('footer.php');?>
