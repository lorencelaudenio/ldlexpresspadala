<?php
include("headers.php");
include("global_variables.php");
include("conn.php");
?>
<title>Session Expired | <?php echo $comp_name;?></title>


<section class="vh-100 " style="background-color: hsl(0, 0%, 96%)">
    <div class="container py-3 h-100  col-md-4 rounded">
    <div class="row d-flex  justify-content-center align-items-center h-100">
        <div class="card   shadow " style="border-radius: 1rem;">
            <div class="container text-center pt-3">
                <img class="img-fluid rounded-circle" src="<?php echo $logo;?>"  style="width:85px;">
            </div>
            <div class="card-body p-4 text-center">
                <h5 class="card-title text-center"><strong><?php echo $comp_name;?></strong></h5>
                <div class='dropdown-divider'></div>
                <p>Your session has expired. Please <a href="login.php">click here</a> to log in again.</p>

                <div class="small alert alert-danger mt-3 text-muted" role="alert">
                    <p class="small text-muted">(For security purposes, you have been logged out to prevent unauthorized access to your <?php echo $comp_name;?> account.)</p>
                </div>
                <div class="col footer-copyright text-right py-3 small text-muted"><small>Copyright &copy; <?php echo date("Y") . " " . $comp_name;?></small></div>
            </div>
        </div>
    </div>
    </div>
</section>