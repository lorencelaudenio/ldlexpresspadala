<?php
// Create connection
//$conn = new mysqli("localhost","root","","db_ldlpadalaexpress");
$conn = new mysqli("localhost","root","","id13211271_db_ldlexpress");
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
		    $logo = $row['logo'] ?? null;
		    $comp_name = $row['compName'] ?? null;
            $comp_add = $row['compAdd'] ?? null;
            $comp_contact = $row['compContact'] ?? null;
            $comp_tagline = $row['compTagline'] ?? null;
            $notice = $row['notice'] ?? null;
		   

            }
		}
//load config end

?>
