<?php 
include('../session.php') ;
	$id = $_POST['update_idn'];
	$emp_id = $_POST['update_emplo'];
	$company_id = $_POST['update_company_id'];
	$add_salary_id = $_POST['update_additionsDeductionsSalary'];
    $salary = $_POST['update_additions_salary'];
	$additions_currency=$_POST['update_additions_currency'];
	$begin_date=$_POST['update_begin_date'];
	$end_date=$_POST['update_end_date'];

$begin_date = strtr($begin_date, '/', '-');
$begin_date= date('Y-m-d', strtotime($begin_date));

$end_date = strtr($end_date, '/', '-');
$end_date= date('Y-m-d', strtotime($end_date));
$update_date =date('Y-m-d') ;

	$sql =   "UPDATE  $tbl_additions_deductions_salary SET 
		 emp_id = '$emp_id',
		company_id = '$company_id',
		add_salary_id = '$add_salary_id',
		salary = '$salary',
		additions_currency='$additions_currency',
		begin_date='$begin_date',
		end_date='$end_date'
		WHERE id = '$id' ";
 

  
    //Checking to see if name or email already exsist
	if(mysqli_query($db, $sql) ) {
      echo "success";
    }
    else  {
        echo "error" .$sql.'='.mysqli_error($db);
    }
 
    //Close connection
    mysqli_close($db);

 
?>