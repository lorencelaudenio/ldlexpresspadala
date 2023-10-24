<?php
// Create connection
//$conn = new mysqli("localhost","root","","db_ldlpadalaexpress");
$conn = new mysqli("localhost","root","","id13211271_db_ldlexpress");
// $conn = new mysqli("sql104.infinityfree.com","if0_34821151","xZRvdH06Ds","if0_34821151_db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//load config beg
$searchquery = mysqli_query($conn,"SELECT * FROM config");
	$searchcount = mysqli_num_rows($searchquery);
	    if($searchcount == "0"){
		    
	    }else{		
		    while($row = mysqli_fetch_array($searchquery)){
			
			global $logo;
			global $comp_name;
			global $comp_add;
			global $comp_contact;
			global $comp_tagline;
			global $notice;
			global $interest;
			global $g_compAdd;
			global $g_compContact;
			global $g_email;
			global $g_fb;
			global $g_mission;
			global $g_vision;
		    $logo = $row['logo'] ?? null;
		    $comp_name = $row['compName'] ?? null;
            $comp_add = $row['compAdd'] ?? null;
            $comp_contact = $row['compContact'] ?? null;
            $comp_tagline = $row['compTagline'] ?? null;
            $notice = $row['notice'] ?? null;
			$interest = $row['interest'] ?? null;
			$g_compAdd = $row['compAdd'] ?? null;
			$g_compContact = $row['compContact'] ?? null;
			$g_email = $row['email'] ?? null;
			$g_fb = $row['fb'] ?? null;
			$g_mission = $row['mission'] ?? null;
			$g_vision = $row['vision'] ?? null;

            }
		}
//load config end

?>
