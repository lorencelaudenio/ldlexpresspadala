<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");
include("global_variables.php");


//include("headers.php"); wag na maglagay conflict


$username = $password = "";

$username = $_POST['username'];
//$password = md5($_POST['password']);
$password = hash('sha256', $_POST['password']);
//echo $password;





if(isset($_POST['login'])){
		$query = mysqli_query($conn,"SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password' ");

        

		$check = mysqli_fetch_array($query);

        

		if(isset($check)){
			session_start();
			$_SESSION['s_username'] = $username;
			$_SESSION['s_password'] = $password;
            $_SESSION['s_branch'] = $check['branch'];
            $_SESSION['s_type'] = $check['type'];
			
				if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
					$ip = $_SERVER['HTTP_CLIENT_IP'];
				} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
					$ip = $_SERVER['REMOTE_ADDR'];
				}
			$_SESSION['s_ipadd'] = $ip;
			
			$updateip = mysqli_query($conn,"update tbl_users set ip_address='$ip' where username='$username'");
			
			header("location: index.php");//wag lagyan ng exit
		}else{
			echo "<script>alert('Login failed: Invalid username or password.')</script>";
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







<div class="login-form">
    <form action="login.php" method="post">
<center><img class="loginlogo" src="img/logo.png"/></center>
<b><center><small><font color="#e60000">LDL Padala Express</font></small>
</center></b>
        <h2 class="text-center">Log in</h2> 
		
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="login" class="btn btn-primary btn-block">Log in</button>
        </div>
			Login details: <br>username: <b>guest</b> <br>password: <b>bisita</b>
		<div>
		</div>
        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="#" class="float-right">Forgot Password?</a>
        </div>        
    </form>
    <p class="text-center"><a href="#">Create an Account</a></p>
</div>



