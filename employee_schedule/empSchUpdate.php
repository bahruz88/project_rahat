<?php 
 
include('../session.php') ;

  //Create variables
    $update_sch_id_name=$_POST['update_sch_id_name'];
	$update_tm_type_name=$_POST['update_tm_type_name'];
	$update_reduce_type_name=$_POST['update_reduce_type_name'];
	$update_reduce_reason_name=$_POST['update_reduce_reason_name'];
    $update_red_working_hours_name = $_POST['update_red_working_hours_name'];
	$update_empschid_name = $_POST['update_empsch_name'];
	$update_employee_id_name = $_POST['update_employee_id_name'];
	$company_id_name = $_SESSION["CompanyId"];
	
 
//-$passport_date=date('Y-m-d',strtotime($passport_date));
 			
$sql="
update  $tbl_employee_schedules SET 

emp_id='$update_employee_id_name' ,
sch_id='$update_sch_id_name',
tm_type='$update_tm_type_name' ,
reduce_type='$update_reduce_type_name',
reduce_reason='$update_reduce_reason_name' ,
reduce_hours='$update_red_working_hours_name',
update_user= '$uid'
where id='$update_empschid_name' "; 

  if(!mysqli_query($db, $sql)) {
        echo "Error" .mysqli_error($db);
    }
    else {
        echo "success";
    }
 
    //Close connection
    mysqli_close($db);

 
?>