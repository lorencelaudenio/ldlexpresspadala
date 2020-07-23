<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("global_variables.php");


//include("headers.php"); wag na maglagay conflict


$username = $password = "";

$username = $_POST['username'];
$password = md5($_POST['password']);

if(isset($_POST['login'])){
		$query = mysqli_query($conn,"SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password' ");

        

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
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
<link rel="icon" href="img/logo.png" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="style.css">
<title>Login | LDL Express Padala</title>



<!--<div class="container p-5 my-5 bg-primary text-white col-md-4 shadow">-->
<div class="container shadow p-3 mb-5 bg-white rounded col-md-4">
<center><img class="loginlogo" src="img/logo.png"/></center>
<b><center><small><font color="#e60000">LDL Padala Express Login</font></small></center></b>

<form method="POST" action="login.php">
<div class="form-group">
<label for="username">Username:</label>
<input type="text" name="username" class="form-control" placeholder="Enter Username" required >
</div>
<div class="form-group">
<label for="password">Password:</label>
<input type="password" name="password" class="form-control" placeholder="Enter Password" required><br>
<input type="submit" name="login" value="Login" class="btn btn-success">
</form>
</div>

</div>



