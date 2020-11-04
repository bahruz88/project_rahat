<?php
 include('../session.php');
$empcontractid = $_POST['empcontractid'];
$site_lang=$_SESSION['dil'] ;

//$sql_lang = "SELECT  tmi.id,tmi.emp_id,tmi.status,tmi.military_reg_group, tmi.military_reg_category,tmi.military_staff,tmi.military_rank, tmi.military_specialty_acc,tmi.military_fitness_service,tmi.military_registration_service, DATE_FORMAT(tmi.military_registration_date,'%d/%m/%Y') military_registr_date, tmi.military_general,tmi.military_special,tmi.military_no_official, tmi.military_additional_information,DATE_FORMAT(tmi.military_date_completion,'%d/%m/%Y') military_date_comp, tmi.insert_date,tmi.insert_user,tmi.update_user,tmi.update_date,tms.staff_id tmsId,tms.staff_desc tmsStaffDesc,tmr.rank_id tmrId,tmr.rank_desc tmrRankDesc,te.id teId, concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.emp_status,tms.staff_desc
//FROM $tbl_military_information tmi
//inner join  $tbl_employees te on tmi.emp_id=te.id
//INNER join $tbl_military_rank  tmr on tmi.military_rank=tmr.rank_id and  tmr.lang='az'
//INNER join $tbl_military_staff  tms on tmi.military_staff=tms.staff_id and  tms.lang='az'
//where tmi.status=1 and te.emp_status=1 and  tmi.id='$empcontractid' ";

$sql_medical = "SELECT ttec.id,ttec.emp_id,ttec.company_id,ttec.indefinite,ttec.reasons_temporary_closure,
 DATE_FORMAT(ttec.date_contract,'%d/%m/%Y') date_contract,ttec.probation,ttec.probation_dates,
 DATE_FORMAT(ttec.trial_expiration_date,'%d/%m/%Y') trial_expiration_date,
 DATE_FORMAT(ttec.employee_start_date,'%d/%m/%Y') employee_start_date,
 DATE_FORMAT(ttec.date_conclusion_contract,'%d/%m/%Y') date_conclusion_contract,ttec.regulation_property_relations,
 ttec.termination_cases,ttec.other_condition_wages,
 ttec.workplace_status,ttec.working_conditions,
 ttec.job_description,ttec.kvota,ttec.status,td.title dates,  
 concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,
 
  tws.title workplace_status,tws.work_status_id work_status_id,twc.title working_conditions,  twc.cond_id working_cond_id,  
  tYN.chois_desc indefinite,tYN.chois_id,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name  
 FROM $tbl_terms_employment_contract ttec
LEFT join $tbl_workplace_status tws on tws.work_status_id=ttec.workplace_status and tws.lang='$site_lang'
LEFT join $tbl_working_conditions twc on twc.cond_id=ttec.working_conditions and twc.lang='$site_lang'
LEFT join $tbl_yesno tYN on ttec.indefinite=tYN.chois_id and tYN.lang='$site_lang'
LEFT join $tbl_dates td on ttec.probation_dates=td.level_id and td.lang='$site_lang'
LEFT join $tbl_employees te on ttec.emp_id=te.id where ttec.status=1 and te.emp_status=1 and ttec.id='$empcontractid'";


$result_lang = $db->query($sql_medical);
$data = array();

if ($result_lang->num_rows > 0) {
			// output data of each row
 $row_lang = $result_lang->fetch_assoc();
 $data = $row_lang;
}
	 
echo json_encode($data);
?>