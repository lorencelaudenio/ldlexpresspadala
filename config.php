<?php
error_reporting (E_ALL ^ E_NOTICE); //para no undefined error
session_start();

//variables beg
$logo = $_POST['name'] ?? null;
$compName = $_POST['comp_name'] ?? null;
$compAdd = $_POST['comp_add'] ?? null;
$compContact = $_POST['comp_contact'] ?? null;
$compTagline = $_POST['comp_tagline'] ?? null;
$compNotice = $_POST['comp_notice'] ?? null;
$Interest = $_POST['interest'] ?? null;
//variables end


include("conn.php");
include("nav.php");
include("global_variables.php");
include("verify_if_admin.php");







//save config beg
if(isset($_POST['save_config'])){
    $updateconfig= mysqli_query($conn,"UPDATE config SET logo='$logo', compName='$compName', compAdd='$compAdd', compContact='$compContact', compTagline='$compTagline', notice='$compNotice' WHERE config = 'config'");

    $image=$_FILES['image']['name']; 
     //$imageArr=explode('.',$image); //first index is file name and second index file type
     //$rand=rand(10000,99999);
     //$newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
     $newImageName="logo.png";
     $uploadPath="img/".$newImageName;
     $isUploaded=move_uploaded_file($_FILES["image"]["tmp_name"],$uploadPath);
    //  if($isUploaded)
    //    echo 'successfully file uploaded';
    //  else
    //    echo 'something went wrong';
}
//save config end

//load config beg
$searchquery = mysqli_query($conn,"SELECT * FROM config");
	$searchcount = mysqli_num_rows($searchquery);
	    if($searchcount == "0"){
		    
	    }else{		
		    while($row = mysqli_fetch_array($searchquery)){
			
		    $db_logo = $row['logo'];
		    $db_comp_name = $row['compName'];
            $db_comp_add = $row['compAdd'];
            $db_comp_contact = $row['compContact'];
            $db_comp_tagline = $row['compTagline'];
            $db_comp_notice = $row['notice'];
            $db_interest = $row['interest'];
		   

            }
		}
//load config end
?>
<title>Admin Config | <?php echo $comp_name;?></title>
<div class="container p-3 my-3 border">
    <form method="POST" action="config.php" enctype="multipart/form-data">
    <img src="<?php echo $db_logo ?? null; ?>" alt="logo" class="img-thumbnail" style="width:100px;">

    <label for="logo">Logo:</label>
    <input type="file" name="image" ><br>
        <!-- <input type="text"  class="form-control" name="logo" value="<?php echo $db_logo ?? null; ?>"> -->
        <label for="comp_name">Company Name:</label>
        <input type="text" name="comp_name" class="form-control" value="<?php echo $db_comp_name ?? null; ?>">
        <label for="comp_address">Company Address:</label>
        <input type="text"  class="form-control" name="comp_add" value="<?php echo $db_comp_add ?? null; ?>" >
        <label for="comp_contact">Company Contact:</label>
        <input type="text"  class="form-control" maxlength="11" name="comp_contact" value="<?php echo $db_comp_contact ?? null; ?>" >
        <label for="comp_tagline">Company Tagline:</label>
        <input type="text"  class="form-control" name="comp_tagline" value="<?php echo $db_comp_tagline ?? null; ?>" >
        <label for="notice">Notice:</label>
        <input type="text"  class="form-control" name="comp_notice" value="<?php echo $db_comp_notice ?? null; ?>" >
        <label for="notice">Interest:</label>
        <input type="text"  class="form-control" name="interest" value="<?php echo $db_interest ?? null; ?>" >
        <input type="submit" name="save_config" class="btn btn-success mb-2" value="Save Config" onclick="return confirm_save()">
    </form>
</div>
<?php include('scripts.php');?>



