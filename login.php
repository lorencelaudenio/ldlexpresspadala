<?php
// include("headers.php");
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
session_start();

$username = $password = "";

$username = $_POST['username']  ?? null;
$password = $_POST['password']  ?? null;


include("conn.php");
include("global_variables.php");
include("scripts.php");




//include("headers.php"); wag na maglagay conflict




if(isset($_POST['login'])){
		include("sql.php");
		$query = mysqli_query($conn, $loginsql);

        

		$check = mysqli_fetch_array($query);

        

		if(isset($check)){
			session_start();
			$_SESSION['s_username'] = $username;
			$_SESSION['s_password'] = $password;
            $_SESSION['s_branch'] = $check['branch'];
            $_SESSION['s_type'] = $check['type'];
			header("location: index.php");//wag lagyan ng exit
		}else{
			echo "<script>alert('Username or password was incorrect. Please try again.')</script>";
		}
}

include("headers.php");
?>



<link rel="stylesheet" type="text/css" href="style.css">
<title>Login | <?php echo $comp_name;?></title>



<!--<div class="container p-5 my-5 bg-primary text-white col-md-4 shadow">-->
<div class="container shadow p-3 mb-5 bg-white rounded col-md-4">
<center><img class="loginlogo rounded-circle" src="<?php echo $logo;?>" /></center>
<b><center><small><font color="#e60000"><?php echo $comp_name;?> Login</font></small></center></b>

<form method="POST" action="login.php">
<div class="form-group">
<label for="username">Username:</label>
<input type="text" name="username" class="form-control" placeholder="Enter Username" required >
</div>
<div class="form-group">
<label for="password">Password:</label>
<input type="password" name="password" class="form-control" placeholder="Enter Password" required><br>
<i class="fa fa-eye toggle icon"></i>
<input type="submit" name="login" value="Login" class="btn btn-success">
</form>
</div>

</div>



