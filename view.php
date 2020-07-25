<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");

//redirect to login if no variable set for empid
if(!isset($g_username) || empty($g_username)){
	header("location: login.php");
}


//conditions beg
if(isset($_POST['filter'])){
  $v_from_date = $_POST['from_date'];
  $v_to_date = $_POST['to_date'];
  $status = $_POST['status'];
  $usr = $_POST['usr'];
  $count = 0;
  $sql = "";

$sql_select ="SELECT * FROM tbl_ldlpadalaexpress";

if(!empty($v_from_date)){
    if(!empty($sql)){
          $sql .= " AND ";
       }

   $sql.=" LEFT(date_time_sent,10)>='$v_from_date' ";
}

if(!empty($v_to_date)){
    if(!empty($sql)){
          $sql .= " AND ";
       }

   $sql.=" LEFT(date_time_sent,10)<='$v_to_date' ";
}

if(!empty($status)){
    if(!empty($sql)){
          $sql .= " AND ";
       }

   $sql.=" status='$status' ";
}

if(!empty($usr)){
    if(!empty($sql)){
          $sql .= " AND ";
       }

   $sql.=" processed_by='$usr' ";
}

if($g_type == "emp"){
  if(!empty($sql)){
        $sql .= " AND ";
     }

    $sql.=" processed_by = '$g_logged_info' ";
}

if(!empty($sql)){
      $sql = " WHERE ".$sql;

      $ewan = $sql_select.$sql.' ORDER BY date_time_sent DESC';//dapat wala ng " sa unahan at huli



      $ito_dapat = mysqli_query($conn,$ewan);
      $count = mysqli_num_rows($ito_dapat);


 }



}


echo '<div class="container p-3 bg-primary text-white">



			
			
<h2>View <span class="badge badge-secondary">'.$count.'</span></h2>
<div class="container p-3 my-3 border">
<form class="form-inline" method="POST" action="view.php">
<label for="from" class="mr-sm-2">From:</label>
 <input type="date" id="from_date" class="form-control mb-2 mr-sm-2"  name="from_date" id="from_date">
<label for="to" class="mr-sm-2">To:</label>
 <input type="date" id="from_date" class="form-control mb-2 mr-sm-2"  name="to_date" id="to_date">
 


<label for="status" class="mr-sm-2">Status:</label>
<select name="status" id="statusa" value="" class="form-control mb-2 mr-sm-2">
    <option name="status" value=""></option>
    <option name="status" value="Claimed">Claimed</option>
    <option name="status" value="Unclaim">Unclaim</option>
</select>&nbsp;';

if($g_type == "admin"){echo "User:&nbsp;<select class='form-control mb-2 mr-sm-2' name='usr' class='inputtextsearch'><option></option>";}

$populate_users = mysqli_query($conn,"SELECT * from tbl_users WHERE username<>'admin'");
while ($row = mysqli_fetch_array($populate_users)) {
  if($g_type == "admin"){
    echo "<option value='" . $row['username'] ." - ".$row['branch'] . "'>" . $row['username'] ." - ".$row['branch'] . "</option>";
  }
    }
echo "</select>&nbsp;";


echo '<input type="submit" class="btn btn-success mb-2" value="Filter" name="filter" >
</form>
</div>
';

	echo "<table class='table table-dark table-hover' border='1' width='100%'
        <tr class='thead-dark'>
		<td align='center'><b>Txn No</b></td>
		<td align='center'><b>Amount</b></td>
		<td align='center'><b>Sender</b></td>
        <td align='center'><b>Receiver</b></td>
        <td align='center'><b>Date</b></td>
        <td align='center'><b>Processed by</b></td>
        <td align='center'><b>Status</b></td>
        <td align='center'><b>Send Receipt</b></td>
        <td align='center'><b>Receive Receipt</b></td>
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
      $db_send_receipt = $row["send_receipt"];
	        $db_receive_receipt = $row["receive_receipt"];

  echo "<tr>
  <td>$db_txn_no</td>
  <td>$db_amt</td>
      <td>$db_sender</td>
  <td>$db_receiver</td>
      <td>$db_date_time_sent</td>
      <td>$db_processed_by</td>
      <td>$db_status</td>
      <td><a href='$db_send_receipt' class='btn btn-primary ' target=”_blank”>View</a></td>
      <td><a href='$db_receive_receipt' class='btn btn-primary ' target=”_blank”>View</a></td>
  </tr>";


  }
  }
  //====




	echo "</table><br>

</div> 
</div> 

";
?>


<title>View <?php echo $g_title; ?></title>



<?php include ('footer.php');?>




