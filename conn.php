<?php

// Create connection
$conn = new mysqli("localhost","root","","id13211271_db_ldlexpress");
//$conn = new mysqli("localhost","id13211271_user_lorence","04072020Ldl!","id13211271_db_ldlexpress");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
