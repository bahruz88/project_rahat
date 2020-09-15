<?php 
 
 
include('../session.php') ;
 
  //Create variables

$employee                      =$_POST['employee'];
$indefinite                    = $_POST['employment_contract_indefinite'];
$reasons_temporary_closure     = $_POST['reasons_contract'];
$date_contract                 = $_POST['date_employment_contract'];
$probation                     = $_POST['probation'];
$trial_expiration_date         = $_POST['trial_expiration_date'];
$employee_start_date           = $_POST['employee_start_date'];
$date_conclusion_contract      = $_POST['date_conclusion_employment_contract'];
$regulation_property_relations = $_POST['regulation_property_relations'];
$termination_cases             = $_POST['termination_cases'];
$other_condition_wages         = $_POST['other_conditions_wages'];
$workplace_status              = $_POST['workplace_status'];
$working_conditions            = $_POST['working_conditions'];
$job_description               = $_POST['job_descriptions'];
$kvota                         = $_POST['kvota'];

$date_contract = strtr($date_contract, '/', '-');
$date_contract= date('Y-m-d', strtotime($date_contract));

$trial_expiration_date = strtr($trial_expiration_date, '/', '-');
$trial_expiration_date= date('Y-m-d', strtotime($trial_expiration_date));

$employee_start_date = strtr($employee_start_date, '/', '-');
$employee_start_date= date('Y-m-d', strtotime($employee_start_date));

$date_conclusion_contract = strtr($date_conclusion_contract, '/', '-');
$date_conclusion_contract= date('Y-m-d', strtotime($date_conclusion_contract));

$insert_date= date("Y-m-d h:i:sa") ;

    $sql = "INSERT INTO $tbl_terms_employment_contract(
	 id, emp_id, indefinite, reasons_temporary_closure, date_contract, probation, trial_expiration_date,
	 employee_start_date,date_conclusion_contract,regulation_property_relations,termination_cases,other_condition_wages,workplace_status,working_conditions,job_description,kvota,insert_date)
	 VALUES (NULL, '$employee','$indefinite','$reasons_temporary_closure','$date_contract','$probation','$trial_expiration_date',
	 '$employee_start_date','$date_conclusion_contract','$regulation_property_relations','$termination_cases','$other_condition_wages','$workplace_status','$working_conditions','$job_description','$kvota','$insert_date')";

  if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success" ;
    }
 
    //Close connection
    mysqli_close($db);

 
?>