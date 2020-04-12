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

$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$branch = $_POST['branch'];
$type = $_POST['type'];
$date_enrolled = $g_date_time;

//add
if(isset($_POST['add'])){
    
    $query = mysqli_query($conn,"SELECT * FROM tbl_users WHERE username='$username'"); 
	$count = mysqli_num_rows($query);
	    if($count == "0"){

            if($password == $cpassword){
                $sql = mysqli_query($conn,"INSERT INTO tbl_users(username, password, branch, type, date_enrolled) VALUES('$username', '$password', '$branch', '$type', '$date_enrolled')");
                echo '<center><div class="notification">' . $username. ' added to the database!</div></center>';
                
            }else{
                echo '<center><div class="notification">Password not match!</div></center>'; 
                      
            }
		    
            
            
	    }else{
            echo '<center><div class="notification">' . $username. ' already taken!</div></center>';
                  
            
        }
		
}

//search
if(isset($_POST['search'])){
	
    $searchquery = mysqli_query($conn,"SELECT * FROM tbl_users WHERE username = '$username'");
	$searchcount = mysqli_num_rows($searchquery);
	    if($searchcount == "0"){
		    echo '<center><div class="notification">' . $username. ' was not found!</div></center>';
	    }else{		
		    while($row = mysqli_fetch_array($searchquery)){
			
		    $db_username = $row['username'];
		    $db_password = $row['password'];
            $db_branch = $row['branch'];
            $db_type = $row['type'];
            $db_date_enrolled = $row['date_enrolled'];
		   

            }
		}
}

if(isset($_POST['delete'])){
    $searchdeletequery = mysqli_query($conn,"SELECT * FROM tbl_users WHERE username = '$username'");
	$searchdeletecount = mysqli_num_rows($searchdeletequery);
	    if($searchdeletecount == "0"){
		    echo '<center><div class="notification">' . $username. ' was not found!</div></center>';
	    }else{
            		
            $deletequery = mysqli_query($conn,"DELETE FROM tbl_users WHERE username = '$username'");
            echo '<center><div class="notification">' . $username. ' deleted successfully!</div></center>';
        }
}

//update
if(isset($_POST['update'])){	
		    $updatequery = mysqli_query($conn,"UPDATE tbl_users SET password='$password', branch='$branch', type='$type' WHERE username = '$username'");
		   echo '<center><div class="notification">' . $username. ' record updated!</div></center>';

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

<title>User Management <?php echo $g_title; ?></title>


<b><div class="intitle"><center>User Management</center></div></b>
<div class="form">
    <table>
    <form method="POST" action="adduser.php">
    <tr>
        <td>Username:</td><td><input type="text" name="username" class="inputtextsearch" value="<?php echo $db_username; ?>" required>&nbsp;<input type="submit" name="search" class="loginbtn" value="Search"></td>
    </tr>    
    <tr>
        <td>Password:</td><td><input type="password" name="password" class="inputtextsearch"  value="<?php echo $db_password; ?>"></td>
    </tr>
    <tr>
        <td>Confirm Password:</td><td><input type="password" name="cpassword" class="inputtextsearch"  ></td>
    </tr>
    <tr>
        <td>Branch:</td><td><input type="text" name="branch" class="inputtextsearch"  value="<?php echo $db_branch; ?>"></td>
    </tr>
    <tr>
        <td>Type:</td><td><input type="text" name="type" class="inputtextsearch"  value="emp" value="<?php echo $db_type; ?>"></td>
    </tr>
    <tr>
        <td>Date/Time Enrolled:</td><td><input type="text" name="date_enrolled" class="inputtextsearch"  value="<?php echo $db_date_enrolled; ?>" readonly></td>
    </tr>
    <tr>
        <td><input type="submit" name="add" class="loginbtn" value="Add">&nbsp;<input type="submit" name="update" class="loginbtn" value="Edit/Update">&nbsp;<input type="submit" name="delete" class="loginbtn" value="Delete" onclick="return deleteconfig()"></td>
    </tr>
    
    </form>
    </table>
</div>
</div>
<?php include ('footer.php');?>
