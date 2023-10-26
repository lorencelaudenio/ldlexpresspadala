<?php
$password = md5($password);
$loginsql = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password' ";
?>
