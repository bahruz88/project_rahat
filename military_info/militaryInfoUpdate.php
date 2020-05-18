<?php 
include('../session.php') ;
$militaryid                     = $_POST['update_militaryid_name'];
$military_reg_group             = $_POST['update_military_reg_group'];
$military_reg_category          = $_POST['update_military_reg_category'];
$military_staff                 = $_POST['update_staff_desc'];
$military_rank                  = $_POST['update_rank_desc'];
$military_specialty_acc         = $_POST['update_military_specialty_acc_name'];
$military_fitness_service       = $_POST['update_military_fitness_service_name'];
$military_registration_service  = $_POST['update_military_registration_service_name'];

$military_registration_date = strtr($_POST['update_military_registration_date_name'], '/', '-');
$military_registration_date= date('Y-m-d', strtotime($military_registration_date));

$military_general               = $_POST['update_military_general_name'];
$military_special               = $_POST['update_military_special_name'];
$military_no_official           = $_POST['update_military_no_official_name'];
$military_additional_information= $_POST['update_military_additional_information_name'];
//$military_date_completion       = $_POST['update_military_date_completion'];

$military_date_completion = strtr($_POST['update_military_date_completion_name'], '/', '-');
$military_date_completion= date('Y-m-d', strtotime($military_date_completion));


	$update_date= date("Y-m-d h:i:sa") ;
	
	$sql = "UPDATE  $tbl_military_information SET  
		military_reg_group  = '$military_reg_group',
		military_reg_category = '$military_reg_category',
		military_staff = '$military_staff',
		military_rank = '$military_rank',
		military_specialty_acc = '$military_specialty_acc', 
		military_fitness_service = '$military_fitness_service', 
		military_registration_service = '$military_registration_service', 
		military_registration_date = '$military_registration_date', 
		military_general = '$military_general', 
		military_special = '$military_special', 
		military_no_official = '$military_no_official', 
		military_additional_information = '$military_additional_information', 
		military_date_completion = '$military_date_completion', 
		update_date='$update_date' 
		WHERE id 	= '$militaryid' ";
  
	if(mysqli_query($db, $sql) ) {
      echo "success" ;  
    }
    else  {
      echo "error" .mysqli_error($db);
    }
 
    //Close connection
    mysqli_close($db);

 
?>