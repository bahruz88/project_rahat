<?php 
 
 
include('../session.php') ;
 
  //Create variables

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

    $sql = "INSERT INTO $tbl_military_information( 
	 id, emp_id, military_reg_group, military_reg_category, military_staff, military_rank, military_specialty_acc,
	 military_fitness_service,military_registration_service,military_registration_date,military_general,military_general, 
	 military_special,military_no_official,military_additional_information,military_date_completion) 
	 VALUES (NULL, '$employee','$military_reg_group','$military_reg_category','$military_staff','$military_rank','$military_specialty_acc',
	 $military_fitness_service,$military_registration_service,$military_registration_date,$military_general,$military_special,$military_no_official,$military_additional_information,$military_date_completion)";
  

  if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success" ;
    }
 
    //Close connection
    mysqli_close($db);

 
?>