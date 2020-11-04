<?php 
 
 
include('../session.php') ;
$command_code='';


  //Create variables
    $company_id = $_POST['company_id_add'];
    $emp_id = $_POST['emplo'];
	$add_salary_id=$_POST['additionsDeductionsSalary'];
	$salary=$_POST['additions_salary'];
    $additions_currency = $_POST['additions_currency'];
    $begin_date = $_POST['begin_date'];
	$end_date = $_POST['end_date'];
	if($add_salary_id=='2004'){
        $command_code=1;
    }





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