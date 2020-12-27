<?php
include('../session.php');
$site_lang=$_SESSION['dil'] ;
$company_id=$_POST['company_id'];

$sql_minfo = "SELECT ttec.id,ttec.emp_id,ttec.company_id,ttec.indefinite,ttec.reasons_temporary_closure,
 DATE_FORMAT(ttec.date_contract,'%d/%m/%Y') date_contract,ttec.probation,
 DATE_FORMAT(ttec.trial_expiration_date,'%d/%m/%Y') trial_expiration_date,
 DATE_FORMAT(ttec.employee_start_date,'%d/%m/%Y') employee_start_date,
 DATE_FORMAT(ttec.date_conclusion_contract,'%d/%m/%Y') date_conclusion_contract,ttec.regulation_property_relations,
 ttec.termination_cases,ttec.other_condition_wages,
 ttec.workplace_status,ttec.working_conditions,
 ttec.job_description,ttec.kvota,ttec.status,td.title dates, 
 
  tws.title workplace_status,twc.title working_conditions,  
  tYN.chois_desc indefinite,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name  
 FROM $tbl_terms_employment_contract ttec
LEFT join $tbl_workplace_status tws on tws.work_status_id=ttec.workplace_status and tws.lang='$site_lang'
LEFT join $tbl_working_conditions twc on twc.cond_id=ttec.working_conditions and twc.lang='$site_lang'
LEFT join $tbl_yesno tYN on ttec.indefinite=tYN.chois_id and tYN.lang='$site_lang'
LEFT join $tbl_dates td on ttec.probation_dates=td.level_id and td.lang='$site_lang'
LEFT join $tbl_employees te on ttec.emp_id=te.id where ttec.status=1 and te.emp_status=1 and te.company_id='$company_id'";

//  tYN.chois_id, tYN.chois_desc,tYN.lang,
//INNER join tbl_yesno tYN on tmi.medical_app=tYN.chois_id and tYN.lang='az'


$result_minfo  = $db->query($sql_minfo);
$data = array();
if ($result_minfo ->num_rows > 0) {
    // output data of each row
    while($row_minfo  = $result_minfo ->fetch_assoc()) {
        if  ($row_minfo ['status']==1 )
        {
            $row_minfo ['status']='active'	;

        }
        else {
            $row_minfo ['status']='deactive';
        }

        $sub_array   = array();
        $sub_array[] = $row_minfo['id'];
        $sub_array[] = $row_minfo['full_name'];
        $sub_array[] = strlen($row_minfo['indefinite'])>30 ? substr($row_minfo['indefinite'],0,30).'...' : $row_minfo['indefinite'];
        $sub_array[] = strlen($row_minfo['reasons_temporary_closure'])>30 ? substr($row_minfo['reasons_temporary_closure'],0,30).'...' :$row_minfo['reasons_temporary_closure'];
        $sub_array[] = $row_minfo['date_contract'];
        $sub_array[] = $row_minfo['probation'];
        $sub_array[] = $row_minfo['trial_expiration_date'];
        $sub_array[] = $row_minfo['employee_start_date'];
        $sub_array[] = $row_minfo['date_conclusion_contract'];
        $sub_array[] = strlen($row_minfo['regulation_property_relations'])>30 ? substr($row_minfo['regulation_property_relations'],0,30).'...' :$row_minfo['regulation_property_relations'];
        $sub_array[] = strlen($row_minfo['termination_cases'])>30 ? substr($row_minfo['termination_cases'],0,30).'...' : $row_minfo['termination_cases'];
        $sub_array[] = strlen($row_minfo['other_condition_wages'])>30 ? substr($row_minfo['other_condition_wages'],0,30).'...' :$row_minfo['other_condition_wages'];
        $sub_array[] = strlen($row_minfo['workplace_status'])>30 ? substr($row_minfo['workplace_status'],0,30).'...' :$row_minfo['workplace_status'];
        $sub_array[] = strlen($row_minfo['working_conditions'])>30 ? substr($row_minfo['working_conditions'],0,30).'...' :$row_minfo['working_conditions'];
        $sub_array[] = strlen($row_minfo['job_description'])>30 ? substr($row_minfo['job_description'],0,30).'...' :$row_minfo['job_description'];
        $sub_array[] =strlen($row_minfo['kvota'])>30 ? substr($row_minfo['kvota'],0,30).'...':$row_minfo['kvota'];
 //        $sub_array[] = $row_minfo['insert_date'];
        $data[]     = $sub_array;
    }
}


$row_count=$result_minfo->num_rows ;

$draw=10;

$output = array(
    'draw' => intval($draw),
    'recordsTotal' =>$row_count,
    'recordsFiltered' => $row_count,
    'data' => $data
);
//print_r($output);
echo  json_encode($output);
?>

