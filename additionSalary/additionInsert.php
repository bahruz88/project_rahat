<?php 
 
 
include('../session.php') ;


  //Create variables
    $company_id = $_POST['company_id'];
    $emp_id = $_POST['emplo'];
	$add_salary_id=$_POST['additionsDeductionsSalary'];
	$salary=$_POST['additions_salary'];
    $additions_currency = $_POST['additions_currency'];
    $begin_date = $_POST['begin_date'];
	$end_date = $_POST['end_date'];





$begin_date = strtr($begin_date, '/', '-');
$begin_date= date('Y-m-d', strtotime($begin_date));

$end_date = strtr($end_date, '/', '-');
$end_date= date('Y-m-d', strtotime($end_date));
$insert_date =date('Y-m-d') ;

    $sql = "INSERT INTO $tbl_additions_deductions_salary (id,emp_id,company_id, add_salary_id, salary, additions_currency,begin_date, end_date, insert_date)
 VALUES ('Null','$emp_id','$company_id','$add_salary_id','$salary','$additions_currency','$begin_date', '$end_date','$insert_date')";


  if(!mysqli_query($db, $sql)) {
        echo "Error" .$sql. '='.mysqli_error($db);
    }
    else {
        echo "success";
    }

    //Close connection
    mysqli_close($db);

 
?>