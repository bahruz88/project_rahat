<?php 
 
 
include('../session.php') ;
 
  //Create variables

$employee                              =$_POST['emplo'];
$work_experience_before_enterprise_year= $_POST['work_experience_before_enterprise_year'];
$work_experience_before_enterprise_month= $_POST['work_experience_before_enterprise_month'];
$work_experience_before_enterprise_day= $_POST['work_experience_before_enterprise_day'];
$work_experience_before_enterprise=$work_experience_before_enterprise_year.','.$work_experience_before_enterprise_month.','.$work_experience_before_enterprise_day;
$work_experience_enterprise=$_POST['work_experience_enterprise_year'].','.$_POST['work_experience_enterprise_month'].','.$_POST['work_experience_enterprise_day'];
$general_work_experience=$_POST['general_work_experience_year'].','.$_POST['general_work_experience_month'].','.$_POST['general_work_experience_day'];



$insert_date= date("Y-m-d h:i:sa") ;

    $sql = "INSERT INTO $tbl_work_experience(
	 id, emp_id, work_experience_before_enterprise, work_experience_enterprise, general_work_experience,insert_date)
	 VALUES (NULL, '$employee','$work_experience_before_enterprise','$work_experience_enterprise','$general_work_experience','$insert_date')";

  if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success" ;
    }
 
    //Close connection
    mysqli_close($db);

 
?>