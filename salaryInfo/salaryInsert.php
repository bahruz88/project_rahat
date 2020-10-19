<?php
include('../session.php') ;


  //Create variables
    $emp_id = $_POST['emplo'];
	$tariffRate=$_POST['tariffRate'];
	$positionStatus=$_POST['positionStatus'];
    $wage = $_POST['wage'];
    $wage_currency = $_POST['wage_currency'];
	$reasonChange = $_POST['reasonChange'];
	$totalMonthlySalary = $_POST['totalMonthlySalary'];
	$prizeAmount = $_POST['prizeAmount'];
	$prizeAmount_currency = $_POST['prizeAmount_currency'];
	$rewardPeriod = $_POST['rewardPeriod'];
	$placeExpenditure = $_POST['placeExpenditure'];
	$otherCondition1 = $_POST['otherCondition1'];
	$otherCondition2 = $_POST['otherCondition2'];
	$otherCondition3 = $_POST['otherCondition3'];

	$company_id = $_POST['company_id'];

    $sql = "INSERT INTO $tbl_salary_info (id,emp_id,company_id, tariff_rate, position_status_id, wage,wage_currency, total_monthly_salary, prize_amount,prize_amount_currency, reward_period,
 place_expenditure_id,salary_change_reason, other_conditions1, other_conditions2, other_conditions3)
 VALUES ('Null','$emp_id','$company_id','$tariffRate','$positionStatus','$wage','$wage_currency', '$totalMonthlySalary','$prizeAmount','$prizeAmount_currency','$rewardPeriod','$placeExpenditure','$reasonChange','$otherCondition1','$otherCondition2','$otherCondition3')";


  if(!mysqli_query($db, $sql)) {
        echo "Error" .$sql. '='.mysqli_error($db);
    }
    else {
        echo "success";
    }

$sql_company = "SELECT * FROM $tbl_employee_company Where id='$company_id'";
$result_company  = $db->query($sql_company);
$data = array();
//echo $company_id.'='.$sql_company;
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
if($reasonChange!=''){
    $sqlCommand = "INSERT INTO $tbl_employee_commands (id,command_id, emp_id,  company_id, enterprise_head_position, company_name, company_address, company_tel, voen, sun, enterprise_head_fullname) 
 VALUES ('Null','6','$emp_id','$company_id','$enterprise_head_position','$company_name','$company_address','$company_tel','$voen','$sun','$enterprise_head_fullname')";

//echo $sqlCommand;
    if(!mysqli_query($db, $sqlCommand)) {
        echo "Error=".$sqlCommand.'='.$emp_id.'=' .mysqli_error($db);
    }
    else {
//    echo "success";
    }
}

//insert Command table
if($prizeAmount!=''){
    $sqlCommand2 = "INSERT INTO $tbl_employee_commands (id,command_id, emp_id,  company_id, enterprise_head_position, company_name, company_address, company_tel, voen, sun, enterprise_head_fullname) 
 VALUES ('Null','11','$emp_id','$company_id','$enterprise_head_position','$company_name','$company_address','$company_tel','$voen','$sun','$enterprise_head_fullname')";

//echo $sqlCommand;
    if(!mysqli_query($db, $sqlCommand2)) {
        echo "Error=".$sqlCommand2.'='.$emp_id.'=' .mysqli_error($db);
    }
    else {
//    echo "success";
    }
}





    //Close connection
    mysqli_close($db);

 
?>