<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");

//redirect to login if no variable set for empid and not admin beg
if(!isset($g_username) || empty($g_username)){
	header("location: login.php");
}else{
    if($g_type != "admin"){
       
        header("location: index.php");
    }
}
//redirect to login if no variable set for empid and not admin end

$txn_no = $_POST['txn_no'];



if(isset($_POST['delete'])){
    $searchdeletequery = mysqli_query($conn,"SELECT * FROM tbl_ldlpadalaexpress WHERE txn_no = '$txn_no'");
	$searchdeletecount = mysqli_num_rows($searchdeletequery);
	    if($searchdeletecount == "0"){
		    echo '<center><div class="notification">' . $txn_no. ' was not found!</div></center>';
	    }else{
            		
            if($g_type != "admin"){
                echo "You dont have the right to execute this transaction.";            
            }elseif($g_type == "admin"){
                $deletequery = mysqli_query($conn,"DELETE FROM tbl_ldlpadalaexpress WHERE txn_no = '$txn_no'");
                echo '<center><div class="notification">' . $txn_no. ' deleted successfully!</div></center>';
            }
        }
}



?>

<script>
function deleteconfig(){

var del=confirm("Are you sure you want to delete this user?");
if (del==true){
   alert ("User deleted!")
}else{
    alert("No user were affected.")
}
return del;
}
</script>

<title>Delete Single Transaction <?php echo $g_title; ?></title>


<b><div class="intitle"><center>Delete Single Transaction</center></div></b>
<div class="form">
    <table>
    <form method="POST" action="deletesingletxn.php">
    <tr>
        <td>Transaction No.:</td><td><input type="text" name="txn_no" class="inputtextsearch" value="<?php echo $_POST['txn_no']; ?>" required>&nbsp;<input type="submit" name="delete" class="loginbtn" value="Delete"></td>
    </tr>    
    
    
    
    </form>
    </table>
</div>
</div>
<?php include ('footer.php');?>
