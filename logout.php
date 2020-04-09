<?php
include("conn.php");

session_start();

//unset session variables
$_SESSION = array();

session_destroy();

//NOT header("location: login.php");
exit(header("Location: /login.php"));
exit;
?>
