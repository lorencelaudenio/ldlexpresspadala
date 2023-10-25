<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("nav.php");
include("global_variables.php");
echo '<div class="container p-3 bg-primary text-white">';
include("verify_if_admin.php");

$username = $_POST['username'] ?? null;
$password = $_POST['password']  ?? null;
$cpassword = $_POST['cpassword']  ?? null;
$branch = $_POST['branch']  ?? null;
$type = $_POST['type']  ?? null;
$date_enrolled = $g_date_time;
$selected="";
$password = md5($password);
$cpassword = md5($cpassword);

//add
if(isset($_POST['add'])){
    
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
    $searchdeletequery = mysqli_query($conn,"SELECT * FROM tbl_users WHERE username = '$username'");
	$searchdeletecount = mysqli_num_rows($searchdeletequery);
	    if($searchdeletecount == "0"){
		    echo '<center><div class="alert alert-info fade in alert-dismissible show">' . $username. ' was not found!
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

 include('scripts.php');?>

<title>User Management | <?php echo $comp_name; ?></title>


<h2>User Management</h2>
    <div class="container p-3 my-3 border">
	
    <form method="POST" action="adduser.php">
<label for="username">Username:</label>
<div class="input-group mb-3">
<input placeholder="Enter Username" class="form-control" type="text" name="username" value="<?php echo $db_username ?? null; ?>"  required>
<div class="input-group-append">
<input class="btn btn-success mb-2" type="submit" name="search" value="Search">
</div>
</div>


<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Password:</span>
    </div>
    <input type="password" name="password" class="form-control"  value="<?php echo md5($db_password) ?? null; ?>">
	<div class="input-group-prepend">
      <span class="input-group-text">Confirm:</span>
    </div>
    <input type="password" name="cpassword" class="form-control"  >
  </div>


	<label for="branch">Branch:</label>
    <input type="text" name="branch" class="form-control"  value="<?php echo $db_branch ?? null; ?>">
	<label for="type">Type:</label>
    <!-- <input type="text" name="type" class="form-control"   value="<?php echo $db_type ?? null; ?>"> -->
    <select name="type" class="form-control">
<option value="0">Please Select Option</option>
<option value="admin" <?php if($db_type=="admin") echo 'selected="selected"' ?? null; ?> >Admin</option>
<option value="emp" <?php if($db_type=="emp") echo 'selected="selected"' ?? null; ?> >Employee</option>
</select>
	<label for="date_enrolled">Date/Time Enrolled:</label>
    <input type="text" name="date_enrolled" class="form-control"  value="<?php echo $db_date_enrolled ?? null; ?>" readonly>




    


    <input type="submit" name="add" class="btn btn-success mb-2" value="Add">&nbsp;<input type="submit" name="update" class="btn btn-success mb-2" value="Edit/Update">&nbsp;<input type="submit" name="delete" class="btn btn-success mb-2" value="Delete" onclick="return deleteconfig()">
    
    </form>
</div>
</div>
<?php include ('footer.php');?>
