<?php 
 
 
include('../session.php') ;
 
  //Create variables

$employee =$_POST['emplo'];
 
$directorate=$_POST['directorate'];
$department=$_POST['department'];
$depart=$_POST['depart'];
$area_section=$_POST['area_section'];
$position=$_POST['position'];
$work_status=$_POST['status'];
//$direct_guide=$_POST['direct_guide'];
//$second_leader=$_POST['second_leader'];



$insert_date= date("Y-m-d h:i:sa") ;

    $sql = "INSERT INTO $tbl_employee_category(
	 id, emp_id, category, department, depart,insert_date)
	 VALUES (NULL, '$employee','$position','$department','$depart','$insert_date')";

  if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success" ;
    }
 
    //Close connection
    mysqli_close($db);

 
?>