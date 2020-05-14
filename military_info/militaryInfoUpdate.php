<?php 
include('../session.php') ;
$update_militaryid_name = $_POST['update_militaryid_name'];
$employee                       =$_POST['employee'];
$military_reg_group             = $_POST['military_reg_group'];
$military_reg_category          = $_POST['military_reg_category'];
$military_staff                 = $_POST['staff_desc'];
$military_rank                  = $_POST['rank_desc'];
$military_specialty_acc         = $_POST['military_specialty_acc'];
$military_fitness_service       = $_POST['military_fitness_service'];
$military_registration_service  = $_POST['military_registration_service'];
$military_registration_date     = $_POST['military_registration_date'];
$military_general               = $_POST['military_general'];
$military_special               = $_POST['military_special'];
$military_no_official           = $_POST['military_no_official'];
$military_additional_information= $_POST['military_additional_information'];
$military_date_completion       = $_POST['military_date_completion'];
	
	$update_date= date("Y-m-d h:i:sa") ;
	
	$sql = "UPDATE  $tbl_military_information SET 
		emp_id  = '$employee',
		military_reg_group  = '$military_reg_group',
		military_reg_category = '$military_reg_category',
		military_staff = '$military_staff',
		military_rank = '$military_rank',
		military_specialty_acc = '$military_specialty_acc' 
		military_fitness_service = '$military_fitness_service' 
		military_registration_service = '$military_registration_service' 
		military_registration_date = '$military_registration_date' 
		military_general = '$military_general' 
		military_special = '$military_special' 
		military_no_official = '$military_no_official' 
		military_additional_information = '$military_additional_information' 
		military_date_completion = '$military_date_completion' 
		WHERE id 	= '$update_militaryid_name' ";
  
	if(mysqli_query($db, $sql) ) {
      echo "success" ;  
    }
    else  {
      echo "error" .mysqli_error($db);
    }
 
    //Close connection
    mysqli_close($db);

 
?>