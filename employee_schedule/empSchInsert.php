<?php 
 
include('../session.php') ;

 

  //Create variables

	$employee_id_name = $_POST['employee_id_name'];
	$sch_id_name = $_POST['sch_id_name'];
	$tm_type_name = $_POST['tm_type_name'];
	$reduce_type_name = $_POST['reduce_type_name'];
	$reduce_reason_name = $_POST['reduce_reason_name'];
	$red_working_hours_name = $_POST['red_working_hours_name'];
	
//-$passport_date=date('Y-m-d',strtotime($passport_date));
$sql = "INSERT INTO $tbl_employee_schedules (
				id,emp_id ,			sch_id ,		tm_type, 		reduce_type, 		reduce_reason, 	reduce_hours,  insert_user  ) 
VALUES (NULL, '$employee_id_name', '$sch_id_name', '$tm_type_name', '$reduce_type_name', '$reduce_reason_name',  '$red_working_hours_name', '$uid') ";
  

  if(!mysqli_query($db, $sql)) {
        echo "Error" .mysqli_error($db);
    }
    else {
        echo "success";
    }
 
    //Close connection
    mysqli_close($db);

 
?>