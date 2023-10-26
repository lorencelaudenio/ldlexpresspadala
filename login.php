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




<title>Login | <?php echo $comp_name;?></title>





<section class="vh-100 ">
    <div class="container py-3 h-100  col-md-4 rounded">
    <div class="row d-flex  justify-content-center align-items-center h-100">
        <div class="card   shadow rounded" >
            <div class="card-body p-4 text-center">
                <form class="col-12" method="POST" action="login.php">
                    <div class="text-center">
                        <img class="loginlogo rounded-circle img-fluid " src="<?php echo $logo;?>" style="width:85px;"/><br>
                        <small><?php echo $comp_name;?> Login</small>
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Enter username" required>
                        <!-- <small id="usernameHelp" class="form-text text-muted">We'll never share your details with anyone else.</small> -->
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" aria-label="Enter password" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><i class="bi bi-eye" onclick="ShowPass()"></i></span>
                        </div>
                    </div>
                    
                    <input type="submit" name="login" value="Login" class="btn btn-primary">

                    <div class="small alert alert-danger mt-3 text-muted" role="alert">
                        <b>DISCLAIMER:</b> Unauthorized access to this website is strictly prohibited and may be subject to legal action.
                    </div>
                </form>   
            </div>
        </div>
    </div>
    </div>
</section>



