<?php
include('../session.php') ;

$positionsid  = $_POST['update_positionsid_name'];
$prev_employer= $_POST['update_prev_employer'];
$start_date   = $_POST['update_start_date'];
$end_date     = $_POST['update_end_date'];
$leave_reason = $_POST['update_leave_reason'];
$sector       = $_POST['update_sector'];

$start_date = strtr( $start_date , '/', '-');
$start_date= date('Y-m-d', strtotime($start_date));

$end_date = strtr( $end_date , '/', '-');
$end_date= date('Y-m-d', strtotime($end_date));


$update_date= date("Y-m-d h:i:sa") ;

$sql = "UPDATE  $tbl_employee_prev_positions SET  
		prev_employer  = '$prev_employer',
		start_date = '$start_date',
		end_date = '$end_date',
		leave_reason = '$leave_reason',
		sector = '$sector', 
		update_date='$update_date' 
		WHERE id 	= '$positionsid' ";

if(mysqli_query($db, $sql) ) {
    echo "success";
}
else  {
    echo "error" .mysqli_error($db);
}

//Close connection
mysqli_close($db);


?>