<?php 
 
 
include('../session.php') ;
 
  //Create variables

$employee     =$_POST['employee'];
$prev_employer= $_POST['prev_employer'];
$start_date   = $_POST['start_date'];
$end_date     = $_POST['end_date'];
$leave_reason = $_POST['leave_reason'];
$sector       = $_POST['sector'];
//$military_registration_date     = $_POST['military_registration_date'];

$start_date = strtr( $start_date , '/', '-');
$start_date= date('Y-m-d', strtotime($start_date));

$end_date = strtr( $end_date , '/', '-');
$end_date= date('Y-m-d', strtotime($end_date));

$insert_date= date("Y-m-d h:i:sa") ;

    $sql = "INSERT INTO $tbl_employee_prev_positions( 
	 id, emp_id, prev_employer, start_date, end_date, leave_reason, sector,insert_date) 
	 VALUES (NULL, '$employee','$prev_employer','$start_date','$end_date','$leave_reason','$sector','$insert_date')";
  

  if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success" ;
    }
 
    //Close connection
    mysqli_close($db);

 
?>