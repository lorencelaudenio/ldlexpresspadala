<?php
session_start();
global $g_title;
global $g_logged_info;
global $g_username;
global $g_password;
global $g_branch;
global $g_type;
global $g_date_time;
global $g_logo;
global $g_receipttitle;
global $g_tagline;
global $g_address;
global $g_contactinfo;
global $g_today;



$g_username = $_SESSION['s_username'] ?? null;
$g_password = $_SESSION['s_password']  ?? null;
$g_branch = $_SESSION['s_branch']  ?? null;
$g_type = $_SESSION['s_type']  ?? null;
$g_date_time = date("Y-m-d h:i:s");
$g_logged_info = $g_username . " - " . $g_branch;
$g_today = date("Y-m-d");


?>
