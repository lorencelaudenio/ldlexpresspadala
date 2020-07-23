<?php 
ob_start();//important para no header error
include('conn.php');
include('global_variables.php');
include('headers.php');

//redirect to login if no variable set for empid
if(!isset($g_username) || empty($g_username)){
	header("location: login.php");
}
?>
<nav class="container bg-secondary text-white navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="rounded" style="width:40px;"></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navb">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Track</a>
      </li>
	<li class="nav-item">
        <a class="nav-link" href="send.php">Send</a>
      </li>
	<li class="nav-item">
        <a class="nav-link" href="receive.php">Receive</a>
      </li>
	<li class="nav-item">
        <a class="nav-link" href="view.php">View</a>
      </li>
	<li class="nav-item">
		<?php if ($g_type == 'admin'){echo '<a class="nav-link" href="admin.php">Admin</a>';}?>
      </li>
	<li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
    </ul>
      <a href="logout.php" class="btn btn-danger my-2 my-sm-0">Logout</a>
    </form>
  </div>
</nav>
