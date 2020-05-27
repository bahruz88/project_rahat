<?php 
 
 
include('../session.php') ;
 
  //Create variables

$employee                       =$_POST['employee'];
$medical_app                    = $_POST['medical_app'];
$medical_renew_interval        = $_POST['medical_renew_interval'];
$medical_last_renew_date       = $_POST['medical_last_renew_date'];
$medical_physical_deficiency   = $_POST['medical_physical_deficiency'];
$medical_deficiency_desc       = $_POST['medical_deficiency_desc'];

$medical_last_renew_date = strtr($_POST['medical_last_renew_date'], '/', '-');
$medical_last_renew_date= date('Y-m-d', strtotime($medical_last_renew_date));

$insert_date= date("Y-m-d h:i:sa") ;

    $sql = "INSERT INTO $tbl_employee_medical_information(
	 id, emp_id, medical_app, renew_interval, last_renew_date, physical_deficiency, deficiency_desc,insert_date)
	 VALUES (NULL, '$employee','$medical_app','$medical_renew_interval','$medical_last_renew_date','$medical_physical_deficiency','$medical_deficiency_desc','$insert_date')";
//   $sql = "INSERT INTO $tbl_military_information (`id`, `emp_id`, `medical_app`, `renew_interval`, `last_renew_date`, `physical_deficiency`, `deficiency_desc`, `insert_user`, `update_user`, `insert_date`, `update_date`, `status`)
//VALUES (NULL, '$employee', '$medical_app', '$medical_renew_interval', '$medical_last_renew_date', '$medical_physical_deficiency', '$medical_deficiency_desc', '', '', '$insert_date', '', '1')";

  if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success" ;
    }
 
    //Close connection
    mysqli_close($db);

 
?>