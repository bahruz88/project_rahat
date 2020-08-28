<?php 
 
 
include('../session.php') ;

//function generateRandomString($length = 2) {
//    return substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
//}

  //Create variables

	$tariffRate=$_POST['tariffRate'];
	$positionStatus=$_POST['positionStatus'];
    $wage = $_POST['wage'];
	$reasonChange = $_POST['reasonChange'];
	$totalMonthlySalary = $_POST['totalMonthlySalary'];
	$prizeAmount = $_POST['prizeAmount'];
	$rewardPeriod = $_POST['rewardPeriod'];
	$placeExpenditure = $_POST['placeExpenditure'];
	$otherCondition1 = $_POST['otherCondition1'];



	$company_id = $_POST['company_id'];
	$emp_id = $_POST['emp_id'];

 

//$passport_date = strtr($passport_date, '/', '-');
//$passport_date= date('Y-m-d', strtotime($passport_date));
//
//$passport_end_date = strtr($passport_end_date, '/', '-');
//$passport_end_date= date('Y-m-d', strtotime($passport_end_date));
//
//$birth_date = strtr($birth_date, '/', '-');
//$birth_date= date('Y-m-d', strtotime($birth_date));
//
//$birth_date = strtr($birth_date, '/', '-');
//$birth_date= date('Y-m-d', strtotime($birth_date));

//-$passport_date=date('Y-m-d',strtotime($passport_date));
    $sql = "INSERT INTO $tbl_salary_info (id,emp_id,company_id, tariff_rate, position_status_id, wage, total_monthly_salary, prize_amount, reward_period,
 place_expenditure_id,salary_change_reason, other_conditions) 
 VALUES ('Null','$emp_id','$company_id','$tariffRate','$positionStatus','$wage','$reasonChange', '$totalMonthlySalary','$prizeAmount','$rewardPeriod','$placeExpenditure','$otherCondition1')";
  

  if(!mysqli_query($db, $sql)) {
        echo "Error" .$sql. '='.mysqli_error($db);
    }
    else {
        echo "success";
    }
 
    //Close connection
    mysqli_close($db);

 
?>