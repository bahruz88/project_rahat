<?php 
include('../session.php') ;
$medicalid                     = $_POST['update_medicalid_name'];
$medical_medical_app           = $_POST['update_medical_app'];
$medical_renew_interval        = $_POST['update_renew_interval'];
$medical_last_renew_date       = $_POST['update_last_renew_date'];
$medical_physical_deficiency   = $_POST['update_physical_deficiency'];
$medical_deficiency_desc       = $_POST['update_deficiency_desc'];


$medical_last_renew_date = strtr( $medical_last_renew_date , '/', '-');
$medical_last_renew_date= date('Y-m-d', strtotime($medical_last_renew_date));


	$update_date= date("Y-m-d h:i:sa") ;
	
	$sql = "UPDATE  $tbl_employee_medical_information SET  
		medical_app  = '$medical_medical_app',
		renew_interval = '$medical_renew_interval',
		last_renew_date = '$medical_last_renew_date',
		physical_deficiency = '$medical_physical_deficiency',
		deficiency_desc = '$medical_deficiency_desc', 		
		update_date='$update_date' 
		WHERE id 	= '$medicalid' ";
  
	if(mysqli_query($db, $sql) ) {
      echo "success";
    }
    else  {
      echo "error" .mysqli_error($db);
    }
 
    //Close connection
    mysqli_close($db);

 
?>