<?php 
 
include('../session.php') ;
 
  //Create variables

	$employee_id_name=$_POST['employee_id_name'];
	$ovr_start_date_name=$_POST['ovr_start_date_name'];
    $ovr_end_date_name = $_POST['ovr_end_date_name'];
	$calc_status_name = $_POST['calc_status_name'];
	$overtime_period_name = $_POST['overtime_period_name'];
	$overtime_status_name = $_POST['overtime_status_name'];
	$ovr_start_date_name = strtr($ovr_start_date_name, '/', '-');
	$ovr_start_date_name= date('Y-m-d', strtotime($ovr_start_date_name));

	$ovr_end_date_name = strtr($ovr_end_date_name, '/', '-');
	$ovr_end_date_name= date('Y-m-d', strtotime($ovr_end_date_name));

 	$query = mysqli_query($db,"SELECT * FROM $tbl_employee_overtimes WHERE emp_id='$employee_id_name' and status=1");	
	
//-$passport_date=date('Y-m-d',strtotime($passport_date));
if(mysqli_num_rows($query) > 0){
echo "duplicate";

}
else {
$sql = "INSERT INTO $tbl_employee_overtimes (
		  id ,	emp_id ,		start_date ,			expire_date, 			calc_status ,		overtime_status, 		overtime_period, 		insert_user ) 
VALUES (NULL, '$employee_id_name', '$ovr_start_date_name', '$ovr_end_date_name', '$calc_status_name', '$overtime_status_name', '$overtime_period_name','$uid') ";


  if(!mysqli_query($db, $sql)) {
        echo "Error" .mysqli_error($db);
    }
    else {
        echo "success";
    }
 }
    //Close connection
    mysqli_close($db);

 
?>