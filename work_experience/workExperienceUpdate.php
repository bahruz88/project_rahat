<?php
include('../session.php') ;
$update_workExperienceid                          = $_POST['update_workExperienceid_name'];

$update_work_experience_before_enterprise=$_POST['update_work_experience_before_enterprise_year'].','.$_POST['update_work_experience_before_enterprise_month'].','.$_POST['update_work_experience_before_enterprise_day'];
$update_work_experience_enterprise=$_POST['update_work_experience_enterprise_year'].','.$_POST['update_work_experience_enterprise_month'].','.$_POST['update_work_experience_enterprise_day'];
$update_general_work_experience=$_POST['update_general_work_experience_year'].','.$_POST['update_general_work_experience_month'].','.$_POST['update_general_work_experience_day'];

	$update_date= date("Y-m-d h:i:sa") ;

	$sql = "UPDATE  $tbl_work_experience SET  
		work_experience_before_enterprise  = '$update_work_experience_before_enterprise',
		work_experience_enterprise = '$update_work_experience_enterprise',		
		general_work_experience = '$update_general_work_experience',		
		update_date='$update_date'
		WHERE id 	= '$update_workExperienceid' ";

	if(mysqli_query($db, $sql) ) {
      echo "success";
    }
    else  {
      echo "error" .mysqli_error($db);
    }

    //Close connection
    mysqli_close($db);


?>