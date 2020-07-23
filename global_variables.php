<?php
include("conn.php");
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
global $g_fees;


$g_title = " | LDL Express Padala";
$g_username = $_SESSION['s_username'];
$g_password = $_SESSION['s_password'];
$g_branch = $_SESSION['s_branch'];
$g_type = $_SESSION['s_type'];
$g_date_time = date("Y-m-d h:i:s");
$g_logged_info = $g_username . " - " . $g_branch;
$g_logo = "img/logo.png";
$g_receipttitle = "LDL Express Padala";
$g_tagline = "Money On-The-Fly!";
$g_address = "Head Office: Lumintao, Malawaan, Rizal, Occ. Mindoro";
$g_contactinfo = "Customer Service: 09488157847/09272053904";
$g_today = date("Y-m-d");
$g_fees = 0.02;
?>
