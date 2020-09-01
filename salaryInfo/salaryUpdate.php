<?php 
include('../session.php') ;
	$id = $_POST['update_empidn'];
	$company_id = $_POST['update_company_id'];
	$emp_id = $_POST['update_emplo'];
	$tariff_rate = $_POST['update_tariffRate'];
    $position_status_id = $_POST['update_positionStatus'];
	$wage=$_POST['update_wage'];

	 $wage_currency=$_POST['update_currency'];
	$total_monthly_salary=$_POST['update_totalMonthlySalary'];
	$prize_amount=$_POST['update_prizeAmount'];
    $prize_amount_currency=$_POST['update_prizeCurrency'];


    $reward_period=$_POST['update_rewardPeriod'];



	$place_expenditure_id=$_POST['update_placeExpenditure'];
	$salary_change_reason=$_POST['update_reasonChange'];
	$other_conditions1=$_POST['update_otherCondition1'];
	$other_conditions2=$_POST['update_otherCondition2'];
	$other_conditions3=$_POST['update_otherCondition3'];

	$sql =   "UPDATE  $tbl_salary_info SET 
		 company_id = '$company_id',
		 emp_id = '$emp_id',
		 tariff_rate = '$tariff_rate',
		position_status_id = '$position_status_id',
		wage = '$wage',
		wage_currency = '$wage_currency',
		total_monthly_salary='$total_monthly_salary',
		prize_amount='$prize_amount',
		prize_amount_currency='$prize_amount_currency',
		reward_period='$reward_period',
		place_expenditure_id='$place_expenditure_id',
		salary_change_reason='$salary_change_reason',
		other_conditions1='$other_conditions1',
		other_conditions2='$other_conditions2',
		other_conditions3='$other_conditions3'
		WHERE id = '$id' ";
 

  
    //Checking to see if name or email already exsist
	if(mysqli_query($db, $sql) ) {
      echo "success" ;
    }
    else  {
        echo "error" .$sql.'='.mysqli_error($db);
    }
 
    //Close connection
    mysqli_close($db);

 
?>