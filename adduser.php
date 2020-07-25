<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");
echo '<div class="container p-3 bg-primary text-white">';
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
$password = hash('sha256', $_POST['password']);
$cpassword = hash('sha256', $_POST['password']);
$branch = $_POST['branch'];
$type = $_POST['type'];
$date_enrolled = $g_date_time;

//add
if(isset($_POST['add'])){
    
    if($_POST['username'] == $_POST['password']){
		echo '<center><div class="alert alert-danger fade in alert-dismissible show">' . ' Password must not be the same as Username!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div></center>';
	}else{
		$query = mysqli_query($conn,"SELECT * FROM tbl_users WHERE username='$username'"); 
	$count = mysqli_num_rows($query);
	    if($count == "0"){

            if($password == $cpassword){
                $sql = mysqli_query($conn,"INSERT INTO tbl_users(username, password, branch, type, date_enrolled) VALUES('$username', '$password', '$branch', '$type', '$date_enrolled')");
                echo '<center><div class="alert alert-info fade in alert-dismissible show">' . $username. ' added to the database!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div></center>';
                
            }else{
                echo '<center><div class="alert alert-info fade in alert-dismissible show">Password not match!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div></center>'; 
                      
            }
		    
            
            
	    }else{
            echo '<center><div class="alert alert-info fade in alert-dismissible show">' . $username. ' already taken!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div></center>';
                  
            
        }
	}
		
}

//search
if(isset($_POST['search'])){
	
    $searchquery = mysqli_query($conn,"SELECT * FROM tbl_users WHERE username = '$username'");
	$searchcount = mysqli_num_rows($searchquery);
	    if($searchcount == "0"){
		    echo '<center><div class="alert alert-info fade in alert-dismissible show">' . $username. ' was not found!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div></center>';
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
    $searchdeletequery = mysqli_query($conn,"SELECT * FROM tbl_users WHERE type <> 'admin' AND username = '$username'");
	$searchdeletecount = mysqli_num_rows($searchdeletequery);
	    if($searchdeletecount == "0"){
		    echo '<center><div class="alert alert-info fade in alert-dismissible show">' . $username. ' was not found/deleting admin type is prohibited!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div></center>';
	    }else{
            		
            $deletequery = mysqli_query($conn,"DELETE FROM tbl_users WHERE username = '$username'");
            echo '<center><div class="alert alert-info fade in alert-dismissible show">' . $username. ' deleted successfully!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div></center>';
        }
}

//update
if(isset($_POST['update'])){	
		    $updatequery = mysqli_query($conn,"UPDATE tbl_users SET password='$password', branch='$branch', type='$type' WHERE username = '$username'");
		   echo '<center><div class="alert alert-info fade in alert-dismissible show">' . $username. ' record updated!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>
	  </div></center>';

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


<h2>User Management</h2>
    <div class="container p-3 my-3 border">
	
    <form method="POST" action="adduser.php">
<label for="username">Username:</label>
<div class="input-group mb-3">
<input placeholder="Enter Username" class="form-control" type="text" name="username" value="<?php echo $db_username; ?>"  required>
<div class="input-group-append">
<input class="btn btn-success mb-2" type="submit" name="search" value="Search">
</div>
</div>


<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Password:</span>
    </div>
    <input type="password" name="password" class="form-control"  value="<?php echo $db_password; ?>">
	<div class="input-group-prepend">
      <span class="input-group-text">Confirm:</span>
    </div>
    <input type="password" name="cpassword" class="form-control"  >
  </div>


	<label for="branch">Branch:</label>
    <input type="text" name="branch" class="form-control"  value="<?php echo $db_branch; ?>">
	<label for="type">Type:</label>
    <input type="text" name="type" class="form-control"  value="emp" value="<?php echo $db_type; ?>">
	<label for="date_enrolled">Date/Time Enrolled:</label>
    <input type="text" name="date_enrolled" class="form-control"  value="<?php echo $db_date_enrolled; ?>" readonly>
    <input type="submit" name="add" class="btn btn-success mb-2" value="Add">&nbsp;<input type="submit" name="update" class="btn btn-success mb-2" value="Edit/Update">&nbsp;<input type="submit" name="delete" class="btn btn-success mb-2" value="Delete" onclick="return deleteconfig()">
    
    </form>
</div>
</div>
<?php include ('footer.php');?>
