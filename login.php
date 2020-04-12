<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
include("conn.php");


$username = $password = "";

$username = $_POST['username'];
$password = $_POST['password'];

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
			echo "<script>alert('Username/password incorrect!')</script>";
		}
}


?>


<link rel="stylesheet" type="text/css" href="style.css">
<title>Login | LDL Express Padala</title>


<div class="shadow">
<center><img class="loginlogo" src="img/logo.png"/></center><br>
<b><center><div class=""><small><font color="#e60000">LDL Padala Express Login</font></small></div></center></b><br>
<form method="POST" action="login.php">
Username: <br>
<input type="text" name="username" class="logintext" placeholder="Enter Username" required ><br>
Password: <br>
<input type="password" name="password" class="logintext" placeholder="Enter Password" required><br>
<input type="submit" name="login" value="Login" class="loginbtn2">
</form>
<?php include ('footer.php');?>
</div>


<br>

