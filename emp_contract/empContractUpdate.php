<?php
include('../session.php') ;
$contractid                          = $_POST['update_empcontractid_name'];
$employment_contract_indefinite      = $_POST['update_employment_contract_indefinite'];
$reasons_contract                    = $_POST['update_reasons_contract'];
$date_employment_contract            = $_POST['update_date_employment_contract'];
$probation                           = $_POST['update_probation'];
$probation_dates                           = $_POST['update_dates'];
$trial_expiration_date               = $_POST['update_trial_expiration_date'];
$employee_start_date                 = $_POST['update_employee_start_date'];
$date_conclusion_employment_contract = $_POST['update_date_conclusion_employment_contract'];
$regulation_property_relations       = $_POST['update_regulation_property_relations'];
$termination_cases                   = $_POST['update_termination_cases'];
$other_conditions_wages              = $_POST['update_other_conditions_wages'];
$workplace_status                    = $_POST['update_workplace_status'];
$working_conditions                  = $_POST['update_working_conditions'];
$job_descriptions                    = $_POST['update_job_descriptions'];
$kvota                               = $_POST['update_kvota'];


$date_employment_contract = strtr( $date_employment_contract , '/', '-');
$date_employment_contract= date('Y-m-d', strtotime($date_employment_contract));

$trial_expiration_date = strtr( $trial_expiration_date , '/', '-');
$trial_expiration_date= date('Y-m-d', strtotime($trial_expiration_date));

$employee_start_date = strtr( $employee_start_date , '/', '-');
$employee_start_date= date('Y-m-d', strtotime($employee_start_date));

$date_conclusion_employment_contract = strtr( $date_conclusion_employment_contract , '/', '-');
$date_conclusion_employment_contract= date('Y-m-d', strtotime($date_conclusion_employment_contract));


	$update_date= date("Y-m-d h:i:sa") ;

	$sql = "UPDATE  $tbl_terms_employment_contract SET  
		indefinite  = '$employment_contract_indefinite',
		reasons_temporary_closure = '$reasons_contract',
		date_contract = '$date_employment_contract',
		probation = '$probation',
		probation_dates = '$probation_dates',
		trial_expiration_date = '$trial_expiration_date', 		
		employee_start_date='$employee_start_date', 
		date_conclusion_contract='$date_conclusion_employment_contract' ,
		regulation_property_relations='$regulation_property_relations' ,
		termination_cases='$termination_cases' ,
		other_condition_wages='$other_conditions_wages' ,
		workplace_status='$workplace_status' ,
		working_conditions='$working_conditions', 
		job_description='$job_descriptions', 
		kvota='$kvota' ,
		update_date='$update_date' 
		
		WHERE id 	= '$contractid' ";

	if(mysqli_query($db, $sql) ) {
      echo "success";
    }
    else  {
      echo "error" .mysqli_error($db);
    }

    //Close connection
    mysqli_close($db);


?>