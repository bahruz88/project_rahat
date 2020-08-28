<?php 
include('../session.php') ;
	$id = $_POST['update_empidn'];
//	$company_id = $_POST['update_company_id'];
	$tariff_rate = $_POST['update_tariffRate'];
    $position_status_id = $_POST['update_positionStatus'];
	$wage=$_POST['update_wage'];
	$total_monthly_salary=$_POST['update_totalMonthlySalary'];
	$prize_amount=$_POST['update_prizeAmount'];
	$reward_period=$_POST['update_rewardPeriod'];

	$place_expenditure_id=$_POST['update_placeExpenditure'];
	$salary_change_reason=$_POST['update_reasonChange'];
	$other_conditions=$_POST['update_otherCondition1'];
	
	$sql =   "UPDATE  $tbl_salary_info SET 
		 tariff_rate = '$tariff_rate',
		position_status_id = '$position_status_id',
		wage = '$wage',
		total_monthly_salary='$total_monthly_salary',
		prize_amount='$prize_amount',
		reward_period='$reward_period',
		place_expenditure_id='$place_expenditure_id',
		salary_change_reason='$salary_change_reason',
		other_conditions='$other_conditions'
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