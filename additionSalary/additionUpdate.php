<?php 
include('../session.php') ;
$command_code='';
	$id = $_POST['update_idn'];
	$emp_id = $_POST['update_emplo'];
	$company_id = $_POST['update_company_id'];
	$add_salary_id = $_POST['update_additionsDeductionsSalary'];
    $salary = $_POST['update_additions_salary'];
	$additions_currency=$_POST['update_additions_currency'];
	$begin_date=$_POST['update_begin_date'];
	$end_date=$_POST['update_end_date'];

if($add_salary_id=='2004'){
    $command_code=1;
}


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
/**select company info */
$sql_company = "SELECT * FROM $tbl_employee_company Where id='$company_id'";
$result_company  = $db->query($sql_company);
$data = array();
if ($result_company ->num_rows > 0) {
    while($row_company  = $result_company ->fetch_assoc()) {
        $enterprise_head_position=$row_company["enterprise_head_position"];
        $company_name=$row_company["company_name"];
        $company_address=$row_company["address"];
        $company_tel=$row_company["tel"];
        $voen=$row_company["bank_voen"];
        $sun=$row_company["sun"];
        $enterprise_head_fullname=$row_company["enterprise_head_fullname"];
    }
}
//insert Command table
if($command_code!=''){
    $sqlCommand = "INSERT INTO $tbl_employee_commands (id,command_id, emp_id,  company_id, enterprise_head_position, company_name, company_address, company_tel, voen, sun, enterprise_head_fullname) 
 VALUES ('Null',$command_code,'$emp_id','$company_id','$enterprise_head_position','$company_name','$company_address','$company_tel','$voen','$sun','$enterprise_head_fullname')";

//echo $sqlCommand;
    if(!mysqli_query($db, $sqlCommand)) {
        echo "Error=".$sqlCommand.'='.$emp_id.'=' .mysqli_error($db);
    }
    else {
//    echo "success";
    }
}
    //Close connection
    mysqli_close($db);

 
?>