<?php 
 
include('../session.php') ;

  //Create variables
    $ovrid=$_POST['update_ovrid_name'];
	$update_employee_id_name=$_POST['update_employee_id_name'];
	$update_ovr_start_date_name=$_POST['update_ovr_start_date_name'];
    $update_ovr_end_date_name = $_POST['update_ovr_end_date_name'];
	$update_calc_status_name = $_POST['update_calc_status_name'];
	$update_overtime_period_name = $_POST['update_overtime_period_name'];
	$update_overtime_status_name = $_POST['update_overtime_status_name'];
	$update_ovr_start_date_name = strtr($update_ovr_start_date_name, '/', '-');
	$update_ovr_start_date_name= date('Y-m-d', strtotime($update_ovr_start_date_name));
	$update_ovr_end_date_name = strtr($update_ovr_end_date_name, '/', '-');
	$update_ovr_end_date_name= date('Y-m-d', strtotime($update_ovr_end_date_name));
	
 



 
//-$passport_date=date('Y-m-d',strtotime($passport_date));

$sql="
update  $tbl_employee_overtimes SET 

emp_id='$update_employee_id_name' ,
start_date='$update_ovr_start_date_name' ,
expire_date='$update_ovr_end_date_name',
calc_status='$update_calc_status_name' ,
overtime_status='$update_overtime_status_name' ,
overtime_period='$update_overtime_period_name',
update_user= '$uid'
where id='$ovrid' "; 

  if(!mysqli_query($db, $sql)) {
        echo "Error" .mysqli_error($db);
    }
    else {
        echo "success";
    }
 
    //Close connection
    mysqli_close($db);

 
?>