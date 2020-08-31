<?php 
 
 
include('../session.php') ;

//function generateRandomString($length = 2) {
//    return substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
//}

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
//	echo 'emplo='.$_POST['emplo'];
//	echo 'emp_id='.$emp_id;



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
    $sql = "INSERT INTO $tbl_salary_info (id,emp_id,company_id, tariff_rate, position_status_id, wage,wage_currency, total_monthly_salary, prize_amount,prize_amount_currency, reward_period,
 place_expenditure_id,salary_change_reason, other_conditions1, other_conditions2, other_conditions3)
 VALUES ('Null','$emp_id','$company_id','$tariffRate','$positionStatus','$wage','$wage_currency', '$totalMonthlySalary','$prizeAmount','$prizeAmount_currency','$rewardPeriod','$placeExpenditure','$reasonChange','$otherCondition1','$otherCondition2','$otherCondition3')";


  if(!mysqli_query($db, $sql)) {
        echo "Error" .$sql. '='.mysqli_error($db);
    }
    else {
        echo "success";
    }

    //Close connection
    mysqli_close($db);

 
?>