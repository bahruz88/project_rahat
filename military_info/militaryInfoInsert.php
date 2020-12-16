<?php 
 
 
include('../session.php') ;
 
  //Create variables

$employee                       =$_POST['emplo'];
$military_reg_group             = $_POST['military_reg_group'];
$military_reg_category          = $_POST['military_reg_category'];
$military_staff                 = $_POST['military_staff'];
$military_rank                  = $_POST['military_rank'];
$military_specialty_acc         = $_POST['military_specialty_acc'];
$military_fitness_service       = $_POST['military_fitness_service'];
$military_registration_service  = $_POST['military_registration_service'];
//$military_registration_date     = $_POST['military_registration_date'];

$military_registration_date = strtr($_POST['military_registration_date'], '/', '-');
$military_registration_date= date('Y-m-d', strtotime($military_registration_date));

$military_general               = $_POST['military_general'];
$military_special               = $_POST['military_special'];
$military_no_official           = $_POST['military_no_official'];
$military_additional_information= $_POST['military_additional_information'];
//$military_date_completion       = $_POST['military_date_completion'];

$military_date_completion = strtr($_POST['military_date_completion'], '/', '-');
$military_date_completion= date('Y-m-d', strtotime($military_date_completion));
$insert_date= date("Y-m-d h:i:sa") ;

    $sql = "INSERT INTO $tbl_military_information( 
	 id, emp_id, military_reg_group, military_reg_category, military_staff, military_rank, military_specialty_acc,
	 military_fitness_service,military_registration_service,military_registration_date,military_general, 
	 military_special,military_no_official,military_additional_information,military_date_completion,insert_date) 
	 VALUES (NULL, '$employee','$military_reg_group','$military_reg_category','$military_staff','$military_rank','$military_specialty_acc',
	 '$military_fitness_service','$military_registration_service','$military_registration_date','$military_general','$military_special','$military_no_official','$military_additional_information','$military_date_completion','$insert_date')";
  

  if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success" ;
    }
 
    //Close connection
    mysqli_close($db);

 
?>